<?php

namespace Domain\Command;

use Domain\Model\Device\Device;

class CreateDeviceCommand
{
    private Device $device;

    public function __construct(
        Device $device,
    ) {
        $this->device = $device;
    }

    public function getDevice(): Device
    {
        return $this->device;
    }
}