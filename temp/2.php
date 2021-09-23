<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
header("Content-type: application/json");
    require_once("CURD.php");
    $CURD= new CURD();

    $AllOutput=["status"=>false, "value"=>"Unknown Error"];

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        
        $CurrentTime = time();
        $random=rand(1,100);

        $dataAryRec=["time"=>$CurrentTime,"temp"=>$random];

        $prevData=$CURD->read_data_list_last_colum("sen1","id= $id");
        if($prevData['status']){
            $newDATA=$prevData['value']['data'];
            $DATAARY=array_slice(json_decode($newDATA), -5);
            $DATAARY[]=$dataAryRec;
            



            $val=$CURD->update("sen1","id = $id", [
                "name"=>"alpha",
                "data"=>json_encode($DATAARY)
            ]);
        }
        
        
        $AllOutput=$val;

        
    }
    else
    {
        $AllOutput=["status"=>false, "value"=>"No Attribute"];
    }

    echo(json_encode($AllOutput));

?>