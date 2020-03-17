<?php
error_reporting(0);
class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}

$db=new mydb();

$name=$_POST['name'];
$pass=$_POST['pass'];

$sql=<<<EOF
    SELECT COUNT(id) num FROM users WHERE nickname='$name' AND passworda='$pass'
EOF;

$result=$db->query($sql);
$passw=$result->fetchArray(SQLITE3_ASSOC);

echo $passw['num'];

if($passw['num']==1){
    setcookie('username', $name);
}

?>