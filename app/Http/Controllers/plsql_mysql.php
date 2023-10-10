<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Akar Kuadrat</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Kalkulator Akar Kuadrat</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="p_number">Masukkan Angka:</label>
                        <input type="text" class="form-control" id="p_number" name="p_number" required pattern="[0-9]+" title="Masukkan angka positif">
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung Akar Kuadrat</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputNumber = isset($_POST['p_number']) ? floatval($_POST['p_number']) : null;

            if ($inputNumber !== null) {
                try {
                    // Lakukan koneksi ke MySQL 
                    $host = 'localhost';
                    $dbname = 'bilangan_kuadrat';
                    $username = 'root';
                    $password = '';

                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Panggil prosedur PL/SQL 
                    $stmt = $conn->prepare('CALL  Calculate_Square_Root(:p_number, @p_result)');
                    $stmt->bindParam(':p_number', $inputNumber, PDO::PARAM_INT);
                    $stmt->execute();

                    $stmt->closeCursor();

                    // Ambil hasil dari variabel MySQL
                    $resultStmt = $conn->query("SELECT @p_result as result");
                    $result = $resultStmt->fetch(PDO::FETCH_ASSOC)['result'];

                    // Print Hasil
                    echo '<div class="mt-3 text-center">';
                    echo '<h4>Akar kuadrat dari ' . $inputNumber . ' adalah ' . $result . '</h4>';
                    echo '</div>';

                    echo '<script>';
                    echo 'document.getElementById("p_number").value = ' . $inputNumber . ';';
                    echo '</script>';
                } catch (PDOException $e) {
                    echo '<div class="mt-3 alert alert-danger text-center">Error: ' . $e->getMessage() . '</div>';
                }
            } else {
                echo '<div class="mt-3 alert alert-warning text-center">Silakan masukkan angka yang valid.</div>';
            }
        }
        ?>
    </div>
    <!-- Tambahkan script JS Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
