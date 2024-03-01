<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM koleksi_pribadi WHERE koleksi_id=$id");
?>
<script>
  alert('haapus data berhasil');
  location.href = "index.php?page=koleksi&id=<?= $_SESSION["user"]["user_id"]; ?>";
</script>