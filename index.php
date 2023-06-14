<?php include_once __DIR__ . '/function.php'; ?>

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