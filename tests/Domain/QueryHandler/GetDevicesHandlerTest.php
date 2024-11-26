<?php

namespace Tests\Domain\QueryHandler;

use Domain\Model\Device\DeviceRepository;
use Domain\QueryHandler\GetDevicesHandler;
use PHPUnit\Framework\TestCase;

class GetDevicesHandlerTest extends TestCase
{
    public function testItIsInstanciable(): void
    {
        /** @var DeviceRepository|PHPUnit\Framework\MockObject\MockObject $deviceRepositoryMock */
        $deviceRepositoryMock = $this->createMock(DeviceRepository::class);

        $this->assertInstanceOf(
            GetDevicesHandler::class,
            new GetDevicesHandler(
                $deviceRepositoryMock
            )
        );
    }
}