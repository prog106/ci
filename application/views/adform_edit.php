    <script type="text/javascript">
        function readURL(input, tmp) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#'+tmp).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <form class="form-horizontal" action="adupdate" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tps" value="update">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
        <div class="control-group">
            <label class="control-label" for="title">title</label>
            <div class="controls">
                <input type="text" id="title" name="title" placeholder="title" value="<?=$row['ad_title'];?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="desc">desc</label>
            <div class="controls">
                <input type="text" id="desc" name="desc" placeholder="desc" value="<?=$row['ad_desc'];?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="startdate">start_date</label>
            <div class="controls">
                <div id="datetimepicker1" class="input-append date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="startdate" name="startdate" placeholder="start_date" value="<?=$row['ad_startdate'];?>">
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
                    <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="enddate" name="enddate" placeholder="end_date" value="<?=$row['ad_enddate'];?>">
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="money">money</label>
            <div class="controls">
                <input type="text" id="money" name="money" placeholder="money" value="<?=$row['ad_money'];?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="img1">main images</label>
            <div class="controls">
                <? if($row['ad_img1']) { ?><img src="<?=$row['ad_img1'];?>"><? } ?>
                <img id="review1" src="#" />
                <input type="file" id="img1" name="img1" placeholder="main image" onchange="readURL(this, 'review1');">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="img2">contents images</label>
            <div class="controls">
                <? if($row['ad_img2']) { ?><img src="<?=$row['ad_img2'];?>"><? } ?>
                <img id="review2" src="#" />
                <input type="file" id="img2" name="img2" placeholder="contents images" onchange="readURL(this, 'review2');">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Modify</button>
            </div>
        </div>
    </form>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({ language: 'pt-BR' });
            $('#datetimepicker2').datetimepicker({ language: 'pt-BR' });
        });
    </script>
