    <style>
        .table tr { border:0px solid #000; }
        .table th { text-align:center; }
        .table td { vertical-align:middle;padding:10px 22px 0px 20px;border-top:0px;border:0px solid #000; }
        .table .thside { width:70px; }
        .table .thcenter { width:180px; }
        .table .tdgap { border-bottom:1px solid #CCC; }
        input { width:240px; }
        .table .comment { vertical-align:top; }
    </style>
    <script type="text/javascript">
        function frm_comment_submit() {
            var frm = $('#frm_comment').serialize();
            $.ajax({
                url : '/mumu/commentinsert',
                type : 'POST',
                data : frm,
                datatype : 'json',
                success : function(data) {
                    alert(data);
                    location.href='/mumu';
                },
                error : function(x,e) {
                    alert(x.status);
                    alert(e);
                },
            });
        }
        function view_comment(srl) {
            $('#view_comment').load('/mumu/viewcomment', { 'srl' : srl } );
        }
    </script>
    <table class="table">
        <tr>
            <td style="width:60%">
                <table>
                    <thead>
                    <tr>
                        <th class="thside">Writer</th>
                        <th class="thcenter">Comment</th>
                        <th class="thside">Time</th>
                    </tr>
                    </thead>
                    <tr>
                        <td class="tdgap" colspan="3"></td>
                    </tr>
                    <?php
                    foreach($lists as $row) {
                    ?>
                    <tr>
                        <td><?=$row['mu_eater'];?></td>
                        <td><a href="javascript:view_comment(<?=$row['mu_id'];?>)"><?=$row['mu_comment'];?></a></td>
                        <td><?=substr($row['mu_create_date'],11,8);?></td>
                    </tr>
                    <tr>
                        <td class="tdgap" colspan="3"></td>
                    </tr>
                    <?
                    }
                    ?>
                </table>
            </td>
            <td class="comment" style="width:40%">
                <form class="form-horizontal" method="post" id="frm_comment" onSubmit="return false;">
                <input type="hidden" name="eater" value="prog106">
                <div class="input-append">
                    <input type="text" id="comment" name="comment" placeholder="Hungry!" style="height:70px">
                    <button type="button" id="frm_comment_btn" class="btn" style="height:80px">Go Eat!</button>
                </div>
                </form>
                <div style="width:300px;height:300px;" id="view_comment"></div>
            </td>
        </tr>
    </table>
    <script>
        $('#frm_comment_btn').click(function() {
            var chkId = ['comment'];
            var chkMsg =['comment'];
            for(var i=0;i<chkId.length;i++) {
                if($('#' + chkId[i]).val() == '') {
                    alert(chkMsg[i] + ' is Null!');
                    $('#' + chkId[i]).focus();
                    return false;
                }
            }
            frm_comment_submit();
        });
    </script>
