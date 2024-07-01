<?php
include 'db_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $nama_mahasiswa = $_POST["nama_mahasiswa"];
    $fakultas_id = $_POST["fakultas_id"];
    $id = $_POST["id"];

    if ($action == "Insert") {
        $sql = "INSERT INTO prodi (nama_mahasiswa, fakultas_id) VALUES ('$nama_mahasiswa', '$fakultas_id')";
    } elseif ($action == "Update") {
        $sql = "UPDATE prodi SET nama_mahasiswa='$nama_mahasiswa', fakultas_id='$fakultas_id' WHERE id=$id";
    } elseif ($action == "Delete") {
        $sql = "DELETE FROM prodi WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record $action successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
