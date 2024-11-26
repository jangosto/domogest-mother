<?php

namespace Domain\Model;

class DateTimeRange
{
    private ?\DateTimeImmutable $from;
    private ?\DateTimeImmutable $to;

    public function __construct(
        ?\DateTimeImmutable $from = null,
        ?\DateTimeImmutable $to = null
    ) {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFrom(): ?\DateTimeImmutable
    {
        return $this->from;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getTo(): ?\DateTimeImmutable
    {
        return $this->to;
    }
}