    <script type="text/javascript">
        function readURL(input, tmp) {
            alert(1);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#'+tmp).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function frm_adinsert_submit() {
            var frm = $('#frm_adinsert');
            $.ajax({
                url : '/adform/adinsert',
                type : 'POST',
                data : frm.serialize(),
                datatype : 'json',
                success : function(data) {
                    alert(data);
                    location.href='/adform';
                },
                error : function(x,e) {
                    alert(x.status);
                    alert(e);
                },
            });
        }
    </script>
    <form class="form-horizontal" method="post" id="frm_adinsert" enctype="multipart/form-data">
    <input type="hidden" name="tps" value="insert">
        <div class="control-group">
            <label class="control-label" for="title">title</label>
            <div class="controls">
                <input type="text" id="title" name="title" placeholder="title" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="desc">desc</label>
            <div class="controls">
                <input type="text" id="desc" name="desc" placeholder="desc" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="startdate">start_date</label>
            <div class="controls">
                <div id="datetimepicker1" class="input-append date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="startdate" name="startdate" placeholder="start_date" value="">
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="enddate">end_date</label>
            <div class="controls">
                <div id="datetimepicker2" class="input-append date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="enddate" name="enddate" placeholder="end_date" value="">
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="money">money</label>
            <div class="controls">
                <input type="text" id="money" name="money" placeholder="money" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="img1">main images</label>
            <div class="controls">
                <img id="review1" src="#" />
                <input type="file" id="img1" name="img1" placeholder="main image" onchange="readURL(this, 'review1');">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="img2">contents images</label>
            <div class="controls">
                <img id="review2" src="#" />
                <input type="file" id="img2" name="img2" placeholder="contents images" onchange="readURL(this, 'review2');">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="button" id="frm_adinsert_btn" class="btn">Create</button>
            </div>
        </div>
    </form>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({ language: 'pt-BR' });
            $('#datetimepicker2').datetimepicker({ language: 'pt-BR' });
            $('#img1').uploadify({
                'swf' : '/static/js/uploadify.swf',
                'uploader' : '/adform/adimageinsert',
            });
        });
        $('#frm_adinsert_btn').click(function() {
            var chkId = ['title', 'desc', 'startdate', 'enddate', 'money'];
            var chkMsg =['title', 'desc', 'start_date', 'end_date', 'money', 'image1', 'image2'];
            for(var i=0;i<chkId.length;i++) {
                if($('#' + chkId[i]).val() == '') {
                    alert(chkMsg[i] + ' is Null!');
                    $('#' + chkId[i]).focus();
                    return false;
                }
            }
            frm_adinsert_submit();
        });
    </script>
