<?php
namespace Jtrw\DataAccessBridge\DTO;

use Jtrw\DataAccessBridge\Exceptions\JsonRpcException;

class JsonRpcDto implements QueryDtoInterface
{
    private const METHOD_SELECT = "select";
    
    protected array $data;
    
    public function __construct(string $string)
    {
        $data = json_decode($string, true, 512, JSON_THROW_ON_ERROR);
        $this->data = $data;
    } // end __construct
    
    public function getTableName(): string
    {
        if (empty($this->data['params']['table'])) {
            throw new JsonRpcException("Table Not Found");
        }
        return $this->data['params']['table'];
    } // end getTableName
    
    public function getSelect(): ?array
    {
        return $this->data['params']['select'] ?? null;
    } // end getSelect
    
    public function getJoins(): ?array
    {
        return $this->data['params']['join'] ?? null;
    } // end getJoins
    
    public function getSearch(): ?array
    {
        return $this->data['params']['search'] ?? null;
    } // end getSearch
    
    public function getOrderBy(): ?string
    {
        return $this->data['params']['order'] ?? null;
    } // end getOrderBy
    
    public function isMethodSelect(): bool
    {
        $method = $this->data['method'];
        
        return $method === static::METHOD_SELECT;
    } // end isMethodSelect
}