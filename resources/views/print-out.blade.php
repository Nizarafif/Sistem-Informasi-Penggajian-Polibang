<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print out Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body onload="window.print()">

    <div class="container">
        <hr>
        <div class="text-center">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <img src="{{ asset('assets/img/logo2.png') }}" alt="Logo" width="120px">
                <h1 class="text-success">POLITEKNIK BALEKAMBANG JEPARA</h1>
            </div>
        </div>
        <hr>
        
        <div class="mt-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>{{ $siswas->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jabatan</th>
                        <td>{{ $siswas->kelas_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">No Telepon</th>
                        <td>{{ $siswas->telp }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>{{ $siswas->alamat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Gaji Mengajar / Pokok</th>
                        <td>{{ number_format($siswas->gaji_mengajar, 2, ",", ".") }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <hr>
        
        <div class="mt-4 d-flex flex-column align-items-end">
            <table class="table table-bordered w-50">
                <tbody>
                    <tr>
                        <th scope="row">Gaji Pokok</th>
                        <td>{{ $siswas->gaji_mengajar }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tunjangan</th>
                        <td>{{ $siswas->gaji_tunjangan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Lain Lain</th>
                        <td>{{ $siswas->lain_lain }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Sub Total</th>
                        <td>{{ $siswas->gaji_mengajar + $siswas->gaji_tunjangan + $siswas->lain_lain }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <hr>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    
</body>

</html>
