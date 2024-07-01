<!DOCTYPE html>
<html>
<head>
    <title>Formulir Mahasiswa</title>
</head>
<body>
    <h2>Formulir Mahasiswa</h2>
    <?php
    include 'db_koneksi.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $nama_mahasiswa = '';
    $fakultas_id = '';

    if (!empty($id)) {
        $sql = "SELECT * FROM prodi WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama_mahasiswa = $row['nama_mahasiswa'];
            $fakultas_id = $row['fakultas_id'];
        }
    }
    ?>

    <form action="process.php" method="post">
        <label for="nama_mahasiswa">Nama Mahasiswa:</label>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="<?php echo htmlspecialchars($nama_mahasiswa); ?>" required><br><br>
        <label for="fakultas_id">Fakultas:</label>
        <select id="fakultas_id" name="fakultas_id">
            <?php
            $sql = "SELECT id, nama_fakultas FROM fakultas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $selected = ($row["id"] == $fakultas_id) ? 'selected' : '';
                    echo "<option value='" . $row["id"] . "' $selected>" . $row["nama_fakultas"] . "</option>";
                }
            } else {
                echo "<option value=''>Tidak ada fakultas</option>";
            }
            $conn->close();
            ?>
        </select><br><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="action" value="<?php echo empty($id) ? 'Insert' : 'Update'; ?>">
    </form>
</body>
</html>
