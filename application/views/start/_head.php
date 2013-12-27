<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>My Start Page</title>
<!-- link href="/static/css/layout.css" rel="stylesheet" type="text/css" charset="utf-8"/>
<link href="/static/css/uploadify.css" rel="stylesheet" type="text/css" charset="utf-8"/>
<link href="/static/css/bootstrap.css" rel="stylesheet" type="text/css" charset="utf-8"/>
<link href="/static/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" charset="utf-8"/>
<link href="/static/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" charset="utf-8"/>
<link href="/static/css/ui/jquery.ui.all.css" rel="stylesheet" type="text/css" charset="utf-8"/ -->
<script src="/static/js/jquery-1.9.1.min.js"></script>
<script src="/static/js/jquery.slides.min.js"></script>
<!-- script src="/static/js/jquery.uploadify.min.js"></script>
<script src="/static/js/bootstrap.js"></script>
<script src="/static/js/bootstrap-datetimepicker.min.js"></script>
<script src="/static/js/ui/jquery.ui.core.js"></script>
<script src="/static/js/ui/jquery.ui.widget.js"></script>
<script src="/static/js/ui/jquery.ui.mouse.js"></script>
<script src="/static/js/ui/jquery.ui.position.js"></script>
<script src="/static/js/ui/jquery.ui.sortable.js"></script>
<script src="/static/js/ui/jquery.ui.dialog.js"></script>
<script src="/static/js/jquery.iframe-transport.js"></script>
<script src="/static/js/jquery.fileupload.js"></script>
<script src="/static/js/jquery.countdown.js"></script -->
<style>
    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:3px;
    }

    #slides .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }

    #slides .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    .slidesjs-pagination {
      margin: 6px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(/static/img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
</style>
<script>
$(function(){
	$('#slides').slidesjs({
		width : 940,
		height : 528,
        navigation : false,
		effect : { slide : { speed : 1000 }, },
		play : { auto : true, interval : 3000 }
    });
    $('#mp_wrap1').slidesjs({
        width : 500,
        height : 700,
        navigation : false,
		effect : { slide : { speed : 1000 }, },
		play : { auto : true, interval : 3000 }
    });
    $('#mp_wrap2').slidesjs({
        width : 500,
        height : 700,
        navigation : false,
		effect : { slide : { speed : 1000 }, },
		play : { auto : true, interval : 3000 }
    });
});
</script>
</head>
