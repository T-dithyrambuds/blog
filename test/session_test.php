<?php
session_start(); //开始session


    if (isset($_SESSION['a'])) {
        $_SESSION['a']+=1;
    } else {
        $_SESSION['a'] = 1;
    }
    
?>

<html>
<body>

<?php

echo 'a='.$_SESSION['a'];

if($_SESSION['a']>9){
    session_destroy();
}

?>

<body>
<html>