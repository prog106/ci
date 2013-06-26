<style type="text/css">
body { background-color:#EEE; }
ul { margin:0;padding:0; }
li { list-style-type:none;border-bottom:1px solid #CCC;padding:10px 5px 5px 10px; }
.wrap { clear:both;background-color:#C00;width:900px;min-height:100%;margin:22px auto 0px;padding:20px 20px 0 20px;border:1px solid #000; }
.wrapper { position:relative;overflow:hidden; }
.logo { color:white; }
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
</style>
<div class="wrap">
    <h3 class="logo">Ma Cham</h3>
    <div class="wrapper">
        <ul class="left">
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
            <li>
                <div class="info"><span class="writer">nick-name</span> <span class="company">compamy</span> <span class="timer">time</span></div>
                <div class="comment">contents HERE!!</div>
            </li>
        </ul>
        <ul class="right">
            <li>
                <form class="form-horizontal" method="post" id="frm_comment" onSubmit="return false;">
                <input type="hidden" name="eater" value="prog106">
                <textarea rows="5" name="comment" id="comment" placeholder="Hungry!" style="width:315px;"></textarea>
                <button type="button" id="frm_comment_btn" class="btn">Go Eat!</button>
                </form>
            </li>
            <li>
                user info / company / I'm write ...
            </li>
            <li>
                <select name="company">
                    <option>ALL</option>
                </select>
            </li>
            <li class="cal"><?=$calendar;?>
            </li>
        </ul>
    </div>
</div>
<script>
function move(cal) {
    $('.calendar').load('/macham/calendars', { 'month' : $('.'+cal).attr('id') });
}
$(function() {
});
</script>
