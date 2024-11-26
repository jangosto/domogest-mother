<?php

namespace Infrastructure\Http\Transformer;

use Domain\Model\BaseModelWithIdCriteria;

class BaseModelWithIdTransformer
{
    public static function arrayToCriteria(
        array $data,
        BaseModelWithIdCriteria $criteria,
    ): void {
        if (!empty($data['id'])) {
            $criteria->filterById(
                $data['id'],
            );
        }
    }
}