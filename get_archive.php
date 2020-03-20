<?php
$id=$_GET['id'];

class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}

$db=new mydb();

$sql=<<<EOF
    SELECT * FROM archives WHERE id='$id'
EOF;

$result=$db->query($sql);
$item=$result->fetchArray(SQLITE3_ASSOC);
$item=json_encode($item);
print_r($item);

?>