<?php

namespace Infrastructure\Http\Transformer;

use DateTimeImmutable;
use Domain\Model\BaseModel;
use Domain\Model\BaseModelCriteria;
use Domain\Model\BaseModelWithId;
use Domain\Model\BaseModelWithIdCriteria;
use Domain\Model\DateTimeRange;

class BaseModelTransformer
{
    public static function arrayToCriteria(
        array $data,
        BaseModelCriteria $criteria,
    ): void {  
        $criteria->filterByCreatedAt(
            new DateTimeRange(
                !empty($data['created_at_from'])
                    ? new DateTimeImmutable($data['created_at_from'])
                    : null,
                !empty($data['created_at_to'])
                    ? new DateTimeImmutable($data['created_at_to'])
                    : null,
            ),
        );

        $criteria->filterByUpdatedAt(
            new DateTimeRange(
                !empty($data['updated_at_from'])
                    ? new DateTimeImmutable($data['updated_at_from'])
                    : null,
                !empty($data['updated_at_to'])
                    ? new DateTimeImmutable($data['updated_at_to'])
                    : null,
            ),
        );

        $criteria->filterByDeletedAt(
            new DateTimeRange(
                !empty($data['deleted_at_from'])
                    ? new DateTimeImmutable($data['deleted_at_from'])
                    : null,
                !empty($data['deleted_at_to'])
                    ? new DateTimeImmutable($data['deleted_at_to'])
                    : null,
            ),
        );
    }
}