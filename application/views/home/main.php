<?  phpinfo(); die; ?>
<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<title>HOME</title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<style>
body ul li {margin:0;padding:0;}
ul {list-style:none;}
.wrap {margin:0 auto;padding:0;width:990px;}
.container {}
.container .lst {margin:0;padding:0;overflow:hidden;margin-right:-12px;}
.container .lst li {float:left;position:relative;background-color:#eeeeee;width:322px;height:482px;margin:0 12px 24px 0;}
.itm {margin:0 auto;}
.record {width:312px;margin:0 auto;}
.comment {width:300px;height:150px;border:1px solid gray;}
</style>
</head>
<body>
<div class="wrap">
    <div class="container">
        <ul class="lst">
            <li class="itm">
                <form name="rec" id="rec" method="POST">
                <div class="record">
                    <input type="file" name="photo" id="photo"><br>
                    <textarea name="comments" class="comment" id="comments"></textarea><br>
                    <input type="submit" value="올리기">
                </div>
                </form>
            </li>
            <li class="itm">가나다</li>
            <li class="itm">라마바</li>
            <li class="itm">빙신연</li>
            <li class="itm"></li>
            <li class="itm"></li>
            <li class="itm"></li>
            <li class="itm"></li>
        </ul>   
    </div>
</div>
<script>
$(function() {
    $('#rec').submit(function() {
        $.ajax({
            type : "POST",
            url : "/home/rec",
            data : $('#rec').serialize(),
            success : function(data) {
                console.log(data);
                //window.location.reload();
            }
        });
        return false;
    });
});
</script>
</body>
</html>
