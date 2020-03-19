<?php
error_reporting(0);
if (empty($_COOKIE["username"])){
    header('Location: login.html');
}else{
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    
    <!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. -->
    <link href="./froala/css/froala_style.min.css" rel="stylesheet" type="text/css" />    
    
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
            margin-left: 20%;
            margin-right: 20%;
            margin-top:50px;
        }
        .fr-element{
            height:250px;
            overflow-y:scroll;
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
        <input type="text" id="title" class="form-control" value="" placeholder="title">
        
        <!-- <textarea rows="12"  style="margin-bottom: 20px;width:100%" value=""> -->
        <textarea value=""></textarea>
        </textarea><br>
        
        <button class="btn-primary btn-lg push">发布</button>
        <button class="btn-primary btn-lg cancel">取消</button>
        
        <span class="glyphicon glyphicon-ok" style="display:none"></span>
        <span class="glyphicon glyphicon-remove" style="display:none"></span>
        <label id="notice" style="color:red"></label>
    </div>
    
</div>

 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/js/froala_editor.pkgd.min.js"></script>
 
<script>
    $(function() { 
            $('textarea').froalaEditor() 
    }); 
    $(function() {
            $('div#froala-editor').froalaEditor({
                dragInline: false,
                toolbarButtons: ['bold', 'italic', 'underline', 'insertImage', 'insertLink', 'undo', 'redo'],
                pluginsEnabled: ['image', 'link', 'draggable']
            })
        });

    <?php
    if(!empty($_GET['archives_id'])){
        
        $id=$_GET['archives_id'];
        class mydb extends sqlite3{
            function __construct(){
                $this->open('./db/blog.db');
            }
        }
        $db= new mydb();
        
        $sql=<<<EOF
            SELECT title,content FROM archives WHERE id='$id';
        EOF;
        
        $result=$db->query($sql);
        $item=$result->fetchArray(SQLITE3_ASSOC);
        

        $con=$item['content'];
        $con=trim($con);
        // $con=str_replace(array("\r\n","\n","\r"),"<br>",$con);
        
        $title=$item['title'];
        $title=str_replace("'","\'",$title);

        ?>
        $('#title').attr('value','<?php print_r($title); ?>');

        var con='<?php print_r($con); ?>';
        var con=con.split('<br>').join('\n');
        $('textarea').val(con);
        <?php
        
    }
    ?>
    $('.glyphicon').hide();
    $('.push').click(function(){
        if($('#title').val()!="" && $('#content').val()!=""){

        
        $.get(
            'insert.php',
            {
                name:$.cookie('username'),
                title:$('#title').val(),
                content:$('textarea').val(),
                archives_id:<?php echo empty($_GET['archives_id'])?'""':$_GET['archives_id']; ?>
                
            },
            function(data){
                // $('.push').html(data);
                
                if(data==0){
                    $('.glyphicon-remove').show();
                    $('#notice').html('操作失败');
                  
                }else if(data==1){
                    $('.glyphicon-ok').show();
                    $('#notice').html('修改成功');
                }else{
                    $('.glyphicon-ok').show();
                    $('#notice').html('发布成功');
                }
            }
        )
        }else{
            $('#notice').html('你发你嘛');
        }
    });

</script>
</body>
</html>

<?php
}
?>