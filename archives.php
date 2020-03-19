<?php
$id=$_GET['id'];

class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}
$db= new mydb();


$sql=<<<EOF
    SELECT title,content,time FROM archives WHERE id='$id'
EOF;

$result=$db->query($sql);
$result=$result->fetchArray(SQLITE3_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>  
    <link rel="icon" href="./images/load.png" type="image/x-icon"/>
    <title>Load</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #inner{
            box-shadow:1px 1px 5px 1px white;
            padding: 30px;
            margin: 100px;
            background-color:white;
            height:300px
        }
        input{
            margin-bottom: 20px;
            width: 100%;
        }
        #top{
            border-bottom:1px solid rgba(52,58,64,0.2);
            font-size:20px
        }
        #content{
            padding-top:10px;
            font-size: 120%;
        }
        #time{
            font-size: 70%;
            font-weight: 100;
        }
    </style>
</head>
<body style="background-color:rgba(0,122,204,0.6)">
    
<div id="outer">
    <div id="inner">
        <div id="top"><label id="title"></label>&nbsp;&nbsp;<label id="time"></label></div>
        <div id="content"></div>

    

    </div>


</div>
<script>
    <?php
    


    ?>
    $('#title').html('<?php print_r($result['title']); ?>');
    $('#time').html('<?php print_r($result['time']); ?>');
    $('#content').html('<?php print_r($result['content']); ?>');


</script>

</body>
</html>