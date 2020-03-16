<?php
$db = new PDO("sqlite:./db/blog.db");
$results = $db->query('SELECT * FROM archives')->fetchAll();
// foreach ($results as $key=>$row) {
	//var_dump($row);
	// echo $row['title']." ".$row['user_id']." ".$row['time']." ".$row['content']."\n\r";
    $jsondata=json_encode($results);
    print_r($jsondata);
// }



?>