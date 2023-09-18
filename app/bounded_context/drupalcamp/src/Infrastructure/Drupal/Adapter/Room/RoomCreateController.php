<?php

declare(strict_types=1);

namespace drupalcamp\Infrastructure\Drupal\Adapter\Room;

use Drupal\Component\Uuid\Uuid;
use Drupal\Core\Controller\ControllerBase;
use drupalcamp\Application\Room\Create\RoomCreateCommand;
use drupalcamp\Application\Room\Create\RoomCreateService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RoomCreateController extends ControllerBase
{
  private $service;

  public function __construct(RoomCreateService $service)
  {
    $this->service = $service;
  }

  public function execute(Request $request): JsonResponse
  {
    $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
    \Drupal::logger('ddd')->notice("UUID:  $uuid.");
    $data = json_decode($request->getContent(), TRUE, 512, JSON_THROW_ON_ERROR);

    $command = new RoomCreateCommand(
      $uuid,
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
