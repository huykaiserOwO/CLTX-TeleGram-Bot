<?php
class ZaloPay {

    public $device_model = 'iPhone14,3';

    
    public function getBalance($AccessToken) {
        $headers = array(
            'Authorization: Bearer ' . $AccessToken,
            'x-device-id: 3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-access-token: ' . $AccessToken,
            'x-zalo-id: 983361338403216366',
            'x-zalopay-id: 230326001509714',
            'Host: api.zalopay.vn',
            'x-platform: NATIVE',
            'x-device-os: ANDROID',
            'x-user-id: ',
            'x-app-version: ',
            'user-agent: ',
            'x-density: ',
            'x-device-model: iPhone11,6'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.zalopay.vn/v2/user/balance");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data,true);
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getOrderInfo($orderCode,$Cookie)
    {
        $headers = array(
            'Cookie: ' . $Cookie,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sapi.zalopay.vn/mt/v5/order/" . $orderCode);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }

    public function getOrderInfo_web($orderCode,$Cookie)
    {
        $headers = array(
            'Host: sapi.zalopay.vn',
            'Cookie: ' . $Cookie,
            'Accept: */*',
            'Origin: https://social.zalopay.vn',
            'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_0_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/8.6.0 OS/16.0.2 Platform/ios Secured/true  ZaloPayWebClient/8.6.0',
            'Accept-Language: vi-VN,vi;q=0.9',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sapi.zalopay.vn/mt/v5/order/" . $orderCode);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
    public function getHistoryV2($limit, $Cookie, $AccessToken)
    {
        // echo $limit;
        $headers = array(
            'x-access-token: ' . $AccessToken,
            'Connection: keep-alive',
            'x-device-model: iphone15,2',
            'x-device-id: 3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os: IOS',
            'x-density: iphone3x',
            'Cookie: ' . $Cookie,
            'x-os-version: 17.3.1',
            'x-zalo-id: 983361338403216366',
            'x-app-version: 9.4.0',
            'x-user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host: sapi.zalopay.vn',
            'User-Agent: ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform: NATIVE',
            'x-zalopay-id: 230326001509714',
            'sessionid: GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization: Bearer ' . $AccessToken
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/history/transactions?page_size=' . $limit);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($data, true);

        return $data;
    }

    public function GET_TRANS_BY_TID($ID, $AccessToken)
    {
        $headers = array(
            'Host: sapi.zalopay.vn',
            'x-device-os: ANDROID',
            'x-platform" ZPA',
            'authorization: Bearer ' . $AccessToken . '',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sapi.zalopay.vn/v2/history/transactions/$ID?type=1");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $json = json_decode($data, true);
        curl_close($ch);
        return $json;
    }

    public function LayLsGd($Cookie,$AccessToken,$limit) {
        $getTransId = ($this->getHistoryV2($limit,$Cookie,$AccessToken))['data']['transactions'];
        if (!empty($getTransId)) {
            foreach($getTransId as $data) {
                $TransIdArray[] = array(
                    'TransId' => $data['trans_id'],
                );
            }
            foreach($TransIdArray as $TranId) {
                $getLsgData = ($this->GET_TRANS_BY_TID($TranId['TransId'],$AccessToken))['data'];
                if (!empty($getLsgData)) {
                    foreach($getLsgData as $Lsgd) {
                        $LsgdArray[] = array(
                            'trans_id' => $Lsgd['app_trans_id'],
                            'ThoiGian' => $Lsgd['trans_time'],
                            'NguoiGui' => ($Lsgd['template_info'])['custom_fields'][1]['value'],
                            'SoTienGui' => (int)$Lsgd['trans_amount'],
                            'NoiDung' => $Lsgd['description'],
                            'SoDu' => $Lsgd['balance_snapshot']
                        );
                    }
                }
            }
            return $LsgdArray;
        } else {
            return [
                'Status' =>  'error'
            ];
        }
    }

    // ==============================[ chuyển tiền trên web bằng sapi ]==============================
    public function get_info_web($phone,$Cookie, $AccessToken)
    {
        $headers = array(
            'x-access-token: ' . $AccessToken,
            'Connection: keep-alive',
            'x-device-model: iphone15,2',
            'x-device-id: 3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os: IOS',
            'x-density: iphone3x',
            'Cookie: ' . $Cookie,
            'x-os-version: 17.3.1',
            'x-zalo-id: 983361338403216366',
            'x-app-version: 9.4.0',
            'x-user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host: sapi.zalopay.vn',
            'User-Agent: ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform: NATIVE',
            'x-zalopay-id: 230326001509714',
            'sessionid: GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization: Bearer ' . $AccessToken

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/ibft/web/get-user-info?phone=84'.substr($phone, 1, 9));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        // echo $data;
        $json = json_decode($data, true);
        curl_close($ch);
        return $json;
    }

    public function Get_zalo_access_token($Cookie , $AccessToken) {
        $headers = array(
            'x-access-token: ' . $AccessToken,
            'Connection: keep-alive',
            'x-device-model: iphone15,2',
            'x-device-id: 3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os: IOS',
            'x-density: iphone3x',
            'Cookie: ' . $Cookie,
            'x-os-version: 17.3.1',
            'x-zalo-id: 983361338403216366',
            'x-app-version: 9.4.0',
            'x-user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host: sapi.zalopay.vn',
            'User-Agent: ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform: NATIVE',
            'x-zalopay-id: 230326001509714',
            'sessionid: GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization: Bearer ' . $AccessToken

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/zalo/access-token');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $json = json_decode($data, true);
        curl_close($ch);
        return $json;
    }

    public function Get_token_sendmoney($data_zalo_token, $Cookie, $AccessToken)
    {
        $headers = array(
            'Host: graph.zalo.me',
            'Cookie: ' . $Cookie,
            'Accept: */*',
            'Origin: https://social.zalopay.vn',
            'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_0_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/8.6.0 OS/16.0.2 Platform/ios Secured/true  ZaloPayWebClient/8.6.0',
            'Accept-Language: vi-VN,vi;q=0.9',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://graph.zalo.me/v2.0/ottoken?access_token='.$data_zalo_token['data']['zalo_access_token']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $json = json_decode($data, true);
        curl_close($ch);
        return $json;
    }

    public function Order_Money_web($info, $data_token, $msg, $amount = 0, $Cookie, $AccessToken)
    {
        $data = array(
            "receiver_zalopay_id" => $info['data']['zalopay_id'],
            "receiver_zalo_id" => $info['data']['zalo_id'],
            "receiver_name" => $info['data']['name'],
            "receiver_avatar" => $info['data']['avatar'],
            "amount" => $amount,
            "note" => $msg,
            "zalo_token" => $data_token['token'],
            "media" => array(
                "greeting_card" => array(
                    "theme_id" => "133"
                )
            ),
            "utoken" => "",
            "zpp" => $Cookie,
        );
        $headers = array(
            'x-access-token: ' . $AccessToken,
            'Connection: keep-alive',
            'x-device-model: iphone15,2',
            'x-device-id: 3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os: IOS',
            'x-density: iphone3x',
            'Cookie: ' . $Cookie,
            'x-os-version: 17.3.1',
            'x-zalo-id: 983361338403216366',
            'x-app-version: 9.4.0',
            'x-user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host: sapi.zalopay.vn',
            'User-Agent: ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform: NATIVE',
            'x-zalopay-id: 230326001509714',
            'sessionid: GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization: Bearer ' . $AccessToken

        );
        return $this->CURL('https://sapi.zalopay.vn/mt/v5/create-order-v2', $headers, $data);
    }

    public function Get_assets_web($info, $Cookie, $AccessToken)
    {
        $data = json_encode(
            array(
                "display_mode" => 1,
                "token_data" => array(
                    "order_token" => $info['data']['order_token']
                ),
                "full_assets" => true,
                "order_data" => array(),
                "order_type" => 3,
            )
        );
        $headers = array(
            "Accept" => "*/*",
            "Accept-Encoding" => "gzip, deflate, br, zstd",
            "Accept-Language" => "en-US,en;q=0.9",
            "Connection" => "keep-alive",
            "Content-Length" => 304,
            "Content-Type" => "text/plain;charset=UTF-8",
            "Cookie" => "has_device_id=0; zalo_id=983361338403216366; zalopay_id=230326001509714; zalo_oauth=RRY8bQ1J_LKDbE_QZbMlN3IfsDh0SRXNVQEhsPHiWovjjEFP_NhpKtkuiBN7HC4_Dfwcjub7jJy0YPtE_5N_DMMNxBddLfO_MgFIx8j5i6OldAhDr6-y9IwpXiQIMEaKMSNCteeVlKD_rSUgd521G2BWWiYxBkOxFUZ_fgmCgJOgmitzsHosOnA7v8g-4w8kE9I3mgLHbb4da__VtYxlTbQ8aUYm2jW8MOwUhVyFuauKaRASo03K2qZ6lfZF3BaZ5eRznwqiVZDWmmk2oGKh7tpmJuYE3miFQ-nOiUKdUNGWv5AIwWbagLIPPXBbRLXqJgCSnuj9RoX1zMxeh6HeUZ_J6-ozR14U9SW9-C0U26zNqGwFMIOXqyqre7MhKm; zlp_token=3SHq5X4LLz8WXrfQ6qR3RVbq25nv2Soh4cUiaEuRXUNeDPV2kgoVSJgNQctiukDc3R8Vuno9FH33VVjhuyDxySJtc6sTGveniVZp6uVpvUTZKLT9kFrsxgMtS5vybee7jZVnruvzVJyZCDnktLSXotSpUBUbR4FRay8QezimZEFRSvWZ89P6t; _ga=GA1.1.16041641.1712781414; _ga_XWW4JEB21X=GS1.1.1712781414.1.1.1712781905.51.0.0",
            "Host" => "sapi.zalopay.vn",
            "Origin" => "https://social.zalopay.vn",
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/cashier/assets');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        $access = json_decode($result, true);
        return $access;
    }

    public function Pay_Money_web($info, $Cookie, $AccessToken)
    {
        $data = json_encode(array(
            "authenticator" => array(
                "authen_type" => 1,
                "pin" => hash("sha256", '010224'),
            ),
            "order_fee" => [0],
            "order_token" => $info['data']['order_token'],
            "promotion_token" => "",
            "service_id" => 19,
            "sof_token" => $info['data']['source_of_fund']['sof_token'],
            "user_fee" => [0],
            "zalo_token" => "",
            "callback_url" => "zalo => //qr/jp/nibvlsoj2j?cb_t=dotp&k=".time()."&otp=",
            "card" => null,
            "is_zmp" => false
        ));
        $headers = array(
            'x-access-token: ' . $AccessToken,
            'Connection: keep-alive',
            'x-device-model: iphone15,2',
            'x-device-id: 3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os: IOS',
            'x-density: iphone3x',
            'Cookie: ' . $Cookie,
            'x-os-version: 17.3.1',
            'x-zalo-id: 983361338403216366',
            'x-app-version: 9.4.0',
            'x-user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host: sapi.zalopay.vn',
            'User-Agent: ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform: NATIVE',
            'x-zalopay-id: 230326001509714',
            'sessionid: GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization: Bearer ' . $AccessToken

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/cashier/pay');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        $access = json_decode($result, true);
        return $access;
    }

    public function Status_send_money_web($info, $sof_token, $Cookie)
    {
        $headers = array(
            'Host: sapi.zalopay.vn',
            'Cookie: ' . $Cookie,
            'Accept: */*',
            'Origin: https://social.zalopay.vn',
            'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_0_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/8.6.0 OS/16.0.2 Platform/ios Secured/true  ZaloPayWebClient/8.6.0',
            'Accept-Language: vi-VN,vi;q=0.9',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/cashier/result?zp_trans_id='.$info['data']['zp_trans_id_encode'].'&order_token='.$info['data']['order_token'].'&sof_token='.$sof_token);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $json = json_decode($data, true);
        curl_close($ch);
        return $json;
    }

    public function SendMoney_web($phone, $msg, $amount, $Cookie, $AccessToken)
    {
        // check name
        $check_info = $this->get_info_web($phone, $Cookie, $AccessToken);
        if (empty($check_info['data'])) {
            return array(
                'status' => 'error',
                'type' => 'info',
                'message' => $check_info['error']['details']['localized_message']['message'],
            );
        }
        // get zalo access_token
        $data_zalo_token =  $this->Get_zalo_access_token($Cookie, $AccessToken);
        $data_token = $this->Get_token_sendmoney($data_zalo_token, $Cookie, $AccessToken);
        $result = $this->Order_Money_web($check_info, $data_token, $msg, $amount, $Cookie, $AccessToken);
        $order_no = $result['data']['order_no'];
        if (empty($result)) {
            return array(
                'status' => 'error',
                'type' => 'error',
                'message' => 'Lỗi Dữ Liệu Chuyển Tiền',
            );
        }
        if (empty($result['data'])) {
            return array(
                'status' => 'error',
                'type' => 'error',
                'message' => 'Không Thể Tạo Đơn Chuyển Tiền',
            );
        }
        // get dữ liệu chuyển tiền
        $result2 = $this->Get_assets_web($result,$Cookie, $AccessToken);
        // print_r($result2); die;
        if (empty($result2) || empty($result['data'])) {
            return array(
                'status' => 'error',
                'type' => 'error',
                'message' => 'Không Thể Lấy Thông Tin Chuyển Tiền',
            );
        }
        $sof_token = $result2['data']['source_of_fund']['sof_token'];
        $message = $result2['data']['source_of_fund']['message'];
        $balance = $result2['data']['source_of_fund']['balance'];
        // check số dư
        if ($balance < $amount) {
            return array(
                'status' => 'error',
                'type' => 'not_money',
                'message' => 'Số Dư Không Đủ',
            );
        }
        // chuyển tiền
        $send = $this->Pay_Money_web($result2, $Cookie, $AccessToken);
        // print_r($send); die;
        if (empty($send)) {
            return array(
                'status' => 'error',
                'type' => 'error',
                'message' => 'Không Thể Chuyển Tiền',
            );
        }

        if (isset($send['data']) && $send['data']['is_processing'] == 1) {
            return array(
                'status' => 'success',
                'message' => 'Chuyển Tiền Thành Công',
                'data' => array(
                    'partner_name' => $check_info['data']['name'],
                    'partner_id' => $check_info['data']['zalopay_id'],
                    'avatar' => $check_info['data']['avatar'],
                    'amount' => $amount,
                    'comment' => $msg
                ),
            );
        } else {
            return array(
                'status' => 'error',
                'type' => 'error',
                'message' => 'Chuyển Tiền Thất Bại',
            );
        }
    }
    // ====================================[ CHUYỂN TIỀN VỀ NGÂN HÀNG TRÊN WEB ]====================================

    public function get_name_bank_web($stk, $bankcode,$Cookie)
    {
        $data = json_encode(array(
            "timeout" => 3000,
            "bankCode" => $bankcode,
            "number" => $stk
        ));
        $headers = array(
            'Origin: https://social.zalopay.vn',
            'Connection: keep-alive',
            'Sec-Fecth-Site: same-site',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',
            'Cookie: ' . $Cookie,
            'Host: scard.zalopay.vn',
            'Referer: ',
            'Content-Length: ' . strlen($data)
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://scard.zalopay.vn/v2/ibft-pci/web/bank-account/account');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        $access = json_decode($result, true);
        return $access;
    }

    public function createorder_send_bank_web($stk, $config_bank, $amount, $description, $Cookie)
    {
        $bankcode = $config_bank['data']['bank_code'];
        $data = json_encode(array(
            "bank_code" => $bankcode,
            "number" => $stk,
            "save" => true,
            "inquiry_info" => $config_bank['data']['inquiry_info'],
            "amount" => $amount,
            "receiver_name" => $config_bank['data']['full_name'],
            "user_note" => $description
        ));
        $headers = array(
            'Origin: https://social.zalopay.vn',
            'Connection: keep-alive',
            'Sec-Fecth-Site: same-site',
            'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Cookie: ' . $Cookie,
            'Host: scard.zalopay.vn',
            'Referer: ',
            'Content-Length: ' . strlen($data)
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://scard.zalopay.vn/v2/ibft-pci/web/create-order/account');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        $access = json_decode($result, true);
        return $access;
    }

    public function assets_bank_web($order, $Cookie)
    {
        $appid = $order['data']['app_id'];
        $appuser = $order['data']['app_user'];
        $apptime = $order['data']['app_time'];
        $amount = $order['data']['amount'];
        $apptransid = $order['data']['app_trans_id'];
        $embeddata = $order['data']['embeddata'];
        $item = $order['data']['item'];
        $mac = $order['data']['mac'];
        $feeamount = $order['data']['fee_amount'];
        $description = $order['data']['description'];
        $data = '{
            "order_type": "FULL_ORDER",
            "full_assets": true,
            "order_data": {
                "app_id": ' . $appid . ',
                "app_trans_id": "' . $apptransid . '",
                "app_time": ' . $apptime . ',
                "app_user": "' . $appuser . '",
                "amount": ' . $amount . ',
                "item": ' . json_encode($item) . ',
                "description": "' . $description . '",
                "embed_data": ' . json_encode($embeddata) . ',
                "mac": "' . $mac . '",
                "trans_type": 1,
                "product_code": "TF007",
                "service_fee": {
                "fee_amount": ' . $feeamount . ',
                "total_free_trans": 0,
                "remain_free_trans": 0
                }
            },
            "token_data": {
                "trans_token": "",
                "app_id": ' . $appid . '
            },
            "campaign_code": "",
            "display_mode": 1
        }';
        $headers = array(
            'Host: sapi.zalopay.vn',
            'Accept:*/*',
            'Cookie: ' . $Cookie,
            'Content-Length:'.strlen($data),
            'Accept-Language:en-US,en;q=0.9',
            'Connection:keep-alive',
            'Content-Type:text/plain;charset=UTF-8',
            'Origin:https://social.zalopay.vn',
            'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36'
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sapi.zalopay.vn/v2/cashier/assets',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    public function pay_bank_web($assets, $Pasword, $Cookie)
    {
        $data = json_encode(array(
            "authenticator" => array(
                "authen_type" => 1,
                "pin" => hash("sha256", $Pasword),
            ),
            "order_fee" => [0],
            "order_token" => $assets['data']['order_token'],
            "promotion_token" => "",
            "service_id" => 19,
            "sof_token" => $assets['data']['sources_of_fund'][0]['sof_token'],
            "user_fee" => [0],
            "zalo_token" => "",
            "callback_url" => "zalo://qr/jp/nibvlsoj2j?cb_t=dotp&k=".time()."&otp=",
            "card" => null,
            "is_zmp" => false
        ));
        $headers = array(
            'Host: sapi.zalopay.vn',
            'Accept:*/*',
            'Cookie: ' . $Cookie,
            'Content-Length:'.strlen($data),
            'Accept-Language:en-US,en;q=0.9',
            'Connection:keep-alive',
            'Content-Type:text/plain;charset=UTF-8',
            'Origin:https://social.zalopay.vn',
            'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sapi.zalopay.vn/v2/cashier/pay');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        $access = json_decode($result, true);
        return $access;
    }


    public function SendMoney_Bank_web($stk, $amount, $description, $config_bank, $CookieBank, $Password, $AccessToken)
    {
        $get_name_bank = $this->get_name_bank_web($stk, $config_bank['data']['bank_code'],$CookieBank);
        if (empty($get_name_bank['data'])) {
            return array(
                'status' => 'error',
                'message' => 'Số Tài Khoản Không Hợp Lệ',
            );
        }
        $numberBank = substr($stk, -4);
        
        $order = $this->createorder_send_bank_web($stk, $config_bank, $amount, $description,$CookieBank);
        // print_r($order); die;
        if (empty($order)) {
            return array(
                'status' => 'error',
                'message' => 'Lỗi Dữ Liệu Chuyển Tiền',
            );
        }
        if (empty($order['data'])) {
            return array(
                'status' => 'error',
                'message' => 'Không Thể Tạo Đơn Chuyển Tiền',
            );
        }
        // if ($order['data']['appid'] == 0) {
        //     return array(
        //         'status' => 'error',
        //         'message' => $order['returnmessage'],
        //     );
        // }

        $assets = $this->assets_bank_web($order,$CookieBank);
        if (empty($assets) || empty($assets['data'])) {
            return array(
                'status' => 'error',
                'message' => 'Không Thể Lấy Thông Tin Chuyển Tiền',
            );
        }
        $sof_token = $assets['data']['source_of_fund']['sof_token'];
        $message = $assets['data']['source_of_fund']['message'];
        $balance = $assets['data']['source_of_fund']['balance'];
        if ($balance < $amount) {
            return array(
                'status' => 'error',
                'message' => 'Số Dư Không Đủ',
            );
        }
        $pay_bank = $this->pay_bank_web($assets,$Password,$CookieBank);
        if (empty($pay_bank)) {
            return array(
                'status' => 'error',
                'message' => 'Không Thể Chuyển Tiền',
            );
        }
        if (isset($pay_bank['data']) && $pay_bank['data']['is_processing'] == 1) {
            return array(
                'status' => 'success',
                'message' => 'Chuyển Tiền Thành Công',
                'data' => array(
                    'partner_stk' => $stk,
                    'partner_name' => $get_name_bank['data']['full_name'],
                    'amount' => $amount,
                    'comment' => $description
                ),
            );
        } else {
            return array(
                'status' => 'error',
                'type' => 'error',
                'message' => 'Chuyển Tiền Thất Bại',
            );
        }
    }
    public function REQUEST($url)
    {
        $data = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
            CURLOPT_USERAGENT => $_SESSION['useragent'],
            CURLOPT_AUTOREFERER => true,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0,
        );
        $ch = curl_init();
        curl_setopt_array($ch, $data);
        $access = curl_exec($ch);
        return $access;
    }

    public function CURL($Action, $header, $data)
    {
        $Data = is_array($data) ? json_encode($data) : $data;
        $curl = curl_init();
        $header[] = 'Content-Type: application/json';
        $header[] = 'accept: application/json';
        $header[] = 'Content-Length: ' . strlen($Data);
        $opt = array(
            CURLOPT_URL => $Action,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => empty($data) ? false : true,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_CUSTOMREQUEST => empty($data) ? 'GET' : 'POST',
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_ENCODING => "",
            CURLOPT_HEADER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_TIMEOUT => 20,
        );
        curl_setopt_array($curl, $opt);
        $body = curl_exec($curl);
        // echo strlen($body); die;
        if (is_object(json_decode($body))) {
            return json_decode($body, true);
        }
        return $body;
    }
}
