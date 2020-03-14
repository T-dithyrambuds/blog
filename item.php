<?php
class mydb extends sqlite3{
    function __construct(){
        $this->open('blog.db');
    }
}


$db=new mydb();
$id=$_GET['times'];

$sql=<<<EOF
    SELECT *  FROM archives WHERE id='$id' ORDER BY id ASC; 
EOF;

$result=$db->query($sql);
$data=$result->fetchArray(SQLITE3_ASSOC);
$jsondata=json_encode($data);
print_r($jsondata);
// print_r($data['title']);
// print_r($data['content']);
// print_r($data['time']);

// $db = new PDO("sqlite:blog.db");
// $results = $db->query('SELECT * FROM archives WHERE id=1')->fetchAll();
// foreach ($results as $key=>$row) {
// 	// echo json_encode($result);
// 	echo .$row['user_id']." ".$row['title']." ".$row['content']." ".$row['time']."\n\r";
// }
?>