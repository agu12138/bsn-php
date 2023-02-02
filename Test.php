<?php
require __DIR__ . '/vendor/autoload.php';

use venyuanbsn\Config;
use venyuanbsn\NodeServer;
use venyuanbsn\SendHelper;


$config = Config::initConfig([
    "reqUrl" => "https://nanjingtxynode.bsngate.com:17602",
    "appInfo" => [
        "AppCode" => "app0001202203021319180253003"
    ],
    "userCode" => "USER0001202203010919464625764",
    "mspDir" => "./mspdir",
    "httpsCert" => ""
]);

$node = new NodeServer($config);

$arr[] = $node->RegisterUser([
    "name" => "abc",
    "secret" => "456"
]);

$arr[] = $node->ReqChainCode([
    "args" => ['{"baseKey":"test202004212211","baseValue":"this is string111 "}'],
    "nonce" => SendHelper::generateRandomString(),
    "chainCode" => "cc_app0001202203021319180253003_01",
    "funcName" => "set",
    "userName" => "",
    "transientData" => [
        "test" => "testtesttesttest"
    ]
]);

//aaaaaaaaaaaaaaaaaaaaa
var_dump($arr);
