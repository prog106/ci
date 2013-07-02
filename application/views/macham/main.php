<style type="text/css">
body { background-color:#EEE; }
ul { margin:0;padding:0; }
li { list-style-type:none;border-bottom:1px solid #CCC;padding:10px 5px 15px 10px; }
.wrap { clear:both;background-color:#C00;width:900px;min-height:100%;margin:22px auto 0px;padding:20px 20px 0 20px;border:1px solid #000; }
.wrapper { position:relative;overflow:hidden; }
.logo { color:white;border:1px solid #000; }
.left { float:left;border:1px solid #000;background-color:white;width:540px; }
.right { float:right;border:1px solid #000;background-color:white;width:340px; }
.right li { border-bottom:0px solid #CCC; padding:5px; }
.right li table { margin:auto; }

.info { background-color:#EEE; }
.info .writer { font-weight:bold;font-size:12pt; }
.info .company { font-size:10pt; }
.info .timer { float:right;padding-right:3px; }
.comment { font-size:12pt;padding:5px 0 5px 0; }
.btn { margin-top:5px; }
.cal { height:200px; }
.calendar td { border:0px solid #000;width:30px;text-align:center; }
.calendar .month { font-size:12pt;font-weight:bold; }
.calendar .month .prev { cursor:pointer; }
.calendar .month .next { cursor:pointer; }
.calendar .week { font-size:7pt; }
.calendar .sun { color:#C00; }
.calendar .sat { color:#00C; }
.calendar .day { font-size:10pt; }
.calendar #today { background-color:#CCC; }
.calendar #before { font-size:7pt;background-color:#EEF; }
.calendar #after { font-size:7pt;background-color:#EEF; }

.reviewimage { width:200px;margin:5px 0 0 0;padding:5px; }
.reviewimage .on { width:200px;margin:5px 0 0 0;padding:5px;border:1px solid #000; }

.img { text-align:center;margin:5px auto 0; padding:5px;border:1px solid #CCC;display:none; }
.imagesrc { margin:5px auto 0; padding:5px;border:0px solid #CCC; }
#imgremove { cursor:pointer; }
.movelayer { width:900px;position:fixed; }
.movetop { float:right; }
</style>
<script type="text/javascript">
    function frm_comment_submit() {
        var frm = $('#frm_comment').serialize();
        $.ajax({
            url : '/macham/commentinsert',
            type : 'POST',
            data : frm,
            datatype : 'json',
            success : function(data) {
                alert(data);
                location.href='/macham';
            },
            error : function(x,e) {
                alert(x.status);
                alert(e);
            },
        });
    }
</script>
<? $time = time(); ?>
<div class="wrap">
    <h3 class="logo">Ma Cham</h3>
    <div class="wrapper">
        <div class="movelayer"><span class="movetop">top</span></div>
        <ul class="left">
            <?
            foreach($comments as $row) {
            $ctp = explode(" ", $row['mu_create_date']);
            $ct = explode("-", $ctp[0]);
            $cp = explode(":", $ctp[1]);
            $time = time();
            $commenttime = mktime($cp[0], $cp[1], $cp[2], $ct[1], $ct[2], $ct[0]);
            $gap = $time - $commenttime; // now - reg 3100

            $dgap = (int)($gap/(24*60*60)); // hour -> day
            if($dgap > 0) $gap = $gap - ($dgap*24*60*60);

            $mgap = (int)($gap/(60*60)); // min -> hour
            if($mgap > 0) $gap = $gap - ($mgap*60*60);

            $hgap = (int)(($gap)/60); // sec -> min
            if($hgap > 0) $gap = $gap - ($hgap*60);

            if($dgap > 1) {
                $timer = $dgap."D ";
                $timer .= " ago";
            } else if($dgap == 1) {
                $timer = "Yesterday";
            } else {
                $timer = ($mgap < 1)? '': $mgap."H ";
                $timer .= ($hgap < 1)? '': $hgap."M ";
                $timer .= " ago";
            }

            $imgview = ($row['mu_imagesrc'])? '<div class="imagesrc"><img src="/static/upload/'.$row['mu_imagesrc'].'"></div>' : '';
            ?>
            <li>
                <div class="info">
                    <span class="writer"><?=$row['mu_eater'];?></span>
                    <span class="company">compamy</span>
                    <span class="timer"><?=$timer;?></span>
                </div>
                <div class="comment"><?=$row['mu_comment'];?></div>
                <?=$imgview;?>
            </li>
            <?
            }
            ?>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!! <br>very nice?!!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!! <br>very nice?!!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!! <br>very nice?!!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
            <li id="moreview">
                <button class="btn btn-inverse" id="more">more view...</button>
                <input type="hidden" name="moreno" id="moreno" value="1">
            </li>
        </ul>
        <ul class="right">
            <li>
                <div id="countdown"></div>
            </li>
            <form class="form-horizontal" method="post" id="frm_comment" onSubmit="return false;">
            <li>
                <input type="hidden" name="eater" value="prog106">
                <textarea rows="5" name="comment" id="comment" placeholder="Hungry!" style="width:315px;"></textarea>
                <button type="button" id="frm_comment_btn" class="btn btn-info">Go Eat!</button>
                <span class="btn btn-warning fileinput-button">
                    <i class="icon-camera icon-white"></i>
                    <input id="fileupload" type="file" name="photo[]" multiple>
                    <input type="hidden" name="timestamp" value="<?=$time;?>">
                    <input type="hidden" name="token" value="<?=md5('prog106'.$time);?>">
                    <input type="hidden" name="imagesrc" id="imagesrc" value="">
                </span>
                <div class="img"><img id="img" /><button class="btn btn-success" id="imgremove">Image Delete</button></div>
            </li>
            </form>
            <!-- li>
                user info / company / I'm write ...
            </li>
            <li>
                <select name="company">
                    <option>ALL</option>
                </select>
            </li -->
            <li class="cal"><?=$calendar;?>
            </li>
        </ul>
    </div>
</div>
<script>
function move(cal) {
    $('.calendar').load('/macham/calendars', { 'month' : $('.'+cal).attr('id') });
}
$(function () {
    'use strict';
    var url = '/imgctrl/imagemacham';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $('#img').attr({ src : 'http://localhost/static/upload/' + data.result.returnname });
            $('.img').show();
            $('#imagesrc').val(data.result.returnname);
            $('.fileinput-button').hide();
        }
    });
    $('#imgremove').click(function() {
        $.ajax({
            type : 'post',
            url : '/imgctrl/imagemachamdrop',
            data : { imgsrc : $('#imagesrc').val() }
        }).done(function() {
            $('#imagesrc').val('');
            $('.img').hide();
            $('.fileinput-button').show();
        });
    });
    $('#more').click(function() {
        $.ajax({
            type : 'post',
            url : '/macham/viewmore',
            data : { moreno : $('#moreno').val() }
        }).success(function(data) {
            var no = $('#moreno').val();
            $('#moreview').before(data);
            no++;
            $('#moreno').val(no);
        });
    });
    $('#frm_comment_btn').click(function() {
        if($('#comment').val() == '') {
            alert('Comment Insert Please!');
            return false;
        }
        frm_comment_submit();
    });
    var austDay = new Date();
    austDay = new Date(<?=date('Y');?>, <?=date('n');?> - 1, <?=date('j');?>, 23, 59, 59);
    $('#countdown').countdown({
        until: austDay,
        format:'HMS',
        compact:true,
        layout: '{hnn}{sep}{mnn}{sep}{snn} Left Today' + "(<?=date('Y-m-d');?>)"
    });
});
</script>
