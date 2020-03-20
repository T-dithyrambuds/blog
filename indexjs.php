<script>
    var num, time;
    var datas, what;

    // 修改标题
    $('#wen').html('文章列表');     
            
    //展示文章细节
    $.get(
        'archive.php',
        
        function(data){
            
            datas=JSON.parse(data);
            for(i in datas){
                a=parseInt(i)+1;
                

                
                
                $('#box_'+i).append('<a href="archives_test.php?id='+datas[i]['ID']+'" id="title_'+i+'">'+datas[i]['title']+'</a><br>');
                $('#title_'+i).css({"font-size":"200%","color":"black"});
                
                $('#box_'+i).append('<label id="time_name_'+i+'">'+datas[i]['time']+'-'+datas[i]['user_id']+
                '&nbsp;<a class="btn-primary btn btn-xs btn-up" onclick=\'del('+i+','+datas[i]['ID']+',"'+datas[i]['user_id']+
                '")\'>删除</a>&nbsp;<a href="post.php?archives_id='+datas[i]['ID']+'" class="btn-danger btn btn-xs btn-up" onclick=\'upd('+i+',"'+datas[i]['ID']+'")\'>修改</a></label><br>');
                $('#time_name_'+i).css("font-weight","100");

                $('#box_'+i).append('<label id="content_'+i+'">'+datas[i]['content']+'</label><br>')
                $('#content_'+i).css({"font-size":"120%","font-weight":"normal"});

                $('#box_'+i).after('<div id="box_'+a+'"></div>');
                $('#box_'+a).css({
                    "border-bottom":"1px solid rgb(52,58,64)",
                    "margin-top": "10px",
                    "margin-bottom": "10px",
                    "padding-bottom": "10px"
                })
            }

            

        }
    )
 

 
        
    function del(i,id,user_id){
        // console.log(id+user_id);
        
        if(confirm('删除后不可恢复，真的要删掉吗')){
            
            $.post(
            'delete.php',
            {
                id:id,
                user_id:user_id,
                type:1
            },
            function(data){
                $('#message').html(data);
                $('#box_'+i).fadeOut('slow');
            }
        );
        }
        
        // console.log('DONE');
    }
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

    function upd(i,id){
        $.get(
            'post.php',
            {
                archives_id:id
            }
        )

    }


    
</script>