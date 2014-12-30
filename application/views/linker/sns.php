<div class="snsbar bg-success">
<? if(!empty($write)) { ?>
        <a href="javascript:;" id="kakaotalk" data-url="<?=$user?>"><img src="/static/img/kt.jpg" width="31"></a>
        <a href="javascript:;" id="kakaostory" data-url="<?=$user?>"><img src="/static/img/ks.png" width="28"></a>
        <a href="javascript:;" id="facebook" data-url="<?=$user?>"><img src="/static/img/fb.jpg" width="28"></a>
<? } else { ?>
        <a href="http://ttolo.kr/linker/view/<?=$user?>">Go MyLink</a>
        <a href="javascript:;" id="urlins" style="float:right"><img src="/static/img/icons/glyphicons_030_pencil.png" width="20"></a>
<? } ?>
</div>

<script>
Kakao.init('1a3dc16be39930d816d899222d321cf6');
function kakaotalk(url) {
    Kakao.Link.sendTalkLink({
        label : "또로 MyLinker!!\n\nhttp://ttolo.kr/linker/view/" + url + "\n" ,
        webLink : {
            text : "또로 MyLinker 바로이동",
            url : "http://ttolo.kr/linker/view/" + url,
        }
    });
}
function kakaostory(url) {
    var win = window.open('http://story.kakao.com/share?url=http://ttolo.kr/linker/view/'+url,'kakaostory','width=550px,height=440px');
    if(win) { win.focus(); }
}
function facebook(url) {
    var win = window.open('http://www.facebook.com/sharer/sharer.php?u=http://ttolo.kr/linker/view/'+url,'facebook','width=550px,height=440px');
    if(win) { win.focus(); }
}
$(function() {
    $('#kakaotalk').click(function() {
        kakaotalk($(this).data('url'));
    });
    $('#kakaostory').click(function() {
        kakaostory($(this).data('url'));
    });
    $('#facebook').click(function() {
        facebook($(this).data('url'));
    });
    $('#urlins, #urlinsclose').click(function() {
        $('#urlinspage').slideToggle();
    });
});
</script>
