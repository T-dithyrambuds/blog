<?php
error_reporting(0);
$user_id=$_COOKIE['username'];
$title=$_GET['title'];
$content=$_GET['content'];
$content=str_replace(array("\r\n","\n","\r"),"<br>",$content);
$id=$_GET['archives_id'];
$time=date('Y/m/d');
// echo $time;


class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}
$db= new mydb();

if(!empty($id)){
    $sql=<<<EOF
    UPDATE archives set title='$title',content='$content' WHERE id='$id'
EOF;

$result=$db->exec($sql);

print_r(2);
}else{


$sql=<<<EOF
    INSERT INTO archives (user_id, title, content, time)
    VALUES('$user_id', '$title', '$content', '$time');
EOF;



$result=$db->exec($sql);

print_r(1);
}

?>