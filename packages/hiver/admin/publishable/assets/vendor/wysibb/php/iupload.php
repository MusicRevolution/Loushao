<?php
/*
 * 仅为范例，为了安全考虑，请重写该文件
 */
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$fileupload = $_FILES["img"]['tmp_name'];
$newfile = $_FILES["img"]["name"];
$isIframe =($_POST["iframe"]) ? true: false;
$idarea = $_POST["idarea"];
$result = false;
$error = '';
$url = '';
if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/png")) && ($_FILES["img"]["size"] < 20000000))
{ 
    if ($_FILES["img"]["error"] > 0) 
    { 
        $error = $_FILES["img"]["error"];
    } 
    else 
    {
        $date = date('Y-m-d');
        $root = dirname(__DIR__)."/../../uploads/attachments/".$date;
        if(!file_exists($root))
            mkdir($root);
        $extension = end(explode('.', $newfile));
        $newfile = date('Ymdhis').'.'.$extension;
        move_uploaded_file($_FILES["img"]["tmp_name"], $root.'/'.$newfile);
        $result = true;
        $url = "uploads/attachments/".$date.'/'.$newfile;
    } 
} else { 
    $error = "Invalid file"; 
}

if ($isIframe && $result) {
	#use for iframe upload
	echo '<html><body>OK<script>window.parent.$(".editor").insertImage("'.$url.'","'.$url.'").closeModal().updateUI();</script></body></html>';
}else{
	// use for drag&drop
	header("Content-type: text/javascript");
	if (!$result) {
		echo '{"status":0,"msg":'.$error.'}';
	} else {
		#OK
		echo '{"status":1,"msg":"OK","image_link":"'.$url.'","thumb_link":"'.$url.'"}';
	}
}