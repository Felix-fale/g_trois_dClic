<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TVA Calculator</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        Calculateur de TVA
                    </div>

                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="inputMontantSansTva" class="form-label">Montant</label>
                                <input type="number" class="form-control" id="inputMontantSansTva" name="montant_sans_tva">
                                <div id="emailHelp" class="form-text">La TVA est de 18%.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Calculer la TVA</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $base = "tva-calculator";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $base);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['montant_sans_tva'])) {
        $montant_sans_tva = $_POST['montant_sans_tva'];
        $tva = $montant_sans_tva * 0.18;
        $sql = "INSERT INTO tva (montant_ht, montant_tva)
        VALUES ($montant_sans_tva, $tva)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>