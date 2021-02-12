<?php
namespace Jtrw\DataAccessBridge\Repository;

/**
 * Interface DataBaseInterface
 * @package Jtrw\DataView\Repository
 */
interface DataBaseInterface
{
    /**
     * @param string $table
     * @param array $select
     * @param array|null $joins
     * @param array|null $where
     * @param string|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @param array|null $groupBy
     * @param array|null $having
     * @return array|null
     */
    public function select(string $table,
                           array $select,
                           ?array $joins = null,
                           ?array $where = null,
                           ?string $orderBy = null,
                           ?int $limit = null,
                           ?int $offset = null,
                           ?array $groupBy = null,
                           ?array $having = null
    ): ?array;
}
