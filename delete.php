<?php
error_reporting(0);

$user_id=$_GET['user_id'];
$id=$_GET['id'];
$user=$_COOKIE['username'];
// echo 'user_id:'.$user_id;
// echo 'user:'.$user;
if($user_id!=$user){
    print_r('没有权限~');
}else{



class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}

$db= new mydb();

$sql=<<<EOF
    DELETE FROM archives WHERE id='$id';
EOF;

$result=$db->exec($sql);

print_r('删掉类~');
}
// $db=new PDO('sqlite:./db/blog.db');
// $result=$db->query('DELETE FROM archives WHERE id=4 AND user_id="haihai"')->fetchAll();
// print_r($result);
?>