<?php

$myname = $_POST['myname'];

if (empty($_FILES['image']) || $_FILES['image']['error'] !== 0) {
	json(['errcode' => -1, 'errmsg' => 'Upload error !']);
} else {
	$dir = __DIR__;
	is_dir($dir) ? true : mkdir($dir, 0777, true);
	$img_name = time() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	move_uploaded_file($_FILES['image']['tmp_name'], $dir . '/' . $img_name);
	json(['errcode' => 0, 'thumb_name' => $img_name]);
}


function json($arr, $output = true)
{
	$content = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

	if (! $output) {
		return $content;
	}

	header('Content-Type: application/json; charset=utf-8');
	exit($content);
}