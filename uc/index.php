<?php

require_once './vendor/autoload.php';

use UcSdk\UC\UCApplication;

$params = [
            'data' => [
                // 'corpId' => 'ww1b87bc16f9e37c6f',
            ],
        ];
$a = (new UCApplication())['enterprise']->detailByCorpId($params);
print_r($a);die;