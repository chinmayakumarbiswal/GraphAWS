<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
header("Content-type: application/json");
    require_once("CURD.php");
    $CURD= new CURD();

    $AllOutput=["status"=>false, "value"=>"Unknown Error"];

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        
        $READ_DATA=$CURD->read_data_list_last_colum("sen1","id = $id");

        if($READ_DATA['status']){

            $DATA_RESULT=json_decode($READ_DATA['value']['data']);
            $AllOutput=["status"=>true, "value"=>$DATA_RESULT];

        }else{
            $AllOutput=["status"=>false, "value"=>$READ_DATA['value']];
        }
    }
    else
    {
        $AllOutput=["status"=>false, "value"=>"No Attribute"];
    }

    echo(json_encode($AllOutput));

?>