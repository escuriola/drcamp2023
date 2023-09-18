<?php

declare(strict_types=1);

namespace drupalcamp\Infrastructure\Drupal\Adapter\Paper\PaperSubmission;

use Drupal\Core\Controller\ControllerBase;
use drupalcamp\Application\Paper\PapersSubmission\PapersSubmissionService;
use drupalcamp\Application\Room\Create\RoomCreateCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PaperSubmissionController extends ControllerBase
{
  private $service;

  public function __construct(PapersSubmissionService $service)
  {
    $this->service = $service;
  }

  public function execute(Request $request): JsonResponse
  {
    $id = sprintf("%06d", random_int(1, 9999999999));
    /** @var \Drupal\Core\TempStore\PrivateTempStore $store */
    $store = \Drupal::service('tempstore.private')->get('ddd');
    $store->delete('custom_id');
    $store->set('custom_id', $id);

    $data = json_decode($request->getContent(), TRUE, 512, JSON_THROW_ON_ERROR);

    $command = new RoomCreateCommand(
      $id,
      $data['name'],
      $data['location'],
    );

    $this->service->execute($command);

    return new JsonResponse([
      'status' => 'ok',
      'message' => 'The room was created successfully',
    ]);

  }

  public static function create(ContainerInterface $container)
  {
    return new static (
      $container->get('room.create_service')
    );
  }



}
