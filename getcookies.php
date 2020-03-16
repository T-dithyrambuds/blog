<?php
// $url = 'http://localhost:8888/login.html?id=2';
// parse_str(parse_url($url)['query'],$query_arr);

// $result=$query_arr['id'];
$id=$_GET['id'];
if($id==1)
    setcookie('content','first');
else
    print_r($_COOKIE['content']);


?>


cookie 
    用户名
    用户名 + 密码的混淆值比如 md5（username + password)
        比如值是：3568c3985813248c93df8ceac7996c07
    昵称
    




index.php
    首页判断是否登录
        COOKIE 判断是否为空 empty($_COOKIE['key'])
                           isset 判断失效
        登录 --- 继续执行下面的内容
        未登录 --- 跳转到登录页面 * 


