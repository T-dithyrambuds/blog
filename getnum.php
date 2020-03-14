<?php
class mydb extends sqlite3{
    function __construct(){
        $this->open('blog.db');
    }
}


$db=new mydb();
$sql=<<<EOF
    SELECT COUNT(DISTINCT time) num FROM archives;
    
EOF;

$result=$db->query($sql);
$data=$result->fetchArray(SQLITE3_ASSOC);

print_r($data['num']);



?>