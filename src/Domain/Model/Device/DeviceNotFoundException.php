<?php

namespace Domain\Model\Device;

use Domain\Model\ObjectNotFoundException;

class DeviceNotFoundException extends ObjectNotFoundException
{
    protected $message = 'Device Not Found';
}