<?php 

$conn = mysqli_connect('localhost', 'root', '', 'crud_php');

$query = "SELECT * FROM siswa ORDER BY NISN";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | READ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="container w-75">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><strong>Data Siswa <a href="tambah.php"><button class="btn btn-success">Tambah</button></a></strong></div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; foreach($result as $row) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['NISN'] ?></td>
                                        <td><?= $row['Nama'] ?></td>
                                        <td><?= $row['Jurusan'] ?></td>
                                        <td><?= $row['Alamat'] ?></td>
                                        <td>
                                            <a href="edit.php?nisn=<?= $row['NISN']?>"><button class="btn btn-warning">Edit</button></a>
                                            <a href="delete.php?nisn=<?= $row['NISN']?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data siswa dengan NISN : <?= $row['NISN'] ?>')">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>