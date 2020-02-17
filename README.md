#   微信支付设置在server/app/extra/wxpay.php文件中设置

```php
<?php
return [
    'app_id'     => '', //小程序应用id
    'app_secret' => '', //小程序secret
    'mch_id'     => '', //商户ID
    'mch_key'    => '', //商户平台自己设定的32位API密钥
    'notify_url' => 'https://域名/api/v1/pay/notify', //回调地址
    'domain'     => 'https://域名'
];
```