<?php
error_reporting(0);
$user_id=$_COOKIE['username'];
$title=$_POST['title'];
$content=$_POST['content'];
$content_desc=$_POST['content_desc'];
$content=str_replace(array("\r\n","\n","\r"),"<br>",$content);
$id=$_POST['archives_id'];
$time=date('Y/m/d');
// echo $time;


class mydb extends sqlite3{
    function __construct(){
        $this->open('./db/blog.db');
    }
}
$db= new mydb();

// 修改操作
if(!empty($id)){
    $sql=<<<EOF
    UPDATE archives set title='$title',content='$content',content_desc='$content_desc' WHERE id='$id'
EOF;

$result=$db->exec($sql); 

$update_flag = $db->changes(); // 获取修改状态如果修改成功，则返回1，修改失败返回0

print_r($update_flag);
}else{

//用另一种插入方式

// 创建SQL语句，通过:parm的方式来占位 插入操作
$sql=<<<EOF
    INSERT INTO archives (user_id, title, content, content_desc, time)
    VALUES(:user_id, :title, :content, :content_desc, :time);
EOF;


$stmt = $db->prepare($sql);  // 传入带有占位符的sql语句
$stmt->bindValue(':user_id', $user_id); // 绑定占位符与参数数据
$stmt->bindValue(':title', $title);
$stmt->bindValue(':content', $content);
$stmt->bindValue(':content_desc', $content_desc);
$stmt->bindValue(':time', $time);
$result = $stmt->execute(); // 执行

echo $db->lastInsertRowID(); // 获取最后插入到数据库的ID，可以通过这个判断插入是否成功
// 大于0：插入成功 为0：插入失败


}

?>