<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kategori WHERE KategoriID=$id");
?>
<script>
    alert('haapus data berhasil');
    location.href = "index.php?page=kategori";
</script>