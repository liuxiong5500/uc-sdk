# laravel 调用UC包



## install

this package  for >= laravel5.5

```
composer require siaoynli/laravel-upload
```

add the ServiceProvider to the providers array in config/app.php

```
Siaoynli\Upload\UploadServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```
 'Upload' => Siaoynli\Upload\Facades\Upload::class,
  'Thumb' => Siaoynli\Upload\Facades\Thumb::class,
```

Copy the package config to your local config with the publish command:

```
php artisan vendor:publish --provider="Siaoynli\Upload\UploadServiceProvider"
```

## Usage

```
use UcSdk\UC\UCApplication;

$params = [
            'data' => [
                'corpId' => 'ww1b87bc16f9e37c6f',
            ],
        ];
$result = (new UCApplication())['enterprise']->detailByCorpId($params);

```



## Result

```
//UCApplication  result

Array
(
    [status] => true
    [data] => Array
        (
            [epId] => 734F30DE7F000001381C7A564D2D77B5
            [isStandard] => 1
            [epEnumber] => 734F30DE7F000001381C7A564D2D77B5
            [epDomain] => orangedental-test.vchangyi.com
            [epIntroduce] => 
            [epName] => ohwawa
            [epRegemail] => 
            [epRegmobile] => 
            [epRegrealname] => 
            [epDbhost] => 
            [epDbport] => 3306
            [epDbuser] => 
            [epDbpw] => 
            [epDbname] => 
            [epIndustry] => 家电/数码
            [epCompanysize] => 51~500人
            [epRef] => 
            [epCity] => 
            [epProvince] => 
            [epArea] => 
            [epAddress] => 
            [epPostalCode] => 
            [epContacter] => 黄晓敏
            [epContactmobile] => 18700465991
            [epContactemail] => 
            [epContactposition] => 
            [corpSquareLogo] => enterprise/20181210/734F30DE7F000001381C7A564D2D77B5SQUARELOGO.jpg
            [corpWxqrcode] => enterprise/20181210/734F30DE7F000001381C7A564D2D77B5QRCODE.jpg
            [epOwnerStatus] => 0
            [corpName] => ohwawa
            [epCreated] => 1543827828958
            [corpId] => ww1b87bc16f9e37c6f
            [epThirdOpened] => 0
            [epStatus] => 1
            [epUpdated] => 1551686295775
            [epDeleted] => 0
            [epCreateType] => 2
            [epSequence] => 1586
            [evUsedUserTotal] => 0
            [evAvailableUserTotal] => 0
            [evUsedDiskTotal] => 18519169
            [evAvailableDiskTotal] => 0
            [evUsedNetworkTotal] => 0
            [evAvailableNetworkTotal] => 0
            [evExpireDate] => 0
            [evAvailableDate] => 0
            [evType] => 0
        )

)


//UCApplication error
Array
(
    [status] => false
    [data] => Array
        (
            [code] => ERROR_SYNTAX
            [msg] => 参数语法错误
            [timestamp] => 1564709989218
            [requestId] => 4FFBAB557F00000173C6589E7883AD4B
        )

    [message] => ERROR_SYNTAX-参数语法错误-4FFBAB557F00000173C6589E7883AD4B
)


```

