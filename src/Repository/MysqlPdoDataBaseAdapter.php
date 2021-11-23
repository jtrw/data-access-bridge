<?php
namespace Jtrw\DataAccessBridge\Repository;

use Jtrw\DAO\DataAccessObject;
use Jtrw\DAO\ObjectAdapterInterface;
use Jtrw\DAO\Query\Query;
use PDO;

/**
 * Class MysqlPdoDataBaseAdapter
 * @package Jtrw\DataView\Repository
 */
class MysqlPdoDataBaseAdapter implements DataBaseInterface
{
    /**
     * @var ObjectAdapterInterface
     */
    protected ObjectAdapterInterface $dao;
    
    /**
     * MysqlPdoDataBaseAdapter constructor.
     * @param PDO $db
     * @throws \Jtrw\DAO\Exceptions\DatabaseException
     */
    public function __construct(PDO $db)
    {
        $this->dao = DataAccessObject::factory($db);
    } // end __construct
    
    /**
     * @param string $table
     * @param array|null $select
     * @param array|null $joins
     * @param array|null $where
     * @param string|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @param string|null $groupBy
     * @param array|null $having
     * @return array|null
     * @throws \Jtrw\DAO\Exceptions\DatabaseException
     */
    public function select(string $table,
                           array $select = null,
                           ?array $joins = null,
                           ?array $where = null,
                           ?string $orderBy = null,
                           ?int $limit = null,
                           ?int $offset = null,
                           ?string $groupBy = null,
                           ?array $having = null
    ): ?array
    {
        $query = new Query($this->dao);
    
        $query->table($table);
        
        if ($select) {
            foreach ($select as $row) {
                $chunks = explode(" ", $row);
                $name = $chunks[0];
                $alias = $chunks[1] ?? null;
                $query->select($name, $alias);
            }
        }
    
        if ($joins) {
            $query->joins($joins);
        }
    
        if ($where) {
            $query->where($where);
        }
    
        if ($orderBy) {
            $query->orderBy($orderBy);
        }
    
        if ($limit) {
            $query->limit($limit, $offset);
        }
    
        if ($groupBy) {
            $query->groupBy($groupBy);
        }
    
        if ($having) {
            $query->having($having);
        }
        
        return $query->fetchAll();
    } // end select
}