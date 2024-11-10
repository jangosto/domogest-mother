<?php

namespace Domain\Model;

class BaseModelCriteria extends BaseModelWithIdCriteria
{
    private ?DateTimeRange $createdAtRange = null;
    private ?DateTimeRange $updatedAtRange = null;
    private ?DateTimeRange $deletedAtRange = null;

    public function filterByCreatedAt(DateTimeRange $dateTimeRange) {
        $this->createdAtRange = $dateTimeRange;
    }

    public function filterByUpdatedAt(DateTimeRange $dateTimeRange) {
        $this->updatedAtRange = $dateTimeRange;
    }

    public function filterByDeletedAt(DateTimeRange $dateTimeRange) {
        $this->deletedAtRange = $dateTimeRange;
    }

    /**
     * @return DateTimeRange|null
     */
    public function getCreatedAtRange(): ?DateTimeRange
    {
        return $this->createdAtRange;
    }

    /**
     * @return DateTimeRange|null
     */
    public function getUpdatedAtRange(): ?DateTimeRange
    {
        return $this->updatedAtRange;
    }

    /**
     * @return DateTimeRange|null
     */
    public function getDeletedAtRange(): ?DateTimeRange
    {
        return $this->deletedAtRange;
    }
}