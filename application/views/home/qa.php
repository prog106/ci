<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<title>HOME</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="/static/css/uploadify.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.8.2.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="/static/js/jquery.uploadify.min.js"></script>
<script src="/static/js/jquery.fancybox-1.3.4.pack.js"></script>
<link href="/static/js/jquery.fancybox-1.3.4.css" rel="stylesheet">
</head>
<body>
<div>
	<a id="write" href="#openlayer">등록</a>
</div>
<table class="table table-condensed">
	<thead>
	<tr>
		<th>jira</th>
		<th>QA-comments</th>
		<th>create_at</th>
		<th>Dev-comments</th>
		<th>step</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</tbody>
	<!-- tr class="active">...</tr>
	<tr class="success">...</tr>
	<tr class="warning">...</tr>
	<tr class="danger">...</tr>
	<tr class="info">...</tr -->
</table>
<div style="display:none;">
<div id="openlayer">
<form name="save" id="save">
	<table class="table" style="width:600px;">
		<tr>
			<th>Writer</th>
			<td><input type="writer" class="form-control" id="writer" name="writer" placeholder="작성자"></td>
		</tr>
		<tr>
			<th>Jira</th>
			<td>
				<select class="form-control" id="jira" name="jira">
					<option value="MKT-218">MKT-218</option>
					<option value="MKT-219">MKT-219</option>
					<option value="MKT-217">MKT-217</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Comments</th>
			<td><textarea class="form-control" rows="3" id="comments" name="comments" placeholder="내용"></textarea></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" id="imgs" name="imgs"></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<button type="button" id="save_btn" class="btn btn-primary">QA 등록</button>
				<button type="button" id="cancel_btn" class="btn btn-default">취소</button>
			</td>
		</tr>
	</table>
</form>
</div>
</div>
<script>
$(function() {
	$('#imgs').uploadify({
        swf           : '/static/js/uploadify.swf',
        uploader      : '/home/uploadimg',
        'onUploadComplete' : function(file) {
        	console.log(file);
        }
	});
	$('#save_btn').click(function() {
		if(!$('#comments').val()) {
			alert('comment please!');
			return false;
		}
		$.ajax({
			url : '/home/save',
			type : 'post',
			data : $("#save").serialize(),
			success : function(data) {
				if(data == 'suc') {
					alert('등록완료!');
					self.location.reload();
				}
			}
		});
	});
	$('#cancel_btn').click(function() {
		$.fancybox.close();
	});
	$('a#write').fancybox();
});
</script>
</body>