<?php
namespace app\common\wechat\pay;

use think\Loader;

//require_once "WxPay.Config.Interface.php";
Loader::import('wxpay.WxPay', EXTEND_PATH, '.Api.php');

class WxPayConfig extends \WxPayConfigInterface
{
	public function GetAppId()
	{
		return config('wxpay.app_id');
	}

    public function GetAppSecret()
    {
        return config('wxpay.app_secret');
    }

	public function GetMerchantId()
	{
		return config('wxpay.mch_id');
	}

    public function GetKey()
    {
        return config('wxpay.mch_key');
    }

	public function GetNotifyUrl()
	{
		return config("wxpay.notify_url");
	}

	public function GetSignType()
	{
		return "HMAC-SHA256";
	}

	public function GetProxy(&$proxyHost, &$proxyPort)
	{
		$proxyHost = "0.0.0.0";
		$proxyPort = 0;
	}

	public function GetReportLevenl()
	{
		return 1;
	}

	public function GetSSLCertPath(&$sslCertPath, &$sslKeyPath)
	{
		$sslCertPath = '../cert/apiclient_cert.pem';
		$sslKeyPath = '../cert/apiclient_key.pem';
	}
}
