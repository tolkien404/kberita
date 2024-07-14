<?php
	$id = $_GET['id'];
	
	$data = file_get_contents('../db/berita.json');
	$json = json_decode($data, true);
 
	//menghapus data sesuai id
	unset($json[$id]);
	
	//reindex array setelah data dihapus
	$reindex = array_values($json);
	
	$data = json_encode($reindex, JSON_PRETTY_PRINT);
	file_put_contents('../db/berita.json', $data);
 
	header('Location: inputdata.php');