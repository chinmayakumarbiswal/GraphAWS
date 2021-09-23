<?php

class CURD {
    private $servername = "";
    private $username = "";
    private $password = "";
    private $database = "";

    public function __construct(){

        $this->servername ="localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "skill";

        $this->conn = new mysqli($this->servername,  $this->username,  $this->password,  $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }





    public function insert($table, $values=array()){
        $array_keys="`".implode("`, `",array_keys($values))."`";
        $array_values="'".implode("', '",array_values($values))."'";
        $sql="INSERT INTO $table ($array_keys) VALUES ($array_values)";
        $result=$this->conn->query($sql);
        if($result){
            return array("status" => true, "value" => $this->conn->insert_id);
        }else{
            return array("status" => false, "value" => $this->conn->error);
        }
    }




    public function exist($table, $values=array()){
        $parameterarray=array();
        foreach($values as $x => $val){
            $parameterarray[]="$x = '$val'";
        }
        $parameter = implode(" && ",$parameterarray);
        $sql="SELECT * FROM $table WHERE $parameter";
        $result= $this->conn->query($sql);
        return $result->num_rows; //->num_rows
    }




    public function update($table,$userId, $values=array()){
        $parameterarray=array();
        foreach($values as $x => $val){
            $parameterarray[]="$x = '$val'";
        }
        $parameter = implode(" , ",$parameterarray);
        $sql="UPDATE $table SET $parameter WHERE $userId";
        $result= $this->conn->query($sql);
        if($result){
            return array("status" => true, "value" => $this->conn->insert_id);
        }else{
            return array("status" => false, "value" => $this->conn->error."  ".$sql);
        }
    }





    public function read_data($table, $all_row="*", $join=null, $where=null, $orderby=null, $limit=null){
        $result_array = array();
        if ($this->table_exists($table)) {

            $sql = "SELECT $all_row FROM $table";
            if ($join != null){
                $sql .= " JOIN $join";
            }
            if ($where != null){
                $sql .= " WHERE $where";
            }
            if ($orderby != null){
                $sql .= " ORDER BY $orderby";
            }
            if ($limit != null){
                $sql .= " LIMIT 0, $limit";
            }

            $result = $this->conn->query($sql);


            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $result_array[]=$row;
                    }
                    return array("status" => true, "value" => $result_array);
                } else {
                    return array("status" => false, "value" => "0 result!");
                }
            } else {
                return array("status" => false, "value" => $this->conn->error);
            }
        } else {
            return array("status" => false, "value" => "Database Table Not Exist!");
        }
    }






    public function read_data_list($table, $join=null, $where=null, $from, $to, $orderby=null, $limit=null){
        $result_array = array();
        if ($this->table_exists($table)) {

            $sql = "SELECT  *, ROW_NUMBER() OVER () AS slno FROM $table";
            if ($join != null){
                $sql .= " JOIN $join";
            }
            if ($where != null){
                $sql .= " WHERE $where";
            }
            if ($orderby != null){
                $sql .= " ORDER BY $orderby";
            }
            if ($limit != null){
                $sql .= " LIMIT 0, $limit";
            }
            if ($to != null){
                $sql ="SELECT  * FROM ( $sql ) q WHERE slno > '$from' && slno <= '$to'";
            }

            $result = $this->conn->query($sql);


            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $result_array[]=$row;
                    }
                    return array("status" => true, "value" => $result_array);
                } else {
                    return array("status" => false, "value" => "0 result!");
                }
            } else {
                return array("status" => false, "value" => $this->conn->error);
            }
        } else {
            return array("status" => false, "value" => "Database Table Not Exist!");
        }
    }






    public function read_data_list_last_colum($table, $where=null, $orderby=null){
        $result_array = array();
        if ($this->table_exists($table)) {

            $sql = "SELECT * FROM $table";
            
            if ($where != null){
                $sql .= " WHERE $where";
            }
            if ($orderby != null){
                $sql .= " ORDER BY $orderby";
            }
            
            
            $result = $this->conn->query($sql);


            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $result_array=$row;
                    }
                    return array("status" => true, "value" => $result_array);
                } else {
                    return array("status" => false, "value" => "0 result!");
                }
            } else {
                return array("status" => false, "value" => $this->conn->error);
            }
        } else {
            return array("status" => false, "value" => "Database Table Not Exist!");
        }
    }

    public function TableLength($table,$where=null){
        $sql="SELECT COUNT(*) FROM $table";
        if ($where != null){
            $sql .= " WHERE $where";
        }
        $result= $this->conn->query($sql);
        if($result){
            return array("status" => true, "value" => $result->fetch_assoc()["COUNT(*)"]);
        }else{
            return array("status" => false, "value" => 0 );
        }

    }


    public function delete($table,$userId){
        $sql="DELETE FROM $table WHERE id=$userId";
        $result= $this->conn->query($sql);
        if($result){
            return array("status" => true, "value" => $this->conn->insert_id);
        }else{
            return array("status" => false, "value" => $this->conn->error);
        }
    }

    public function deleteWhere($table,$where){
        $sql="DELETE FROM $table WHERE $where";
        $result= $this->conn->query($sql);
        if($result){
            return array("status" => true, "value" => $this->conn->insert_id);
        }else{
            return array("status" => false, "value" => $this->conn->error);
        }
    }


    public function addTOtrash($table,$id,$admin){
        $CurrentDate_time=date('Y:m:d H:i:s');
        $GetDataofid=$this->read_data_list_last_colum($table, "id = '$id'", "`$table`.`id` ASC");
        if($GetDataofid['status']){
            $valueDATA=json_encode($GetDataofid['value']);
            $addTOtrashtable=$this->insert('trash', [
                "value"=>$valueDATA,
                "table_val"=>$table,
                "delete_by"=>$admin,
                "delete_date"=>$CurrentDate_time
            ]);
            return array("status" => $addTOtrashtable['status'], "value" => $addTOtrashtable['value']);
        }else{
            return array("status" => false, "value" => $GetDataofid['value']);
        }
    }


    public function sql($sql_val){
        $result = $this->conn->query($sql_val);
        if($result){
            return array("status" => true, "value" => $result);
        }else{
            return array("status" => false, "value" => $this->conn->error);
        }
    }




    public function table_rows($table,$where=null){
        $sql = "SELECT * FROM $table";
        if ($where != null){
            $sql .= " WHERE $where";
        }
        $Table_inDB = $this->conn->query($sql);
        if ($Table_inDB) {
            return array("status" => true, "value" => $Table_inDB->num_rows);
        } else {
            return array("status" => false, "value" =>$this->conn->error);
        }
    }

    public function table_rows_exist($table,$where){
        $sql = "SELECT * FROM $table WHERE $where";
        $Table_inDB = $this->conn->query($sql);
        if ($Table_inDB) {
            if ($Table_inDB->num_rows) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    private function table_exists($table){
        $sql = "SHOW TABLES FROM $this->database LIKE '$table'";
        $Table_inDB = $this->conn->query($sql);
        if ($Table_inDB) {
            if ($Table_inDB->num_rows) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function admin_login($userId, $password){
        //$sql="SELECT * FROM user WHERE email REGEXP BINARY  '$userId' && password REGEXP BINARY  '$password' ";   //[REGEXP BINARY use in for str sensative]
        $sql="SELECT * FROM admin WHERE user_id REGEXP BINARY  '$userId' && password REGEXP BINARY  '$password' && user_id='$userId' && password='$password'";   //[REGEXP BINARY use in for str sensative]
        $result= $this->conn->query($sql);
        if($result->num_rows == 1){
            $output=$result->fetch_assoc();
            $uid=$output["id"];
            $sessionData=$this->insert("session", [
                "uid"=>$uid,
                "catch"=>time()."R_".rand(100,99999).md5(rand(100,99999)),
                "date"=>date("Y:m:d H:m:s")
            ]);
            $session_id=$sessionData['value'];
            $GetSession=$this->read_data('session',"*",null,"id='$session_id'");
            $output['password']="**********";
            $output['session']=$GetSession['value'][0]['catch'];
            session_start();
            $_SESSION["catch"]= $output['session'];
            $_SESSION["admin"]= $output['name'];
            return array("status" => true, "value" => $output);
        }else{
            return array("status" => false, "value" => "Wrong user id and Password!");
        }
    }

    function CheckSession($value){
        $currentDate=date("Y:m:d H:m:s");
        return $this->table_rows_exist('session',"catch='$value' && TIMESTAMPDIFF(MINUTE,date,'$currentDate')<120");
    }

    function CheckAccessStatus($SITE){
        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
            $admin=$_SESSION['admin'];
            return $this->table_rows_exist('admin_access',"admin = '$admin' && $SITE = 'true'");
        }else{
            return false;
        }
       
    }


    public function __destruct(){
        $this->conn->close();
    }


}






?>