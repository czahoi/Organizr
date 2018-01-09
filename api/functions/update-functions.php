<?php


// Upgrade the installation
function upgradeInstall($branch = 'v2-master', $stage) {
    $url = 'https://github.com/causefx/Organizr/archive/'.$branch.'.zip';
    $file = "upgrade.zip";
    $source = dirname(__DIR__,2).DIRECTORY_SEPARATOR.'upgrade'.DIRECTORY_SEPARATOR.'Organizr-'.str_replace('v2','2',$branch).DIRECTORY_SEPARATOR;
    $cleanup = dirname(__DIR__,2) .DIRECTORY_SEPARATOR."upgrade".DIRECTORY_SEPARATOR;
    $destination = dirname(__DIR__,2).DIRECTORY_SEPARATOR;
	switch ($stage) {
		case '1':
			return 'stage1';
			writeLog('success', 'Update Function -  Started Upgrade Process', $GLOBALS['organizrUser']['username']);
			if(downloadFile($url, $file)){
				writeLog('success', 'Update Function -  Downloaded Update File for Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return true;
			}else{
				writeLog('error', 'Update Function -  Downloaded Update File Failed  for Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return false;
			}
			break;
		case '2':
			return 'stage2';
			if(unzipFile($file)){
				writeLog('success', 'Update Function -  Unzipped Update File for Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return true;
			}else{
				writeLog('error', 'Update Function -  Unzip Failed for Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return false;
			}
			break;
		case '3':
			return 'stage3';
			if(rcopy($source, $destination)){
				writeLog('success', 'Update Function -  Overwrited Files using Updated Files from Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return true;
			}else{
				writeLog('error', 'Update Function -  Overwrite Failed for Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return false;
			}
			break;
		case '4':
			return 'stage4';
			if(rrmdir($cleanup)){
				writeLog('success', 'Update Function -  Deleted Update Files from Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				writeLog('success', 'Update Function -  Update Completed', $GLOBALS['organizrUser']['username']);
				return true;
			}else{
				writeLog('error', 'Update Function -  Removal of Update Files Failed for Branch: '.$branch, $GLOBALS['organizrUser']['username']);
				return false;
			}
			break;
		default:
			# code...
			break;
	}
	return false;
}
function downloadFile($url, $path){
	ini_set('max_execution_time',0);
	$folderPath = "upgrade".DIRECTORY_SEPARATOR;
	if(!mkdir($folderPath)){
		//writeLog("error", "organizr could not create upgrade folder");
	}
	$newfname = $folderPath . $path;
	$file = fopen ($url, 'rb');
	if ($file) {
		$newf = fopen ($newfname, 'wb');
		if ($newf) {
			while(!feof($file)) {
				fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
			}
		}
	}else{
		//writeLog("error", "organizr could not download $url");
	}

	if ($file) {
		fclose($file);
		//writeLog("success", "organizr finished downloading the github zip file");
	}else{
		//writeLog("error", "organizr could not download the github zip file");
	}

	if ($newf) {
		fclose($newf);
		//writeLog("success", "organizr created upgrade zip file from github zip file");
	}else{
		//writeLog("error", "organizr could not create upgrade zip file from github zip file");
	}
	return true;
}
function unzipFile($zipFile){
	$zip = new ZipArchive;
	$extractPath = "upgrade/";
	if($zip->open($extractPath . $zipFile) != "true"){
		//writeLog("error", "organizr could not unzip upgrade.zip");
	}else{
		//writeLog("success", "organizr unzipped upgrade.zip");
	}
	/* Extract Zip File */
	$zip->extractTo($extractPath);
	$zip->close();
	return true;
}
// Function to remove folders and files
function rrmdir($dir) {
	if (is_dir($dir)) {
		$files = scandir($dir);
		foreach ($files as $file)
			if ($file != "." && $file != "..") rrmdir("$dir/$file");
		rmdir($dir);
	}
	else if (file_exists($dir)) unlink($dir);
	return true;
}
// Function to Copy folders and files
function rcopy($src, $dst) {
	if (is_dir ( $src )) {
		if (!file_exists($dst)) : mkdir ( $dst ); endif;
		$files = scandir ( $src );
		foreach ( $files as $file )
			if ($file != "." && $file != "..")
				rcopy ( "$src/$file", "$dst/$file" );
	} else if (file_exists ( $src ))
		copy ( $src, $dst );
	return true;
}
