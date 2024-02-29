<div class="card bg-white">
    <div class="card-body">
        <h1 class="mt-4">ulasan Buku</h1>
<div class="row">
<div class ="col_md_12">
    <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>user</th>
            <th>buku</th>
            <th>ulasan</th>
            <th>rating</th>
            <th>aksi</th>
        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN   user on user.user_id = ulasan.user_id LEFT JOIN buku on buku.buku_id = ulasan.buku_id");
        while($data = mysqli_fetch_array($query)){
          ?>
              <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $data['namalengkap']; ?></td>
              <td><?php echo $data['Judul']; ?></td>
              <td><?php echo $data['ulasan']; ?></td>
              <td><?php echo $data['rating']; ?></td>
              <td>
                <a href="?page=ulasan_ubah&&id=<?php echo $data['ulasan_id']; ?>" class="btn btn-info">Ubah</a>
                <a onclick="return confirm('apakah anda yakin menghapus data ini??')" href="?page=ulasan_hapus&&id=<?php echo $data['ulasan_id']; ?>" class="btn btn-danger">Hapus</a>
              </td>
              </tr>
              <?php
        }
        ?>
    </table>
</div>
</div>
    </div>
</div>