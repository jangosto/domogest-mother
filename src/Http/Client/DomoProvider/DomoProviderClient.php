<?php

namespace Infrastructure\Client\DomoProvider;

Interface DomoProviderClient
{
    public function getDevices();
    public function getDevice($device);
    public function disableDevice($device);
    public function enableDevice($device);
}