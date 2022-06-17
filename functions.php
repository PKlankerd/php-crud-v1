<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'crud_data');
    
    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }
        public function insert($prefix,$fname,$lname,$position,
        $address,$email,$PhoneNumber,$username,$password,$Role,$status) {
            $result = mysqli_query($this->dbcon, "INSERT INTO user
            (PrefixID,Name,Lastname,PositionID,Address,Email,
            PhoneNumber,UserName, Password, RoleTypeID, Status,
            IsActive,CreateBy) 
            VALUES
            ('$prefix','$fname','$lname','$position','$address','$email','$PhoneNumber',
            '$username',md5('$password'),'$Role','$status','1','$fname')");
            return $result;
        }
        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM user"); 
            return $result;
        }
        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM user WHERE id = '$userid'");
            return $result;
        }
        public function update($prefix,$fname,$lname,$position,
        $address,$email,$PhoneNumber,$username,$password,$Role,$status,$userid) {
            $result = mysqli_query($this->dbcon, "UPDATE user SET 
            PrefixID  = '$prefix',
            Name   = '$fname',
            Lastname  = '$lname',
            PositionID  = '$position',
            Address  = '$address',
            Email  = '$email',
            PhoneNumber  = '$PhoneNumber',
            UserName   = '$username',
            Password  = '$password',
            RoleTypeID  = '$Role',
            UpdateBy = '$fname',
            Status  = '$status',
            UpdateDate = now()
            WHERE id = '$userid'");
            return $result;
        }
        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM user WHERE id = '$userid'");
            return $deleterecord;
        }
    }
?>