<div class="card bg-white">
    <div class="card-body">
        <h1 class="mt-4">Buku</h1>
<div class="row">
<div class ="col_md_12">
    <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th width="6%">Kategori</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th width="10%">Cover buku</th>
            <th>Penerbit</th>
            <th width="10%">Tahun Terbit</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.kategoriID");
        while($data = mysqli_fetch_array($query)){
          ?>
              <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $data['NamaKategori']; ?></td>
              <td><?php echo $data['Judul']; ?></td>
              <td><?php echo $data['Penulis']; ?></td>
              <td style="width: 350px;">
                <img style="width:70px;height:100px" src="./assets/upload/<?= $data['cover'] ?>" alt=""></td>
              <td><?php echo $data['Penerbit']; ?></td>
              <td><?php echo $data['TahunTerbit']; ?></td>
              <td><?php echo $data['Deskripsi']; ?></td>
              <td class="d-flex gap-2">
                <a href="?page=buku_ubah&&id=<?php echo $data['buku_id']; ?>" class="btn btn-info">Ubah</a>
                <a href="?page=buku_hapus&id=<?php echo $data['buku_id']; ?>" class="btn btn-danger">Hapus</a>
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