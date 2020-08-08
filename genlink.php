<?php
$n=10; 
function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
    return $randomString; 
} 

$folder = "temp/".getName($n);
mkdir($folder);
$jsfolder = $folder."/js";
mkdir($jsfolder);

$filename = $folder."/";

$finalfile = $filename."result.php";
copy('result.php', $finalfile);

$finalfile = $filename."index.php";
copy('theme.php', $finalfile);

$jscopy = "js/location.js";
$finaljs = $filename."js/location.js";
copy($jscopy, $finaljs);

$respon = array();
$respon['getloc'] = $folder."/result.txt";
$respon['theme1'] = $folder;
$data = json_encode($respon);
echo $data;
?>