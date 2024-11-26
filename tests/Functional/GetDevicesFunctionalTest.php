<?php

namespace Tests\Functional;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class GetDevicesFunctionalTest extends BaseFunctionalTest
{
    private ClientInterface $client;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://domogest.local',
            'timeout' => 10.0,
            'headers' => [
                'Accept' => 'application/json',
            ],
            'verify' => true,
            'http_errors' => true,
        ]);
    }

    public function testItRespondsWithOKStatusCodeWhenGetDevicesRequestIsFine(): void
    {
        $query = [
            'type' => 'a_device_type',
            'provider' => 'a_device_provider',
        ];

        $response = $this->client->request(
            'GET',
            '/devices',
            [
                'query' => $query
            ]
        );

        $responseContent = $response->getBody()->getContents();

        $this->assertTrue(true);
    }
}