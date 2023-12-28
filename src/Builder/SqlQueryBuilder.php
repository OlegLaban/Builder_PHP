<?php

namespace App\Builder;

use App\Builder\Interfaces\QueryBuilderInterface;
use App\Exceptions\Builder\InvalidArgumentException;

/**
 * Description of SqlQueryBuilder
 *
 * @author oleglaban
 */
class SqlQueryBuilder implements QueryBuilderInterface
{
    
    /** @var array */
    private array $sqlParts = [];
    
    /**
     * @param string $table
     * @return QueryBuilderInterface
     */
    public function from(string $table): QueryBuilderInterface
    {
        $this->sqlParts['from'] = $table;
        
        return $this;
    }

    /**
     * @param string $table
     * @param string $condition
     * @param string $tableAlias
     * @return QueryBuilderInterface
     */
    public function leftJoin(string $table, string $condition, string $tableAlias): QueryBuilderInterface
    {
        $this->sqlParts['join'][] = compact(['table', 'condition', 'tableAlias']);
        
        return $this;
    }
    
    /**
     * @return QueryBuilderInterface
     */
    public function reset(): QueryBuilderInterface
    {
        $this->sqlParts = [];
        
        return $this;
    }
    
    /**
     * @param array $columns
     * @return QueryBuilderInterface
     */
    public function select(string $columns): QueryBuilderInterface
    {
        $this->sqlParts['select'] = $columns;
        
        return $this;
    }

    /**
     * @param string $condition
     * @return QueryBuilderInterface
     */
    public function where(string $condition): QueryBuilderInterface
    {
        $this->sqlParts['where'] = $condition;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getResult(): string
    {
        return sprintf(
                'SELECT %s FROM %s WHERE %s',
                $this->getSelect(),
                $this->getFrom(),
                $this->getWhere()
            );
    }
    
    /**
     * @return string
     * @throws InvalidArgumentException
     */
    private function getSelect(): string
    {
        $sqlSelect = $this->sqlParts['select'];
        
        if (!empty($sqlSelect)) {
            return $sqlSelect;
        }
        
        throw new InvalidArgumentException();
    }
    
    /**
     * @return string
     * @throws InvalidArgumentException
     */
    private function getFrom(): string
    {
        $sqlFrom = $this->sqlParts['from'];
        
        if (!empty($sqlFrom)) {
            return $sqlFrom;
        }
        
        throw new InvalidArgumentException();
    }
    
    private function getWhere(): string
    {
        $sqlWhere = $this->sqlParts['where'];

        if (!empty($sqlWhere)) {
            return $sqlWhere;
        }

        throw new InvalidArgumentException();
    }
}
