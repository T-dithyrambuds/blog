<?php
$str='aaa
bbb
ccc';

$re=str_replace(array("\r\n","\n","\r"),"<br>",$str);

// echo $re;

?>

<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div>
    <textarea value=''></textarea>
</div>
<script>
    re='<?php echo $re; ?>';
    re=re.split('<br>').join('\n');
    $('textarea').val(re);

</script>

</body>

</html>