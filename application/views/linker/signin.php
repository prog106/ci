<? $this->load->view('linker/head'); ?>
<form id="url_form" name="url_form" method="post">
<table width="100%">
    <tr>
        <td style="padding:0 10px"><h6 style="line-height:0">닉네임(url으로 사용)</h6><input type="text" id="url_name" name="name" value="" placeholder="닉네임" style="width:100%" class="form-control"></div>
    </tr>
    <tr>
        <td style="padding:0 10px"><h6 style="line-height:0">비밀번호</h6><input type="password" id="url_password" name="password" value="" placeholder="비밀번호" style="width:100%" class="form-control"></td>
    </tr>
    <tr>
        <td><input type="submit" class="btn btn-primary btn-sm" style="float:right;margin:3px 10px;padding:5px 25px;" value="Signin"></td>
    </tr>
</table>
</form>
<script>
$(function() {
    $("#url_form").submit(function() {
        if(!$("#url_name").val()) {
            alert('사용하실 닉네임을 입력하세요.');
            $('#url_name').focus();
            return false;
        }
        if(!nickchk($("#url_name").val())) {
            alert('닉네임은 한글, 영문, 숫자만 입력해 주세요.');
            $('#url_name').focus();
            return false;
        }
        if(!$("#url_password").val()) {
            alert('비밀번호를 입력하세요.');
            $('#url_password').focus();
            return false;
        }
        if(!pwdchk($("#url_password").val())) {
            alert('비밀번호는 영문, 숫자만 입력해 주세요.');
            $('#url_password').focus();
            return false;
        }
        $.ajax({
            cache : false,
            url : "/linker/signin",
            type : "POST",
            data : $("#url_form").serialize(),
            success : function(r) {
                var o = $.parseJSON(r);
                if(o.rtn == 'OK') {
                    alert('정상적으로 ' + o.msg + '되었습니다.');
                    self.location.reload();
                } else if(o.rtn == 'POK') {
                    alert('정확한 ' + o.msg + '를 입력해 주세요.');
                } else {
                    alert('오류가 발생하였습니다.');
                }
            },
            error : function(e) {
                alert('심각한 오류가 발생하였습니다.');
            }
        });
        return false;
    });
});
angular.module('ngLinker',[])
.controller("LinkerCtrl", ['$scope', function($scope) { }])
</script>
<div class="bs-callout bs-callout-info" style="margin:10px;">
    <h4>환영합니다!</h4>
    <p>이곳은 <code>MyLinker</code>입니다.</p>
</div>
<div class="bs-callout bs-callout-warning" style="margin:10px;">
    <h4>MyLinker 소개</h4>
    <p>Mobile에 최적화 되어 제작되었습니다만, PC에서도 충분히 사용이 가능합니다. <code>입력하신 닉네임으로 전용 MyLink가 생성</code>되며, 나만의 Bookmark를 만들고 관리할 수 있습니다.</p>
</div>
<div class="bs-callout bs-callout-danger" style="margin:10px;">
    <h4>MyLinker 정책?</h4>
    <p>입력하신 닉네임과 비밀번호는 모두 저장되지만 <code>암호화는 진행하지 않습니다.</code> 어떠한 개인정보도 저장 및 요청하지 않습니다. <code>해킹시 어떠한 책임도 지지 않습니다.</code></p>
</div>
<? $this->load->view('linker/footer'); ?>
