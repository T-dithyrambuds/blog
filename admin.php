<?php

if (empty($_COOKIE["username"])){
    header('Location: login.html');
}else{

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <style>
        .top label{
            font-size:150%;
            font-weight: 500;
        }
        .top{
            height:80px;
            padding-top: 28px;
            padding-left: 20px;
            /* box-shadow:0.1px 5px 1px rgb(94,114,228); */
            background-color: rgb(94,114,228);
            color: white;
        }
        .top a:link {
            text-decoration:none;
            color:white;
        }
        .top a:visited {
            text-decoration:none;
            color:white;
        }
        .top a:hover {
            text-decoration:none;
            color:white;
        }
        .top a:active {
            text-decoration:none;
            color:white;
        }
        .form-control {
            margin-bottom: 20px;
        }
        #scroll {
            overflow-y:auto;
            /* height:300px; */
        }
        .outer{
            margin-left: 200px;
            margin-right: 200px;
            margin-top:50px;
        }
    </style>
</head>
<body>

<div class="top">
    <label><a href="#" >首页&nbsp;&nbsp;</a></label>
    <label><a href="#" >文章发布&nbsp;&nbsp;</a></label>
    <label><a href="#" >文章列表&nbsp;&nbsp;</a></label>
</div>
<div class="outer" style="background-color: rgba(52,58,64,0.1);;
box-shadow:0.1px 1px 5px rgba(52,58,64,0.2);
">
    <div class="box" style="padding: 20px;">
        <input type="text" id="title" class="form-control">
        
        <textarea rows="12"  style="margin-bottom: 20px;width:100%">

        </textarea><br>
        
        <button class="btn-primary btn-lg push">发布</button>
        <button class="btn-primary btn-lg cancel">取消</button>
        
        <span class="glyphicon glyphicon-ok" style="display:none"></span>
        <span class="glyphicon glyphicon-remove" style="display:none"></span>
        <label id="notice" style="color:red"></label>
    </div>
    
</div>

<script>
    $('.glyphicon').hide();
    $('.push').click(function(){
        $.post(
            'insert.php',
            {
                name:$.cookie('username'),
                title:$('#title').val(),
                content:$('textarea').val()
            },
            function(data){
                // $('.push').html(data);
                console.log(data);
                if(data==1){
                    $('.glyphicon-ok').show();
                    $('#notice').html('发布成功');
                  
                }else{
                    $('.glyphicon-remove').show();
                    $('#notice').html('发布失败');
                }
            }
        )
       
    });

</script>
</body>
</html>

<?php }?>