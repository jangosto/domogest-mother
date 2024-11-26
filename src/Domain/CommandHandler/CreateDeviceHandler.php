<?php

namespace Domain\CommandHandler;

use Domain\Command\CreateDeviceCommand;
use Domain\Model\Device\DeviceRepository;

class CreateDeviceHandler
{
    public function __construct(
        private readonly DeviceRepository $deviceRepository,
    ) {}

    public function handle(CreateDeviceCommand $command): string
    {
        try {
            $deviceId = $this->deviceRepository->create(
                $command->getDevice()
            );
        } catch(\Exception $e) {
            throw $e;
        }

        return $deviceId;
    }
}