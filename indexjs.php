<?php
$db = new PDO("sqlite:./db/blog.db");

$results = $db->query("SELECT COUNT(ID) id FROM archives")->fetchAll();
// echo $results[0]['id'];

?>


<script>
    var num, time;
    if(!page_no){
        var page_no=1;
    };

    

    $(
        show_archives()
    )

    // 修改标题
    $('#wen').html('文章列表');     
            
    //展示文章细节
    function show_archives(){
        $.get(
        'archive.php',
        {
            page:page_no
        },
        function(data){
            
            datas=JSON.parse(data);
            for(i in datas){
                a=parseInt(i)+1;
                

                
                
                $('#box_'+i).append('<a href="show_archive.php?id='+datas[i]['ID']+'" id="title_'+i+'">'+datas[i]['title']+'</a><br>');
                $('#title_'+i).css({"font-size":"200%","color":"black"});
                
                $('#box_'+i).append('<label id="time_name_'+i+'">'+datas[i]['time']+'-'+datas[i]['user_id']+
                '&nbsp;<a class="btn-primary btn btn-xs btn-up" onclick=\'del('+i+','+datas[i]['ID']+',"'+datas[i]['user_id']+
                '")\'>删除</a>&nbsp;<a href="post.php?archives_id='+datas[i]['ID']+'" class="btn-danger btn btn-xs btn-up" onclick=\'upd('+i+',"'+datas[i]['ID']+'")\'>修改</a></label><br>');
                $('#time_name_'+i).css("font-weight","100");

                $('#box_'+i).append('<label id="content_'+i+'">'+datas[i]['content']+'</label><br>')
                $('#content_'+i).css({"font-size":"120%","font-weight":"normal"});

                $('#box_'+i).after('<div id="box_'+a+'"></div>');
                // $('#box_'+a).css({
                //     "border-bottom":"1px solid rgb(52,58,64)",
                //     "margin-top": "10px",
                //     "margin-bottom": "10px",
                //     "padding-bottom": "10px"
                // })
            }

            

        }
    )
    }
 
    var data_count = <?php print_r($results[0]['id']) ?>;
    page_count=data_count%3==0?data_count/3:parseInt(data_count/3)+1;
    // 下一条
    
    $('.next').click(function(){
        $('#box_0').empty();
        $('#box_1').empty();
        $('#box_2').empty();
        page_no+=1;
        show_archives();
        changeBtnStatus(page_no,page_count);
        
        
    })
    $('.last').attr('disabled','true');// 上一页默认为不可用
    function changeBtnStatus(page_no,page_count){
        if(page_no<page_count){
            $('.next').removeAttr("disabled")
        }else{
            $('.next').attr('disabled','true');
        }

        if(page_no<=1){
            console.log(222)
            $('.last').attr('disabled','true');
        }else{
            console.log(1111)
            $('.last').removeAttr("disabled")
        }

    }
    
    


    //上一条
    
    
    $('.last').click(function(){
        $('#box_0').empty();
        $('#box_1').empty();
        $('#box_2').empty();
        page_no-=1;
        show_archives();
        changeBtnStatus(page_no,page_count);
    })
      

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

    // 展示文章日期（去重）
    $.get(
        'menu.php',
        function(data){
            num=data;
            time=JSON.parse(num);
            for(i in time){
                $('.none').append('<li><a href="#">'+time[i]['time']+'</a></li>')
            }
        }
    )

    
</script>