<?php
class mydb() extends sqlite3{
    function __construct(){
        $this->open('user.db');
    }
}

$db=new mydb();

$sql=<<<EOF
    
EOF;
?>