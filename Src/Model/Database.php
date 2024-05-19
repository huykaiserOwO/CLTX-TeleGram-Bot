<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Model/Config.php';
class DataBase {

    public $conn;
    private $charset = 'utf8';
    
    public function __construct() {
        $this->ConnectDb();
    }

    public function ConnectDb() {
        if (!$this->conn) {
            $this->conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
            if (mysqli_connect_errno()) {
                exit;
            }
            mysqli_set_charset($this->conn, $this->charset);
        }
        return $this->conn;
    }

    public function DestroyConnectDb() {
        if ($this->conn) {
            mysqli_close($this->conn);
            exit;
        }
    }

    public function SelectData($Query) {
        $TimeNow = date('d/m/Y H:i:s');
        $QuerySql = mysqli_query($this->conn, $Query);
        if (mysqli_num_rows($QuerySql) > 0) {
            while($rows = mysqli_fetch_assoc($QuerySql)) {
                $NumRows[] = $rows;
            }
            return $NumRows;
        }
        return false;

    }
    public function InsertData($Query) {
        $TimeNow = date('d/m/Y H:i:s');
        $QuerySql = mysqli_query($this->conn, $Query);
        if ($QuerySql === true) {
            return true;
        }
        return false;
    }
    public function UpdateData ($Query) {
        $TimeNow = date('d/m/Y H:i:s');
        $QuerySql = mysqli_query($this->conn, $Query);
        if ($QuerySql === true) {
            return true;
        }
        return false;
    }

    public function DeleData ($Query) {
        $TimeNow = date('d/m/Y H:i:s');
        $QuerySql = mysqli_query($this->conn, $Query);
        if ($QuerySql === true) {
            return true;
        }
        return false;
    }

}
?>