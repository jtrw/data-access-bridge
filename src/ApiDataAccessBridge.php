<?php

namespace Jtrw\DataAccessBridge;

use Jtrw\DataAccessBridge\DTO\QueryDtoInterface;
use Jtrw\DataAccessBridge\Exceptions\DataViewException;
use Jtrw\DataAccessBridge\Repository\DataBaseInterface;

/**
 * Class ApiDataAccessBridge
 * @package Jtrw\DataAccessBridge
 */
class ApiDataAccessBridge
{
    use ExceptionHandleTrait;
    
    /**
     * @var DataBaseInterface
     */
    protected DataBaseInterface $db;
    /**
     * @var QueryDtoInterface
     */
    protected QueryDtoInterface $dto;
    
    /**
     * ApiDataAccessBridge constructor.
     * @param DataBaseInterface $db
     * @param QueryDtoInterface $dto
     */
    public function __construct(DataBaseInterface $db, QueryDtoInterface $dto)
    {
        $this->db = $db;
        $this->dto = $dto;
    } // end __construct
    
    /**
     * @return array
     */
    public function init(): array
    {
        try {
            return $this->doInit();
        } catch (DataViewException $exp) {
            return $this->handleException($exp);
        } catch (\Throwable $exp) {
            return $this->handleException($exp);
        }
    } // end init
    
    /**
     * @return array
     * @throws DataViewException
     */
    protected function doInit(): array
    {
        if ($this->dto->isMethodSelect()) {
            return $this->select();
        }
    
        throw new DataViewException("Method is Restricted");
    } // end doInit
    
    /**
     * @return array
     */
    public function select(): array
    {
        $data = $this->db->select(
            $this->dto->getTableName(),
            $this->dto->getSelect(),
            $this->dto->getJoins(),
            $this->dto->getSearch(),
            $this->dto->getOrderBy()
        );
        
        if (is_null($data)) {
            $data = [];
        }
        
        return $data;
    } // end select
}