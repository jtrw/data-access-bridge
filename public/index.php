<?php

require_once "../vendor/autoload.php";
if (file_exists("local.php")) {
    include_once "local.php";
}
/* @var $CONFIG */
$db = new PDO($CONFIG['db']['dsn'], $CONFIG['db']['user'], $CONFIG['db']['password']);

$res = $db->query('SET NAMES utf8');

if (!$res) {
    throw new Exception(__('Database connection error'));
}

use Jtrw\DataAccessBridge\ApiDataAccessBridge;
use Jtrw\DataAccessBridge\Repository\MysqlPdoDataBaseAdapter;
use Jtrw\DataAccessBridge\DTO\JsonRpcDto;

$api = new ApiDataAccessBridge(
    new MysqlPdoDataBaseAdapter($db),
    new JsonRpcDto(file_get_contents('php://input'))
);


header('Content-Type: application/json');
echo json_encode($api->init());