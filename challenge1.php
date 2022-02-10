<?php 
echo "Hello, World! \n" ;

$adn = readline("Ingrese ADN: ");
$search = array('G', 'C', 'T', 'A');
$replace = array('c', 'g', 'a', 'u');

echo str_replace($search , $replace, $adn) , "\n";

$card = readline("Ingrese numero de tarjeta: ");
$cardLength = strlen($card);
$verificator = $card[$cardLength - 1];
$sum =0;
$parity = ($cardLength - 2)%2;
for($i = $cardLength - 2 ; $i >= 0 ; $i--){
    $digit = (int)$card[$i];

    if($i%2 == $parity){
        $digit *= 2; 
    }
    if($digit > 9){
        $digit = $digit-9;
    }

    $sum += $digit;
}
$checksum = (10 - $sum % 10) % 10;
// if($checksum == $verificator){
//     echo "true";
// }else{
//     echo "false";
// }
echo var_export($checksum == $verificator), "\n";

$psswd = str_replace( " ", "", readline("ingrese contraseña: ") );
$psswdLength = strlen($psswd);
$psswdOnlyNum = preg_replace( "/\D/", "", $psswd);

$psswdOnlyNumLength = strlen($psswdOnlyNum);

echo "La contraseña tiene solo numeros:  " , var_export($psswdLength > 1 && $psswdOnlyNumLength == $psswdLength), "\n";

$psswdNoExtraChars= preg_replace( "/[^a-zA-Z0-9\s]/", "", $psswd);
$psswdNoExtraCharsLength = strlen($psswdNoExtraChars);

echo "La contraseña tiene solo numeros y letras:  ", var_export($psswdLength > 1 && $psswdNoExtraCharsLength == $psswdLength), "\n";


?>



