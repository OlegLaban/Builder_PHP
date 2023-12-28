<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace App\Builder\Interfaces;

/**
 *
 * @author oleglaban
 */
interface QueryBuilderInterface
{
    public function reset(): self;
    
    public function select(string $columns): self;
    
    public function from(string $table): self;
    
    public function leftJoin(string $table, string $condition, string $tableAlias): self;
    
    public function where(string $condition): self;
}
