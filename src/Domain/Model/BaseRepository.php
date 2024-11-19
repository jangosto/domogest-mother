<?php

namespace Domain\Model;

class BaseRepository
{
    protected static function markAsUpdated(BaseModel $model): void
    {
        if (\is_null($model->createdAt)) {
            $model->createdAt = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        }

        $model->updatedAt = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
    }

    protected static function markAsDeleted(BaseModel $model): void
    {
        if (\is_null($model->deletedAt)) {
            $model->deletedAt = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        }
    }

    protected static function markAsRecovered(BaseModel $model): void
    {
        $model->deletedAt = null;
    }

    protected static function buildBaseFilterFromCriteria(BaseModelCriteria $criteria): array
    {
        $filter = [];

        if (!\is_null($criteria->getId())) {
            $filter['_id'] = $criteria->getId();
        }

        if (!\is_null($criteria->getCreatedAtRange())) {
            if ($criteria->getCreatedAtRange()->getFrom()) {
                $filter['createdAt']['$gte'] = $criteria->getCreatedAtRange()->getFrom();
            }

            if ($criteria->getCreatedAtRange()->getTo()) {
                $filter['createdAt']['$lte'] = $criteria->getCreatedAtRange()->getTo();
            }
        }

        if (!\is_null($criteria->getUpdatedAtRange())) {
            if ($criteria->getUpdatedAtRange()->getFrom()) {
                $filter['updatedAt']['$gte'] = $criteria->getUpdatedAtRange()->getFrom();
            }

            if ($criteria->getUpdatedAtRange()->getTo()) {
                $filter['updatedAt']['$lte'] = $criteria->getUpdatedAtRange()->getTo();
            }
        }

        if (!\is_null($criteria->getDeletedAtRange())) {
            if ($criteria->getDeletedAtRange()->getFrom()) {
                $filter['createdAt']['$gte'] = $criteria->getDeletedAtRange()->getFrom();
            }

            if ($criteria->getDeletedAtRange()->getTo()) {
                $filter['createdAt']['$lte'] = $criteria->getDeletedAtRange()->getTo();
            }
        }

        return $filter;
    }
}