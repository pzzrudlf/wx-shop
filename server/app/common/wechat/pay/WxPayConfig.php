<?php
namespace app\common\wechat\pay;

use think\Loader;

//require_once "WxPay.Config.Interface.php";
Loader::import('wechat.WxPay', EXTEND_PATH, '.Api.php');

class WxPayConfig extends \WxPayConfigInterface
{
	public function GetAppId()
	{
		return config('wechat.app_id');
	}

    public function GetAppSecret()
    {
        return config('wechat.app_secret');
    }

	public function GetMerchantId()
	{
		return config('wechat.mch_id');
	}

    public function GetKey()
    {
        return config('wechat.mch_key');
    }

	public function GetNotifyUrl()
	{
		return config("wechat.notify_url");
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
