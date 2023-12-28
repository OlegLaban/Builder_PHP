<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App;

use App\Builder\Interfaces\QueryBuilderInterface;

/**
 * Description of Application
 *
 * @author oleglaban
 */
class Application
{
    public function getSql(QueryBuilderInterface $sqlBuilder)
    {
        echo $sqlBuilder->from('table1 as t1')->where('t1.id = 2')->select('t1.id, t1.name')->getResult();
    }
}
