<?php

namespace Infrastructure\Http;

use League\Tactician\CommandBus;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\StoppableEventInterface;

abstract class DuplexBusAccessor
{
    public function __construct(
        private readonly CommandBus $queryBus,
        private readonly CommandBus $commandBus,
        private readonly EventDispatcherInterface $eventDispatcher
    ) {}

    /**
     * @param $command
     *
     * @return mixed
     */
    protected function ask($command): mixed
    {
        return $this
            ->queryBus
            ->handle($command);
    }

    /**
     * @param $command
     *
     * @return mixed
     */
    protected function execute($command): mixed
    {
        return $this->commandBus->handle($command);
    }

    /**
     * @param StoppableEventInterface $event
     */
    protected function dispatch(StoppableEventInterface $event)
    {
        $this->eventDispatcher->dispatch($event);
    }
}