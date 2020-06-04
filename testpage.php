<?php

include 'conn.php';

$page = '4321';

$strangeEnc = encrypt_decrypt('encrypt', $page);
$strange = encrypt_decrypt('decrypt', $strangeEnc);

echo $strangeEnc;
echo $strange;


$sql = mysqli_query($conn, "SELECT * FROM users");

while ($fetch = mysqli_fetch_assoc($sql)) {
	$result = $fetch['control_no'];
	// echo encrypt_decrypt('encrypt', $result) . "<br>";
}

function encrypt_decrypt($action, $string){
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'radin pogi';
	$secret_iv = "marissa ng buhay ko";
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if ($action == 'encrypt') {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	}else if ($action == 'decrypt') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}

	return $output;
}

// echo $page;
// echo $strange;
// echo $strangeEnc;

// echo "<br>";
// echo 'dhhhvjbtd1i1l3j3avkyn0nkdgfqqt09';


?>