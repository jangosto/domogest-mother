<?php

namespace Infrastructure\Http\Transformer;

use Domain\Model\Device\DeviceCriteria;

class DeviceTransformer
{
    public static function arrayToCriteria(array $data): DeviceCriteria
    {
        $deviceCriteria = DeviceCriteria::createEmpty();

        if (
            isset($data['type'])
            && !empty($data['type'])
        ) {
            $deviceCriteria->filterByType($data['type']);
        }

        if (
            isset($data['provider'])
            && !empty($data['provider'])
        ) {
            $deviceCriteria->filterByProvider($data['provider']);
        }

        if (
            isset($data['provider'])
            && !empty($data['provider'])
        ) {
            $deviceCriteria->filterByProvider($data['provider']);
        }

        BaseModelTransformer::arrayToCriteria(
            $data,
            $deviceCriteria
        );
        
        BaseModelWithIdTransformer::arrayToCriteria(
            $data,
            $deviceCriteria,
        );

        return $deviceCriteria;
    }
}