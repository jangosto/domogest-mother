<?php

namespace Infrastructure\Http\Controller;

use Domain\Query\GetDevicesQuery;
use Infrastructure\Http\DuplexBusAccessor;
use Infrastructure\Http\Transformer\DeviceTransformer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetDevicesController extends DuplexBusAccessor
{
    public function __invoke(Request $request)
    {
        $queryStringArray = $request->query->all();

        $deviceCriteria = DeviceTransformer::arrayToCriteria(
            $queryStringArray
        );

        $devices = $this->ask(
            new GetDevicesQuery(
                $deviceCriteria
            ),
        );

        return new Response('hola que tal');
    }
}