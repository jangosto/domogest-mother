<?php

namespace Domain\Model;

class BaseModelCriteria extends BaseModelWithIdCriteria
{
    private ?DateTimeRange $createdAtRange = null;
    private ?DateTimeRange $updatedAtRange = null;
    private ?DateTimeRange $deletedAtRange = null;

    public function filterByCreatedAt(DateTimeRange $dateTimeRange): self
    {
        $this->createdAtRange = $dateTimeRange;

        return $this;
    }

    public function filterByUpdatedAt(DateTimeRange $dateTimeRange): self
    {
        $this->updatedAtRange = $dateTimeRange;

        return $this;
    }

    public function filterByDeletedAt(DateTimeRange $dateTimeRange): self
    {
        $this->deletedAtRange = $dateTimeRange;

        return $this;
    }

    public function getCreatedAtRange(): ?DateTimeRange
    {
        return $this->createdAtRange;
    }

    public function getUpdatedAtRange(): ?DateTimeRange
    {
        return $this->updatedAtRange;
    }

    public function getDeletedAtRange(): ?DateTimeRange
    {
        return $this->deletedAtRange;
    }
}