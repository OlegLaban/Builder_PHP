<?php

require 'vendor/autoload.php';

use App\Application;
use App\Builder\SqlQueryBuilder;


$app = new Application();
$builder = new SqlQueryBuilder();

$app->getSql($builder);