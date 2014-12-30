<!DOCTYPE html>
<html lang="kr" ng-app="ngLinker">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<!-- 페이스북 메타태그 -->
<meta property="fb:admins" content="ttolo" />
<meta property="og:title" content="또로 MyLinker" />
<meta property="og:image" content="http://ttolo.kr/static/img/ttolo_logo.png" />
<meta property="og:description" content="나만의 즐겨찾기를 공유하는 MyLinker!" />
<meta property="og:url" content="http://ttolo.kr/linker" />
<meta name="subject" content="또로 MyLinker">
<meta name="description" content="나만의 즐겨찾기를 공유하는 MyLinker!">
<meta name="author" content="ttolo.kr">
<meta name="keywords" content="즐겨찾기,favorite,mylinker,link,링크,마이링커">
<link rel="icon" href="/static/img/ttolo_logo.png">
<link rel="apple-touch-icon" size="96x96" href="/static/img/ttolo_logo.png">
<link rel="shortcut icon" href="/static/img/ttolo_logo.png">
<title>MyLinker</title>
<link rel="stylesheet" href="/static/css/bootstrap.css">
<link rel="stylesheet" href="/static/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/static/css/bootstrap-docs.min.css">
<script type="text/javascript" src="/static/js/jquery-1.9.1.min.js" charset="utf-8"></script>
<script src="/static/js/jquery.slides.min.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/kakao3.0.link.js"></script>
<script src="/static/js/angular/angular.js"></script>
<style>
.linker_table {width:100%;}
.linker_table .td_del {cursor:pointer;width:40px;text-align:center;background-color:#f7f7f9;border:1px solid #e1e1e8;}
.linker_table .td_cont {padding:0 10px 10px 10px;border:1px solid #e1e1e8;}
.linker_table .td_set {cursor:pointer;width:30px;text-align:center;background-color:#f7f7f9;border:1px solid #e1e1e8;}
.linker_table .td_cont span {font-size:12px;margin-top:10px;word-break:break-all;}
.linker_table .td_go {cursor:pointer;width:30px;text-align:center;background-color:#f7f7f9;border:1px solid #e1e1e8;}
.td_mod {position:absolute;left:30px;}
.td_mod_table {background-color:#fff;border:1px solid #e1e1e8;}
.td_mode .td_del {cursor:pointer;width:40px;text-align:center;background-color:#f7f7f9;border:1px solid #e1e1e8;}
.td_mod_hide {display:none;}
.td_mod_del {cursor:pointer;text-align:center;width:50px;}
.td_mod_top {cursor:pointer;text-align:center;width:50px;}
.td_mod_fav {cursor:pointer;text-align:center;width:50px;}
.td_mod_sec {cursor:pointer;text-align:center;width:50px;}
.snsbar {width:100%;padding:0 10px;margin-bottom:7px;line-height:3.2;}
.snsbar a {padding:0 5px;}
.hidden {display:none;}
</style>
<script>
function go(url) {
    var gurl = (url.length > 7) ? url.substring(0,7) : "";
    if(gurl != 'http://') {
        url = 'http://' + url;
    }
    var win = window.open(url,'','');
    if(win) { win.focus(); }
}
function nickchk(str) {
    return (str.match(/[^(ㄱ-ㅎ가-힝0-9a-zA-Z)]/)) ? false : true;
}
function pwdchk(str) {
    return (str.match(/[^(0-9a-zA-Z)]/)) ? false : true;
}
function urlchk(str) {
    return (str.match(/[^(ㄱ-ㅎ가-힝0-9a-zA-Z:\/.-_=+&#@()~?)],/)) ? false : true;
}
</script>
</head>

<body style="padding-top:60px;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <table width="100%">
        <tr>
            <td width="50%"><a class="navbar-brand" href="/linker">MyLinker</a></td>
            <td><? if(!empty($this->_user)) { ?><a class="navbar-brand" style="float:right" href="/linker/logout">logout</a><? } ?></td>
        </tr>
    </table>
</nav>
<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div id="urlsearchresult" class="urlsearchresult" style="display:none;">
    <table width="100%">
        <tr>
            <td style="line-height:2;text-align:center;cursor:pointer;" class="bg-primary" id="urlsearchclose">close</td>
        </tr>
        <tr>
            <td style="padding:0 10px 0 10px;border:1px solid #e1e1e8;"><h6 id="urlsearchhtml"></h6></td>
        </tr>
    </table>
    </div>
    <form id="urlsearch_form" name="urlsearch_form" method="post">
    <table width="100%">
        <tr>
            <td style="padding-left:10px;height:55px;">
                <input type="text" id="urltxt" name="urltxt" value="" placeholder="닉네임 검색" style="width:100%" class="form-control">
            </td>
            <td style="width:100px;">
                <input type="submit" class="btn btn-primary btn-sm" style="float:right;margin:5px 10px;padding:7px 25px;" value="검색">
            </td>
        </tr>
    </table>
    </form>
</nav>
<script>
$(function() {
    $("#urlsearch_form").submit(function() {
        if(!$("#urltxt").val()) {
            alert('검색할 닉네임을 입력하세요.');
            $("#urltxt").focus();
            return false;
        }
        if(!nickchk($("#urltxt").val())) {
            alert('닉네임에 사용할 수 없는 기호가 포함되어 있습니다.');
            $("#url").focus();
            return false;
        }
        $.ajax({
            cache : false,
            url : '/linker/urlsearch', 
            type : "POST",
            data : $('#urlsearch_form').serialize(),
            success : function(r) {
                var o = $.parseJSON(r);
                if(o.rtn == 'OK') {
                    $('#urlsearchhtml').html('').append(o.msg);
                    $('#urlsearchresult').show();
                    $('#urlsearchclose').click(function() { $('#urlsearchresult').hide(); });
                } else {
                    alert('검색에 실패하였습니다.');
                }
            },
            error : function(e) {
                alert('심각한 오류가 발생하였습니다.');
            }
        });
    });
});
</script>
