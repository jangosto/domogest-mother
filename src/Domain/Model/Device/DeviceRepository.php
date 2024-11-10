<?php


namespace Domain\Model\Device;


interface DeviceRepository
{
    public function create(Device $device): Device;
    public function update(Device $device): void;
    public function findBy(DeviceCriteria $criteria): Devices;
    public function findOneBy(DeviceCriteria $criteria): Device;
}