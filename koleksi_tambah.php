<h1 class="mt-4">tambah koleksi Buku</h1>
<div class="card bg-white">
  <div class="card-body">
    <div class="row">
      <div class="col_md_12">
        <form method="post">
          <?php
          if (isset($_POST['submit'])) {
            $user_id = $_SESSION['user']['user_id'];
            $buku_id = $_POST['buku_id'];
            $query = mysqli_query($koneksi, "INSERT INTO koleksi_pribadi(user_id, buku_id)values('$user_id','$buku_id')");

            if ($query) {
              echo '<scrip>alert("Tambah Data Berhasil.");</scriipt>';
            } else {
              echo '<scrip>alert("Tambah Data Gagal.");</scriipt>';
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2">buku</div>
            <div class="col-md-8">
              <select name="buku_id" class="form-control">
                <?php
                $buk = mysqli_query($koneksi, "SELECT*FROM buku");

                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option value="<?php echo $buku['buku_id']; ?>"><?php echo $buku['Judul']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-2">Mau ditambah ke koleksi?</div>
        <div class="col-md-8">
          <button name="submit" class="btn btn-primary">Tambah</button>
        </div>
        <div class="row">
          <div class="col-md-1">
            <a href="?page=koleksi&id=<?= $_SESSION["user"]["user_id"]; ?>" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>