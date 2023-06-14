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

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Password Generator</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body>
    <div class="container">
        <h1 class="p-3">Password Generator</h1>
        <form action="index.php" method="GET">
            <div class="py-3">
                <label for="password-length" class="form-label">Password Length</label>
                <input type="number" value="<?php echo $password_length; ?>" name="password-length" class="form-control" id="password-length" min="8" max="24">
            </div>
            <h3 class="p-3">Scegli i caratteri</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="characters[]" value="a">
                <label class="form-check-label" for="flexCheckDefault">
                    <span>Lettere Maiuscole</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="characters[]" value="b">
                <label class="form-check-label" for="flexCheckChecked">
                    <span>Lettere Minuscole</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="characters[]" value="c">
                <label class="form-check-label" for="flexCheckChecked">
                    <span>Numeri</span>
                </label>
            </div>
             <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="characters[]" value="d">
                <label class="form-check-label" for="flexCheckChecked">
                    <span>Caratteri Speciali</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary m-3">Genera</button>
        </form>

        <div class="container">
            <h2>Password</h2>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['password']; ?>
            </div>
        </div>
    </div>
    </body>
</html>