<?php

namespace Infrastructure\MongoDB\Model\Device;

use Domain\Model\Device\Device;
use Domain\Model\Device\DeviceCriteria;
use Domain\Model\Device\DeviceRepository;
use Domain\Model\Device\Devices;
use MongoDB\Client;
use MongoDB\Collection;

class MongoDBDeviceRepository implements DeviceRepository
{
    private const COLLECTION_NAME = 'dynamic_pricing_logs';

    private Client $client;
    private Collection $collection;

    public function __construct(
        Client $client,
        Collection $collection
    ) {
        $this->client = $client;
        $this->collection = $collection;
    }

    public function create(Device $device): Device
    {

    }

    public function update(Device $device): void
    {

    }

    public function findBy(DeviceCriteria $criteria): Devices
    {

    }

    public function findOneBy(DeviceCriteria $criteria): Device
    {

    }
}
