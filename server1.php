<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server 1</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    .height_300 {
        height: 300px;
        width: 100%;
        background-color: #000;
        color: #fff;
        overflow-y: scroll;
    }

    .section1 {
        padding: 10px;
    }
    </style>
</head>

<body>
    <!-- for 1st gtaph -->
    <div class="section1" id="section1">
        <h3>For Alfa ID: 1</h3>

        <div class="height_300" id="server_id1_output">
            Loading...
        </div>
    </div>
    <br>

<!-- for 2nd gtaph -->
    <div class="section1" id="section1">
        <h3>For Bita ID: 2</h3>

        <div class="height_300" id="server_id2_output">
            Loading...
        </div>
    </div>
    <br>

<!-- for 3td gtaph -->
<div class="section1" id="section1">
        <h3>For Bita ID: 3</h3>

        <div class="height_300" id="server_id3_output">
            Loading...
        </div>
    </div>
    <br>

<!-- for 4th gtaph -->
<div class="section1" id="section1">
        <h3>For Bita ID: 4</h3>

        <div class="height_300" id="server_id4_output">
            Loading...
        </div>
    </div>
    <br>

<!-- for 5th gtaph -->
<div class="section1" id="section1">
        <h3>For Bita ID: 5</h3>

        <div class="height_300" id="server_id5_output">
            Loading...
        </div>
    </div>
    <br>

<!-- for 6th gtaph -->
<div class="section1" id="section1">
        <h3>For Bita ID: 6</h3>

        <div class="height_300" id="server_id6_output">
            Loading...
        </div>
    </div>
    <br>














    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>


    Ajax_For_ID_1();

    function Ajax_For_ID_1() {
        $.ajax({
            url: "./example.php?id=1",
            method: "POST",
            dataType: "json",
            success: function(result) {
                // console.log(result);
                document.getElementById('server_id1_output').innerHTML = document.getElementById(
                    'server_id1_output').innerHTML + `<br> New Data Added Data: ${JSON.stringify(result)}`;
                setTimeout(function() {
                    Ajax_For_ID_1();
                }, 1500);
            },
            error: function(error) {
                return error;
            }

        })
    }











    Ajax_For_ID_2();

    function Ajax_For_ID_2() {
        $.ajax({
            url: "./example.php?id=2",
            method: "POST",
            dataType: "json",
            success: function(result) {
                // console.log(result);
                document.getElementById('server_id2_output').innerHTML = document.getElementById(
                    'server_id2_output').innerHTML + `<br> New Data Added Data: ${JSON.stringify(result)}`;
                setTimeout(function() {
                    Ajax_For_ID_2();
                }, 1500);
            },
            error: function(error) {
                return error;
            }

        })
    }





    Ajax_For_ID_3();

    function Ajax_For_ID_3() {
        $.ajax({
            url: "./example.php?id=3",
            method: "POST",
            dataType: "json",
            success: function(result) {
                // console.log(result);
                document.getElementById('server_id3_output').innerHTML = document.getElementById(
                    'server_id3_output').innerHTML + `<br> New Data Added Data: ${JSON.stringify(result)}`;
                setTimeout(function() {
                    Ajax_For_ID_3();
                }, 1500);
            },
            error: function(error) {
                return error;
            }

        })
    }




    Ajax_For_ID_4();

    function Ajax_For_ID_4() {
        $.ajax({
            url: "./example.php?id=4",
            method: "POST",
            dataType: "json",
            success: function(result) {
                // console.log(result);
                document.getElementById('server_id4_output').innerHTML = document.getElementById(
                    'server_id4_output').innerHTML + `<br> New Data Added Data: ${JSON.stringify(result)}`;
                setTimeout(function() {
                    Ajax_For_ID_4();
                }, 1500);
            },
            error: function(error) {
                return error;
            }

        })
    }





    Ajax_For_ID_5();

    function Ajax_For_ID_5() {
        $.ajax({
            url: "./example.php?id=5",
            method: "POST",
            dataType: "json",
            success: function(result) {
                // console.log(result);
                document.getElementById('server_id5_output').innerHTML = document.getElementById(
                    'server_id5_output').innerHTML + `<br> New Data Added Data: ${JSON.stringify(result)}`;
                setTimeout(function() {
                    Ajax_For_ID_5();
                }, 1500);
            },
            error: function(error) {
                return error;
            }

        })
    }




    Ajax_For_ID_6();

    function Ajax_For_ID_6() {
        $.ajax({
            url: "./example.php?id=6",
            method: "POST",
            dataType: "json",
            success: function(result) {
                // console.log(result);
                document.getElementById('server_id6_output').innerHTML = document.getElementById(
                    'server_id6_output').innerHTML + `<br> New Data Added Data: ${JSON.stringify(result)}`;
                setTimeout(function() {
                    Ajax_For_ID_6();
                }, 1500);
            },
            error: function(error) {
                return error;
            }

        })
    }
    </script>
</body>

</html>