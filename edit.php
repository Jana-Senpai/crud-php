<?php 

$conn = mysqli_connect('localhost', 'root', '', 'crud_php');

if(isset($_GET['nisn'])){
    $nisn = $_GET['nisn'];

    $query = "SELECT * FROM siswa WHERE NISN = '$nisn'";
    $result = mysqli_query($conn, $query);
    $update = mysqli_fetch_assoc($result);

    $nisn = $update['NISN'];
    $nama = $update['Nama'];
    $jurusan = $update['Jurusan'];
    $alamat = $update['Alamat'];
}

// cek tombol
if(isset($_POST['submit'])){
    $nisn = $_POST['NISN'];
    $nama = $_POST['Nama'];
    $jurusan = $_POST['Jurusan'];
    $alamat = $_POST['Alamat'];

    if($nisn && $nama && $jurusan && $alamat){
        $query = "UPDATE siswa SET NISN = '$nisn', Nama = '$nama', Jurusan = '$jurusan', Alamat = '$alamat' WHERE NISN = '$nisn'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            header("Location: index.php");
            exit;
        } else {
            $error = "Data gagal ditambahkan.";
        }
    } else {
        $error = "Silahkan isi form terlebih dahulu.";
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | UPDATE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>


    <div class="container w-50">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">Tambah Data Siswa</div>
                    <div class="card-body">
                        <?php if(isset($error)) : ?>
                            <div class="alert alert-danger">
                                <?= $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="mb-3 row">
                                <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-8">
                                    <input type="text" name="NISN" class="form-control" id="NISN" value="<?= $nisn ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Nama" class="form-control" id="Nama" value="<?= $nama ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Jurusan" class="form-control" id="Jurusan" value="<?= $jurusan ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Alamat" class="form-control" id="Alamat" value="<?= $alamat ?>">
                                </div>
                            </div>
                            <div class="mb-3 row ">
                                <div class="offset-md-8 col-md-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>