<?php

namespace Infrastructure\MongoDB\Model\Device;

use Domain\Exception\InfrastructureException;
use Domain\Model\BaseRepository;
use Domain\Model\Device\Device;
use Domain\Model\Device\DeviceCriteria;
use Domain\Model\Device\DeviceNotFoundException;
use Domain\Model\Device\DeviceRepository;
use Domain\Model\Device\Devices;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Client;

use MongoDB\Collection;

class MongoDBDeviceRepository extends BaseRepository implements DeviceRepository
{
    private const COLLECTION_NAME = 'device';

    private Collection $collection;

    public function __construct(
        private readonly Client $client,
        string $databaseName,
    ) {
        $this->collection = $client->selectCollection(
            $databaseName,
            self::COLLECTION_NAME
        );
    }

    public function create(Device $device): string
    {
        self::markAsUpdated($device);

        try {
            $result = $this->collection->insertOne(
                self::toCollectionObject($device)
            );
        } catch (\Exception $e) {
            throw new InfrastructureException($e->getMessage());
        }

        /** @var ObjectId $deviceId */
        $deviceId = $result->getInsertedId();
        $device->id = (string)$deviceId;

        return $device->id;
    }

    public function update(Device $device): void
    {
        $collectionObject = self::toCollectionObject($device);
        $objectId = $collectionObject['_id'];
        unset($collectionObject['_id']);

        $this->collection->updateOne(
            ['_id' => $objectId],
            ['$set' => $collectionObject]
        );
    }

    public function findOneBy(DeviceCriteria $criteria): Device
    {
        $device = $this->collection->findOne(
            self::buildFilterFromCriteria($criteria)
        );

        if (\is_null($device)) {
            throw new DeviceNotFoundException();
        }

        return self::toDevice($device);
    }

    public function findBy(DeviceCriteria $criteria): Devices
    {
        $devices = $this->collection->find(
            self::buildFilterFromCriteria($criteria)
        );

        $devicesObject = new Devices([]);
        foreach ($devices as $device) {
            $devicesObject->add(self::toDevice($device));
        }

        return $devicesObject;
    }

    private function toCollectionObject(Device $device): array
    {
        $data = [
            'externalId' => $device->externalId,
            'type' => $device->type,
            'name' => $device->name,
            'description' => $device->description,
            'provider' => $device->provider,
            'createdAt' => new UTCDateTime($device->createdAt->getTimestamp() * 1000),
            'updatedAt' => new UTCDateTime($device->updatedAt->getTimestamp() * 1000),
            'deletedAt' => !\is_null($device->deletedAt)
                ? new UTCDateTime($device->deletedAt->getTimestamp() * 1000)
                : null,
        ];

        if (!\is_null($device->id)) {
            $data['_id'] = new ObjectId($device->id);
        }

        return $data;
    }

    private function toDevice(array $data): Device
    {
        $device = new Device();
        $device->id = (string) $data['_id'];
        $device->externalId = $data['externalId'];
        $device->type = $data['type'];
        $device->name = $data['name'];
        $device->description = $data['description'];
        $device->provider = $data['provider'];
        $device->createdAt = \DateTimeImmutable::createFromMutable($data['createdAt']->toDateTime());
        $device->updatedAt = \DateTimeImmutable::createFromMutable($data['updatedAt']->toDateTime());
        $device->deletedAt = !\is_null($data['deletedAt'])
            ? \DateTimeImmutable::createFromMutable($data['deletedAt']->toDateTime())
            : null;

        return $device;
    }

    private static function buildFilterFromCriteria(DeviceCriteria $criteria): array
    {
        $filter = self::buildBaseFilterFromCriteria($criteria);

        if (!\is_null($criteria->getType())) {
            $filter['type'] = $criteria->getType();
        }

        if (!\is_null($criteria->getProvider())) {
            $filter['provider'] = $criteria->getProvider();
        }

        return $filter;
    }
}
