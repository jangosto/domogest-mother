<?php

namespace Domain\QueryHandler;

use Domain\Model\Device\DeviceRepository;
use Domain\Model\Device\Devices;
use Domain\Query\GetDevicesQuery;

class GetDevicesHandler
{
    public function __construct(
        private readonly DeviceRepository $deviceRepository,
    ) {}

    public function handle(GetDevicesQuery $query): Devices
    {
        try {
            // $devices = $this->deviceRepository->findBy(
            //     $query->getCriteria(),
            // );
            $devices = new Devices([]);
        } catch (\Exception $e) {
            throw $e;
        }

        return $devices;
    }
}