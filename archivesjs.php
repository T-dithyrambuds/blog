<script>
    var num, time;
    var data, what;

    // 修改标题
    $('#wen').html('文章列表');     
            
    //展示文章细节
    $.get(
        'get_archive.php',
        {
            id:<?php echo $_GET['id']; ?>
        },
        function(data){
            data=JSON.parse(data);
             console.log(data);
                
            $('#archives').append('<label  id="title_0">'+data['title']+'</label><br>');
            $('#title_0').css({"font-size":"200%","color":"black"});
            
            $('#archives').append('<label id="time_name_0">'+data['time']+'-'+data['user_id']+
            '&nbsp;&nbsp;<a href="post.php?archives_id='+data['ID']+'" class="btn-danger btn btn-xs btn-up" onclick=\'upd("'+data['ID']+'")\'>修改</a></label><br>');
            $('#time_name_0').css("font-weight","100");

            $('#archives').append('<label id="content_0">'+data['content']+'</label><br>')
            $('#content_0').css({"font-size":"120%","font-weight":"normal"});

        }
    )
 

 
        
    
    // 判断是否有cookies，没有就隐藏修改删除按钮
    $(
        $.get(
            'judge.php',
            function(data){
                if(data==0){
                    $('.btn-up').hide();
                }
            }
        )
    )
 
    //修改

    function upd(id){
        $.get(
            'post.php',
            {
                archives_id:id
            }
        )

    }


    
</script>