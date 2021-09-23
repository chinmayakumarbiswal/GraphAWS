<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
header("Content-type: application/json");
    require_once("CURD.php");
    $CURD= new CURD();

    $AllOutput=["status"=>false, "value"=>"Unknown Error"];

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        

        if ($id == 1)
        {
            $CurrentTime = time();
            $random=rand(1,10);
        }
        elseif ($id == 2)
        {
            $CurrentTime = time();
            $random=rand(10,20);
        }
        elseif ($id == 3)
        {
            $CurrentTime = time();
            $random=rand(20,30);
        }
        elseif ($id == 4)
        {
            $CurrentTime = time();
            $random=rand(3,40);
        }
        elseif ($id == 5)
        {
            $CurrentTime = time();
            $random=rand(1,100);
        }
        elseif ($id == 6)
        {
            $CurrentTime = time();
            $random=rand(1,100);
        }
        else
        {
            echo "Somthing Wrong please try again";
        }
        // $CurrentTime = time();
        // $random=rand(1,100);




        $dataAryRec=["time"=>$CurrentTime,"temp"=>$random];

        $prevData=$CURD->read_data_list_last_colum("sen1","id= $id");
        if($prevData['status']){
            $newDATA=$prevData['value']['data'];
            $DATAARY=array_slice(json_decode($newDATA), -5);
            //insert 6 data in database -> rand , so i use -5 here
            $DATAARY[]=$dataAryRec;
            

            if ($id == 1)
            {
                $val=$CURD->update("sen1","id = $id", [
                    "name"=>"alpha",
                    "data"=>json_encode($DATAARY)
                ]);
            }
            elseif ($id == 2)
            {
                $val=$CURD->update("sen1","id = $id", [
                    "name"=>"beta",
                    "data"=>json_encode($DATAARY)
                ]);
            }
            elseif ($id == 3)
            {
                $val=$CURD->update("sen1","id = $id", [
                    "name"=>"gamma",
                    "data"=>json_encode($DATAARY)
                ]);
            }
            elseif ($id == 4)
            {
                $val=$CURD->update("sen1","id = $id", [
                    "name"=>"delta",
                    "data"=>json_encode($DATAARY)
                ]);
            }
            elseif ($id == 5)
            {
                $val=$CURD->update("sen1","id = $id", [
                    "name"=>"kappa",
                    "data"=>json_encode($DATAARY)
                ]);
            }
            elseif ($id == 6)
            {
                $val=$CURD->update("sen1","id = $id", [
                    "name"=>"omega",
                    "data"=>json_encode($DATAARY)
                ]);
            }
            else
            {
                echo "Somthing Wrong please try again";
            }

            // $val=$CURD->update("sen1","id = $id", [
            //     "name"=>"alpha",
            //     "data"=>json_encode($DATAARY)
            // ]);
        }
        
        
        $AllOutput=$val;

        
    }
    else
    {
        $AllOutput=["status"=>false, "value"=>"No Attribute"];
    }

    echo(json_encode($AllOutput));

?>