<?php 
include "vendor/autoload.php";
use Carbon\Carbon;
use GuzzleHttp\Client;
class MbBank {

    protected $captchaKey = "c2c8bf54cfc3472f8fd1831234da617b";
    protected $_timeout = 15;

    protected $ImageString;

    protected $ApiKey = '1dfecbecab0c04e0a3c201c2e32b1c2e';

    protected $CaptchaCode;

    protected $client;

    public function __construct() {
        $this->client = new Client(['http_errors' => false]);
    }

    public function getTaskResult($taskId){
        $client = new Client(['http_errors' => false]);
        $res = $client->request('POST', 'https://api.anti-captcha.com/getTaskResult', array(
            'json' => array(
                'clientKey' => $this->captchaKey,
                'taskId' => $taskId
            ),
            'timeout' => $this->_timeout,
            'headers'     => ['Content-Type'      => 'application/json;'],
        ));

        $data = json_decode($res->getBody(),true);
        return $data;
    }


    public function solveCaptcha($captchaImage){
        $client = new Client(['http_errors' => false]);
        $res = $client->request('POST', 'https://api.anti-captcha.com/createTask', array(
            'json' => array(
                'clientKey' => $this->captchaKey,
                'task'    => [
                    'body' => $captchaImage,
                    'type' => 'ImageToTextTask'
                ],
            ),
            'timeout' => $this->_timeout,
            'headers'     => ['Content-Type'      => 'application/json;'],
        ));
        $data = json_decode($res->getBody(),true);
        return $data;
    }

    public function Solve_Captcha() {
        $curl = curl_init();
        $dataPost = array(
        "api_key" => $this->ApiKey,
        "img_base64" => $this->ImageString
        );
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ecaptcha.sieuthicode.net/api/captcha/mbbank',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$dataPost,
        ));

        $response = json_decode(curl_exec($curl),true);

        $this->CaptchaCode = $response['data']['captcha'];

        curl_close($curl);
        return $response;
    }



    public function getCaptcha() {
        try {
            $res = $this->client->request('POST', 'https://online.mbbank.com.vn/api/retail-web-internetbankingms/getCaptchaImage', array(
                'json' => array(
                    'sessionId'    => "",
                    'refNo'     => date('YmdHms'),
                    'deviceIdCommon' => $this->generateImei()
                ),
                'timeout' => $this->_timeout,
                'headers'     => $this->headerDefault(),
            ));
            $data = json_decode($res->getBody(),true);
            $this->ImageString = $data['imageString'];
            $this->Solve_Captcha();
            return;
        } catch (\Throwable $e) {
            dd($e);
        }

    }


    public function doLogin($username,$password) {
        try {
            $this->getCaptcha();
            $params = array(
                'userId'    => $username,
                'password'  => md5($password),
                'refNo'     => $this->ref_no($username),
                'deviceIdCommon' => $this->generateImei(),
                'captcha' => $this->CaptchaCode

            );
            $res = $this->client->request('POST', 'https://online.mbbank.com.vn/retail_web/internetbanking/doLogin', array(
                'json' => $params,
                'timeout' => $this->_timeout,
                'headers' => $this->headerDefault(),  
            ));
            $data = json_decode($res->getBody());
            return $data;
        } catch (\Throwable $e) {
            dd($e);
        }
    }


    public function getBalance($SessionId, $DeviceIdCommon) {
       
        try {
            $res = $this->client->request('POST', 'https://online.mbbank.com.vn/retail-web-accountms/getBalance', array(
                'json' => array(
                    'sessionId'     => $SessionId,
                    'refNo'         => $this->ref_no('tienpropeat1'),
                    'deviceIdCommon' => $DeviceIdCommon,
                ),
                'timeout' => $this->_timeout,
                'headers'     => $this->headerDefault()
            ));
            return (json_decode($res->getBody(),true))['acct_list'];
        } catch (\Throwable $e) {
        }
        return false;
    }

    public function ref_no($username) {
        return  $username . '-' . date('YmdHms');
    }

    public function generateImei() {
        return $this->generateRandomString(8) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(12);
    }

    private function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    private function headerDefault() {
        return [
            'Host'              => 'online.mbbank.com.vn',
            'Content-Type'      => 'application/json; charset=UTF-8',
            'User-Agent'        => 'MB%20Bank/2 CFNetwork/1331.0.3 Darwin/21.4.0',
            'Connection'        => 'keep-alive',
            'Accept'            => 'application/json',
            'Accept-Language'   => 'vi-VN,vi;q=0.9',
            'Authorization'     => 'Basic QURNSU46QURNSU4=',
            'Accept-Encoding'   => 'gzip, deflate, br'
        ];
    }
}