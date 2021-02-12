<?php
namespace Jtrw\DataAccessBridge\DTO;

interface QueryDtoInterface
{
    public function getTableName(): string;
    public function isMethodSelect(): bool;
    public function getJoins(): ?array;
    public function getSearch(): ?array;
    public function getOrderBy(): ?string;
}