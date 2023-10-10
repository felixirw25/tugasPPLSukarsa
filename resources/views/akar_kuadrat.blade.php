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
            <div class="col-md-10">
                <form action="{{ route('hitungAkarKuadrat') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="p_number">Masukkan Angka:</label>
                        <input type="text" class="form-control" id="p_number" name="p_number" required pattern="[0-9]+" title="Masukkan angka positif">
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung Akar Kuadrat</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <center><h2>Log Akar Kuadrat</h2></center>
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th scope="col">Angka</th>
                            <th scope="col">Akar Kuadrat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($angkas as $angka)
                        <tr>
                            <td align="center">{{ $angka->angka }}</td>
                            <td align="center">{{ $angka->akar_kuadrat }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Tambahkan script JS Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
