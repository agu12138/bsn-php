<?php
require __DIR__ . '/vendor/autoload.php';

use VenYuanBSN\Config;
use VenYuanBSN\NodeServer;

function test()
{
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
        "nonce" => "uTAeXCVQHbrddfmzGAg/o4iV5jRxe6Et",//SendHelper::generateRandomString(),
        "chainCode" => "cc_app0001202203021319180253003_01",
        "funcName" => "set",
        "userName" => "",
        "transientData" => [
            "test" => "testtesttesttest"
        ]
    ]);
    var_dump($arr);
}

test();
