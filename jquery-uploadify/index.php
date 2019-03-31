<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="//upcdn.b0.upaiyun.com/libs/jquery/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="./uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./uploadify/uploadify.css">
</head>

<body>
	<h1>Uploadify Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>

	<script type="text/javascript">
		<?php $timestamp = time(); ?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('also' . $timestamp);?>'
				},
				'onUploadSuccess' : function(file, data, response) {
					data = $.parseJSON(data);
					if (data.errcode == 0) {
						// 显示缩略图
					} else {
						alert(data.errmsg);
					}
				},
				'fileTypeExts' : '*.jpg; *.jpeg; *.png; *.gif;',
				'swf'      : './uploadify/uploadify.swf',
				'uploader' : './do_upload.php'
			});
		});
	</script>
</body>
</html>