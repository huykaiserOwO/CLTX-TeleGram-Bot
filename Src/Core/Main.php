<?php 
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Model/Database.php';

    class System {

        public DataBase $conn;
        public function __construct() {
            // server should keep session data for AT LEAST 30 month
            ini_set('session.gc_maxlifetime', 2592000);
            // each client should remember their session id for EXACTLY 30 month
            session_set_cookie_params(2592000);
            session_start();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $this->conn = new DataBase();
            if (!isset($_SESSION)) {
                session_start();
            }
        }

        public function GetUri() {
            $uri = $_SERVER['REQUEST_URI'];
            $domain = $_SERVER['HTTP_HOST'];
            $query = $_SERVER['QUERY_STRING'];
            return [
                'Uri' => $uri,
                'Domain' => $domain,
                'Query' => $query
            ];
        }

         // Mở File Json
         public function OpenFileJson($FilePath) {
            $json = file_get_contents($_SERVER['DOCUMENT_ROOT'].$FilePath); 
            $json_data = json_decode($json,true); 
            return $json_data;
        }

        // Thay đổi nội dung tại chỉ mục trong file json
        public function ChangeContentJson($FilePath, $FileJson, $Settings, $Id, $Key, $ChangeContent) {
            for ($i = 0; $i < count($FileJson); $i++) {
                if ($FileJson[$i]['Settings'] == $Settings) {
                    if ($FileJson[$i]['Id'] == $Id) {
                        $FileJson[$i][$Key] = $ChangeContent;
                    }
                }
            }
            $Change = fopen($_SERVER["DOCUMENT_ROOT"] . $FilePath, 'w');
            fwrite($Change, json_encode($FileJson));
            fclose($Change);
            return $FileJson;
        }

        // Lấy Url WebSite
        public function GetUrlWebsite() {
            if(isset($_SERVER['HTTPS'])) {
                if('on' == strtolower($_SERVER['HTTPS'])) {
                    $tcp = 'https';
                }
                if ('1' == $_SERVER['HTTPS']) {
                    $tcp = 'https';
                }

            }
            else if (isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] == '443')) {
                $tcp = 'https';

            } else {
                $tcp = 'http';
            }
            $domain = $tcp.'://'.$_SERVER['HTTP_HOST'];
            return $domain;
        }

        // Chuyển Đổi Time Date Now Sang TimeStamp
        public function ConvertTimeStampNow() {
            $date = date('d-m-Y G:i:s');
            $timeStamp = strtotime($date);
            return $timeStamp;
        }

        public function time_ago($time) {
            $time_difference = time() - $time;

            if( $time_difference < 1) return 'Vừa Xong';
            $condition = array(
                12*30*24*60*60 => 'Năm',
                30*24*60*60 => 'Tháng',
                24*60*60 => 'Ngày',
                60*60 => 'Giờ',
                60 => 'Phút',
                1 => 'Giây'
            );
            foreach ($condition as $secs => $str) {
                $d = $time_difference / $secs;
                if($d >= 1) {
                    $t = round($d);
                    return $t.' '.$str.( $t > 1 ? '' : ''). 'Trước';

                }
            }
        } 

        
        /***   lấy url request hiện tại    ***/
        public function PageURL() {

            $pageURL = 'http';
            if ($_SERVER['HTTPS'] == 'on') {
                $pageURL .= 's';
            }

            $pageURL .= '://';
            if ($_SERVER['SERVER_PORT'] != '80') {
                $pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
            } else {
            $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            }

            return $pageURL;
        }

        // Chống XSS
        public function DectXSS($string) {
            $newString = htmlspecialchars($string);
            return $newString;
        }

        // Chống Sql Inject
        public function DectInjecSql($string) {
            $newString = mysqli_real_escape_string($this->conn->ConnectDb(), $string);
            return $newString;
        }

        // Kiểm Tra Có Kí Tự Đặc Biệt Và Từ Tiếng Việt
        public function CheckSpecialCharsAndVietNamese($string) {
            $tiengviet = array(
                'à','á','ạ','ả','ã','â','ầ','ấ','ậ','ẩ','ẫ','ă','ằ','ắ','ặ','ẳ','ẵ',
                'À','Á','Ạ','Ả','Ã','Â','Ầ','Ấ','Ậ','Ẩ','Ẫ','Ă','Ằ','Ắ','Ặ','Ẳ','Ẵ',
                'è','é','ẹ','ẻ','ẽ','ê','ề','ế','ệ','ể','ễ',
                'È','É','Ẹ','Ẻ','Ẽ','Ê','Ề','Ế','Ệ','Ể','Ễ',
                'đ',
                'Đ',
                'ò','ó','ọ','ỏ','õ','ô','ồ','ố','ộ','ổ','ỗ','ơ','ờ','ớ','ợ','ở','ỡ',
                'Ò','Ó','Ọ','Ỏ','Õ','Ô','Ồ','Ố','Ộ','Ổ','Ỗ','Ơ','Ờ','Ớ','Ợ','Ở','Ỡ',
                'ì','í','ị','ỉ','ĩ','Ì','Í','Ị','Ỉ','Ĩ',
                'ù','ú','ụ','ủ','ũ','ư','ừ','ứ','ự','ử','ữ',
                'Ù','Ú','Ụ','Ủ','Ũ','Ư','Ừ','Ứ','Ự','Ử','Ữ',
                'ỳ','ý','ỵ','ỷ','ỹ',
                'Ỳ','Ý','Ỵ','Ỷ','Ỹ',',','/',':',';','"',"'",'[',']','{','}','|','+',
                '=','`','~','!','#','$','%','^','&','*','(',')'
            );
            
            foreach($tiengviet as $keys) {
                if(strpos($string, $keys) !== false) {
                    return false;
                }

            }
            return true;
        }

        // Mã Hóa Chuỗi Md5 
        public function Md5($string) {
            $newString = md5($string);
            return $newString;
        }

        
        /***   mã hóa chuỗi utf-8 sang base64    ***/
        public function base64url_encode($plainText) {
            $base64 = base64_encode($plainText);
            $base64url = strtr($base64, '+/=', '-_,');
            return $base64url;
            }
    
    
        /***   giải mã chuỗi base64 sang utf-8     ***/
        public function base64url_decode($plainText) {
            $base64url = strtr($plainText, '-_,', '+/=');
            $base64 = base64_decode($base64url);
            return $base64;
        }   

        /***  kiểm tra chuỗi có phải dạng số hay không    ***/
        public function check_int($data) {
            if (is_int($data) === true) return true;
            if (is_string($data) === true && is_numeric($data) === true) {
                return (strpos($data, '.') === false);
            }
        }

        // Get Real Ip Client 
        public function getRealUserIp(){
            switch(true){
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
            }
        }

        // Create Token
        public function CreateToken($length) {
            $token = openssl_random_pseudo_bytes($length);
            $token = bin2hex($token);
            return $token;
        }

        // Random String And Number
        public function RandomStringNumber($length) {
            $NewStringNumber = '';
            $StringNumber = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
            $Array = str_split($StringNumber);
            for ($i = 0; $i <= $length; $i++) {
                $NewStringNumber .= $Array[rand(0, count($Array) - 1)] . '';
                
            }
            return $NewStringNumber;
        }

        // Random Number
        public function RandNumber($length) {
            $NewNumbers = '';
            for ($i = 0; $i <= $length; $i++) {
                $NewNumbers .= rand(0,9);
            }
            return $NewNumbers;
        }

        // Lọc Email
        public function FilterEmail($email) {
            $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
            return preg_match($pattern, $email);
        }

        // Lọc Tài Khoản
        public function FilterAccount($Account) {
            $pattern = '/^[A-Z]([a-z]+)([0-9]+)/';
            return preg_match($pattern, $Account);
        }


        // Kiểm tra email có tồn tại trong db
        public function CheckEmailInDb($Email) {
            $Query = "SELECT Id FROM user WHERE Email = '$Email'";
            $Check = $this->conn->SelectData($Query);
            if ($Check !== false) {
                return true;
            }
            return false;
        }

        // Kiểm tra nickname có tồn tại trong db
        public function CheckNicknameInDb($Nickname) {
            $Query = "SELECT Id FROM user WHERE Nickname = '$Nickname'";
            $Check = $this->conn->SelectData($Query);
            if ($Check !== false) {
                return true;
            }
            return false;
        }

        // Kiểm tra Id telegram có tồn tại trong db
        public function CheckIdTeleInDb($IdTelegram) {
            $Query = "SELECT Id FROM user WHERE IdTelegram = '$IdTelegram'";
            $Check = $this->conn->SelectData($Query);
            if ($Check !== false) {
                return true;
            }
            return false;
        }

        // Get Device Client 
        public function GetDevice() {
            $isMobile = preg_match("/(android|avantgo|blackberry|bolt|boost|ios|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
            if ($isMobile == 1) {
                return 'Mobile';
            } else {
                return 'Desktop';
            }

        }

        // Get Country | Region | City
        public function GetRegion($Ip) {
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => 'http://ipinfo.io/$Ip/geo',
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE,
                CURLOPT_FOLLOWLOCATION => TRUE,
                CURLOPT_ENCODING => '',
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36',
                CURLOPT_AUTOREFERER => TRUE,
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_SSL_VERIFYPEER => 0
            ));
            $access = curl_exec($ch);
            $json     = json_decode($access, true);
            if (isset($json['country']) and isset($json['region']) and isset($json['city'])) {
                $country  = $json['country'];
                $region   = $json['region'];
                $city     = $json['city'];
                return [
                    'Country' => $country,
                    'Region' => $region,
                    'City' => $city
                ];
            }
            return 'UNKNOWN';
            

        }


        // Kiểm tra input là chữ số hay số
        public function CheckNumber($Check) {
            if (is_numeric($Check) === true) {
                return true;
            }
            return false;
        }

        
        function reset_cookie () {
            if (isset($_SERVER['HTTP_COOKIE'])) {
                $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                foreach($cookies as $cookie) {
                    $parts = explode('=', $cookie);
                    $name = trim($parts[0]);
                    setcookie($name, null, time()-1000);
                    setcookie($name, null, time()-1000, '/');
                }
            }
        }

        

    }





?>

