<?php
require_once '../lib/lib.php';



header('Content-type: application/json; charset=utf-8');
$result = array();
$mf = \ITTI\FW::getManagedFiles();


if ($_POST['action']=='info') { // Handling ajax File Info Service

	foreach (explode(',', $_POST['ids']) as $id) {
		$result["$id"] = $mf->getFileInfoById($id);
		unset($result["$id"]['path']);
	}

} else if(isset($_FILES['files'])) { // Handling File and Image Uploads

	if(isset($_POST['options'])){
		parse_str($_POST['options'], $options);
		$options['image'] = ($options['image']=="true");
		if(!is_array($options['sizes'])) $options['sizes'] = array();
	} else {
		$options = array(
			'sizes'=>array(),
			'image'=>false,
		);
	}

	try {
		$result['fileinfo'] = $mf->uploadFile($_FILES['files'], $options);
		unset($result['fileinfo']['path']);
	} catch (\Exception $e) {
		$result['message'] = $e->getMessage();
	}
}

echo json_encode($result);
