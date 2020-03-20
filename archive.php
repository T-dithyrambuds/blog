<?php
error_reporting(0);
$page=$_GET['page'];
$amount=3 * ($page - 1);

$db = new PDO("sqlite:./db/blog.db");
$results = $db->query("SELECT * FROM archives ORDER BY id DESC LIMIT '$amount',3")->fetchAll();

$jsondata=json_encode($results);
print_r($jsondata);
//

?>