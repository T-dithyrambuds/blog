<?php
// error_reporting(0);
$user_id=$_COOKIE['username'];
$title=$_POST['title'];
$content=$_POST['content'];
$time=date('Y/m/d');
echo $time;


class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}
$db= new mydb();

$sql=<<<EOF
    INSERT INTO archives (user_id, title, content, time)
    VALUES('$user_id', '$title', '$content', '$time');
EOF;

// echo $sql;die;

$result=$db->exec($sql);

print_r($result);
?>