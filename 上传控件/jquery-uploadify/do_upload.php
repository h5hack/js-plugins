<?php

$verifyToken = md5('also' . $_POST['timestamp']);

if (! empty($_FILES) && $_POST['token'] == $verifyToken) {

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$targetFile = './uploads/' . date('YmdHis') . str_pad(explode('.', microtime(true))[1], 4, '0', STR_PAD_LEFT) . '.' . $fileParts['extension'];
	
	$fileTypes = array('jpg','jpeg','gif','png');
	
	if (in_array($fileParts['extension'], $fileTypes)) {
		move_uploaded_file($tempFile, $targetFile);
		echo json_encode([
			'errcode' => 0,
			'errmsg' => '文件上传成功！',
		]);
	} else {
		echo json_encode([
			'errcode' => 1,
			'errmsg' => '不允许的类型',
		]);
	}
}