<?php

namespace Domain\Model;

class BaseModel extends BaseModelWithId
{
    public ?\DateTimeImmutable $createdAt = null;
    public ?\DateTimeImmutable $updatedAt = null;
    public ?\DateTimeImmutable $deletedAt = null;
}