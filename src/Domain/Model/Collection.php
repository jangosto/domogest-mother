<?php

namespace Domain\Model;

use Countable;
use Domain\Exception\EmptyCollectionException;

abstract class Collection  implements Countable
{
    /**
     * @return BaseModel[]
     */
    abstract public function all(): array;

    /**
     * @param callable $callable
     */
    public function each(callable $callable)
    {
        foreach ($this->all() as $one) {
            $callable($one);
        }
    }

    /**
     * @return array
     */
    public function allIndexedById(): array
    {
        $all = $this->all();
        $allIndexedById = [];
        foreach ($all as $baseModel) {
            $allIndexedById[$baseModel->id] = $baseModel;
        }

        return $allIndexedById;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return [] === $this->all();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->all());
    }

    /**
     * @param bool $allowEmpty
     *
     * @return BaseModel|null
     *
     * @throws EmptyCollectionException
     */
    public function getFirst(bool $allowEmpty = true): ?BaseModel
    {
        if (empty($this->all())) {
            if (!$allowEmpty) {
                throw new EmptyCollectionException();
            }

            return null;
        }

        $all = $this->all();
        $entity = reset($all);

        return $entity instanceof BaseModel
            ? $entity
            : null;
    }
}