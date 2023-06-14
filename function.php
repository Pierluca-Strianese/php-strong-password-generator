<?php

$password = '';
$password_length = isset($_GET['password-length']) ? $_GET['password-length'] : 0;
$characters = isset($_GET['characters']) ? $_GET['characters'] : [];

if(!empty($password_length)){

    $password = generatePassword($password_length, $characters);
    $_SESSION['password'] = $password;
}

function generatePassword($length, $characters){

    var_dump($characters);
    
    $password = '';
    
    $lettere_minuscole = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    $lettere_maiuscole = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    $numeri = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    $caratteri_speciali = ["!","@", "#", "$", "%", "^", "&", "*", "-", "+", "/", "?"];
    
    
    if(count($characters) === 0){
    $range_caratteri = array_merge($lettere_minuscole, $lettere_maiuscole, $numeri, $caratteri_speciali);
    } else {
    
        $temp_array = [];
    
        if(in_array('a', $characters)){
            $temp_array = array_merge($temp_array, $lettere_maiuscole);
        }
    
        if(in_array('b', $characters)){
            $temp_array = array_merge($temp_array, $lettere_minuscole);
        }
    
        if(in_array('c', $characters)){
            $temp_array = array_merge($temp_array, $numeri);
        }
    
        if(in_array('d', $characters)){
            $temp_array = array_merge($temp_array, $caratteri_speciali);
        }
    
        $range_caratteri = $temp_array;
    }
    
    while(strlen($password) < $length){
        $random = rand(0, count($range_caratteri)-1);
        $char = $range_caratteri[$random];
    
        if(!str_contains($password, $char)){
            $password .= $char;
        }
    }
 
    return $password;
}