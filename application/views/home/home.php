<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<title>HOME</title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="http://jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.min.js"></script>
<link type="text/css" rel="stylesheet" href="/static/css/common_home.css">
</head>
<body>
<ul id="sort">
    <li style="border:1px solid #000;width:300px;height:50px;" id="id1" attr-id="1" class="list">Tmon1</li>
    <li style="border:1px solid #000;width:300px;height:50px;" id="id2" attr-id="2" class="list">Tmon2</li>
    <li style="border:1px solid #000;width:300px;height:50px;" id="id3" attr-id="3" class="list">Tmon3</li>
    <li style="border:1px solid #000;width:300px;height:50px;" id="id4" attr-id="4" class="list">Tmon4</li>
    <li style="border:1px solid #000;width:300px;height:50px;" id="id5" attr-id="5" class="list">Tmon5</li>
    <li style="border:1px solid #000;width:300px;height:50px;" id="id6" attr-id="6" class="list">Tmon6</li>
</ul>
<script>
$(function() {
    $('#sort').sortable({
        stop : function() {
            make();
        }
    });
    make();
});
var srl = 6;
var ls = '';
function make() {
    $('.list').each(function() {
        ls += $(this).attr('attr-id');
    });
    console.log(ls);
    ls = '';
}
</script>
<? die; ?>
<img src="/static/img/1680_00.jpg" width="600" height="500" id="jc">
link : <input type="text" id="lk">
<div id="mv"></div>
<button id="mk" onclick="showResult();">Create</button>
<div id="rt" style="width:800px;height:200px;border:1px solid #000;"></div>
<!-- img src="http://prog106.phps.kr/ci/static/img/1680_00.jpg" alt="" usemap="#map1392040155125">
<map id="map1392040155125" name="map1392040155125">
<area shape="rect" coords="245,590,858,875" title="123" alt="123" href="http://prog106.phps.kr" target="_self">
<area shape="rect" coords="1678,1048,1679,1049" alt="HTML Map" title="HTML Map" href="http://www.html-map.com/" target="_self">
</map -->

<script>
$(function() {
    $('#jc').Jcrop({
        onChange : showRecords,
        onSelect : showRecords
    });
});
function showRecords(j) {
    $('#mv').data("coords",j.x + ',' + j.y + ',' + j.x2 + ',' + j.y2);
}
function showResult() {
    var cds = $('#mv').data('coords');
    var ldk = $('#lk').val();
    $('#rt').text("<map id=\"map123\" name=\"map123\"><area shape=\"rect\" coords=\"" + cds + "\" href=\"" +ldk+ "\"></map>");
}
</script>
<img usemap="#map123" src="/static/img/1680_00.jpg" width="600" height="500" id="jc">
<map id="map123" name="map123"><area shape="rect" coords="556,8,595,57" href="prog106.phps.kr"></map>
<!-- div id="wrap">
    <div id="toparea">
        <div id="logo">
            <span class="logo">Source Ctrl Test</span>
        </div>
        <div id="menu">
            <ul class="menu">
                <li>3</li>
                <li>2</li>
                <li>1</li>
            </ul>
        </div>
    </div>
    <div id="mainarea">
        <textarea cols="100" rows="10" id="codehtml"></textarea>
        <div id="codeview"></div>
    </div>
    <script>
        $(function() {
            $('#codehtml').keyup(function() {
                $('#codeview').html($('#codehtml').val());
            });
        });
    </script>
    <div id="bottomarea">5
    </div>
</div -->
</body>
</html>
