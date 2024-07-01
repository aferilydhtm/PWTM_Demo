<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <a href="form_mahasiswa.php">Tambah Data</a>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Mahasiswa</th>
            <th>Fakultas</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'db_koneksi.php';
        $sql = "SELECT prodi.id, prodi.nama_mahasiswa, fakultas.nama_fakultas 
                FROM prodi 
                INNER JOIN fakultas ON prodi.fakultas_id = fakultas.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nama_mahasiswa"] . "</td>
                        <td>" . $row["nama_fakultas"] . "</td>
                        <td>
                            <a href='form_mahasiswa.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "' onclick='return confirmDelete()'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
