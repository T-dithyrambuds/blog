<?php
$id=$_GET['id'];

class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}
$db= new mydb();

$sql=<<<EOF
    UPTADE
EOF;



$result=$db->exec($sql);

if($result==1){
    print_r($result);
}
?>