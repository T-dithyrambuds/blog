<?php

if (empty($_COOKIE["username"])){
      header('Location: login.html');
}else{
    echo '您已登录成功,您的用户名是：' .$_COOKIE['username'] ;die;
?>

\

<?php }?>