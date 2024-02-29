<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE Peminjaman_id=$id");
?>
<script>
    alert('haapus data berhasil');
    location.href = "index.php?page=peminjaman";
</script>