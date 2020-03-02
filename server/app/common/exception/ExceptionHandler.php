<?php


namespace app\common\exception;


use think\Log;
use think\Config;
use think\Request;
use think\exception\Handle;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    private $request_url;

    public function render(\Exception $e)
    {
        if($e instanceof BaseException)
        {
            // 用户自定义异常类
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            // 框架内部异常类
            // 服务器异常
            $flag = Config::get('app_debug');
            if($flag)
            {
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = '内部服务器错误';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $request = Request::instance();
        $this->request_url = $request->url();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $this->request_url,
        ];
        return json($result, $this->code);
    }

    private function recordErrorLog(\Exception $e)
    {
        // 开启log
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error'],
        ]);
        Log::record($e->getMessage(), 'error');
    }
}