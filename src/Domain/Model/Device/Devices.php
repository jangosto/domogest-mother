<?php

namespace Domain\Model\Device;

use Domain\Model\Collection;

class Devices extends Collection
{
    /**
     * @var Device[] $devices
     */
    private array $devices;

    public function __construct(array $devices)
    {
        array_map(
            fn (Device $device) => $this->add($device),
            $devices
        );
    }

    public function all(): array
    {
        return $this->devices;
    }

    public function add(Device $device): void
    {
        $this->devices[] = $device;
    }
}