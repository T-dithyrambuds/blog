<?php
class mydb extends sqlite3{
    function __construct(){
        $this->open('blog.db');
    }
}

$ser=$_GET['times'];


$db=new mydb();
$sql=<<<EOF
    SELECT time FROM archives WHERE id='$ser' GROUP BY time ORDER BY id ASC;
EOF;

$result=$db->query($sql);

$data=$result->fetchArray(SQLITE3_ASSOC);

print_r($data['time']);



?>