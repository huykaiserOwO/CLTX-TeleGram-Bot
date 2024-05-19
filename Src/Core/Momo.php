<?php
    class Momo {
        public function LayLsgd($accessToken, $Phone, $Limit) {
            $dataPost = array(
				"access_token" => $accessToken, 
				"phone" => $Phone, 
				"limit" => (int)$Limit, 
				"offset" => 0
				);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://momosv3.apimienphi.com/api/getTransHistory",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($dataPost),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "accept: application/json",
                    "cache-control: no-cache"
                                        ),
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response,true);
            return $response;
        }

        public function KiemTraMgd($accessToken, $tranId) {
            $dataPost = array(
				"access_token" => $accessToken,
				"tranId" => $tranId
			);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://momosv3.apimienphi.com/api/checkTranId",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($dataPost),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "accept: application/json",
                    "cache-control: no-cache"
                                        ),
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response,true);
            return $response;
        }

        public function KiemTraTaiKhoan($accessToken, $Phone) {
            $dataPost = array(
                'access_token' => $accessToken,
                'phone' => $Phone
            );
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://momosv3.apimienphi.com/api/checkMomoUser",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($dataPost),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "accept: application/json",
                    "cache-control: no-cache"
                                        ),
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response,true);
            return $response;
        }

        public function LayThongTinTk($accessToken, $Phone) {
            $dataPost = array(
                'access_token' => $accessToken,
                'phone' => $Phone
            );
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://momosv3.apimienphi.com/api/getMomoInfo",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($dataPost),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "accept: application/json",
                    "cache-control: no-cache"
                                        ),
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response,true);
            return $response;
        }

        public function ChuyenTienMomo($accessToken,$Phone,$PhoneTo,$SoTien,$Note) {
            $dataPost = array(
                'access_token' => $accessToken,
                'phone' => $Phone,
                'phoneto' => $PhoneTo,
                'amount' => $SoTien,
                'note' => $Note
            );
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://momosv3.apimienphi.com/api/sendMoneyMomo",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($dataPost),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "accept: application/json",
                    "cache-control: no-cache"
                                        ),
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response,true);
            return $response;
        }
    }
