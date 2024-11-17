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
}