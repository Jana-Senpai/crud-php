<?php 
$conn = mysqli_connect('localhost', 'root', '', 'crud_php');

if(isset($_GET['nisn'])){
    $nisn = $_GET['nisn'];
    $query = "DELETE FROM siswa WHERE NISN = '$nisn'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: index.php");
        exit;
    }
}

?>