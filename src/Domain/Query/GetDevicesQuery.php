<?php

namespace Domain\Query;

use Domain\Model\Device\DeviceCriteria;

class GetDevicesQuery
{
    private DeviceCriteria $criteria;

    public function __construct(
        DeviceCriteria $criteria
    ) {
        $this->criteria = $criteria;
    }

    /**
     * @return DeviceCriteria
     */
    public function getCriteria(): DeviceCriteria
    {
        return $this->criteria;
    }
}