<?php

namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;

final class InOrNullFilter extends AbstractContextAwareFilter
{
    const PROPERTY_PREFIX = 'in_or_null_';

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        if (substr($property, 0, strlen(self::PROPERTY_PREFIX)) !== self::PROPERTY_PREFIX) {
            return;
        }

        $processedProperty = substr($property, strlen(self::PROPERTY_PREFIX));

        if ($value === '' || (is_array($value) && $value[0] === '')) {
            $queryBuilder->andWhere($queryBuilder->expr()->isNull(
                sprintf('o.%s', $processedProperty)
            ));
        } else {
            $queryBuilder->andWhere($queryBuilder->expr()->orX(
                $queryBuilder->expr()->isNull(
                    sprintf('o.%s', $processedProperty)
                ),
                $queryBuilder->expr()->in(
                    sprintf('o.%s', $processedProperty),
                    $value,
                )
            ));
        }
    }

    public function getDescription(string $resourceClass): array
    {
        if (!$this->properties) {
            return [];
        }

        $description = [];
        foreach ($this->properties as $property => $strategy) {
            $description[sprintf('%s%s', self::PROPERTY_PREFIX, $property)] = [
                'property' => $property,
                'type' => 'array',
                'required' => false,
            ];
        }

        return $description;
    }
}
