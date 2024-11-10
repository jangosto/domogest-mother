<?php

namespace Domain\Model\Device;

use Domain\Model\BaseModel;

class Device extends BaseModel
{
    public ?string $externalId;
    public ?string $type;
    public ?string $name;
    public ?string $description;
    public ?string $provider;
}