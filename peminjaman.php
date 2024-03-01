<div class="card bg-white">
    <div class="card-body">
        <h1 class="mt-4 text-center">Peminjaman Buku</h1>
        <div class="row">
            <div class="col_md_12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> tambah peminjaman</a>
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>user</th>
                        <th>buku</th>
                        <th>tanggal peminjaman</th>
                        <th>tanggal pengembalian</th>
                        <th>status peminjaman</th>
                        <th>aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user on user.user_id = peminjaman.user_id LEFT JOIN buku on buku.buku_id = peminjaman.buku_id WHERE peminjaman.user_id=" . $_SESSION['user']['user_id']);
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['namalengkap']; ?></td>
                            <td><?php echo $data['Judul']; ?></td>
                            <td><?php echo $data['Tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['Tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['Status_peminjaman']; ?></td>
                            <td>
                                <a href="?page=peminjaman_ubah&&id=<?php echo $data['Peminjaman_id']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('apakah anda yakin menghapus data ini??')" href="?page=peminjaman_hapus&&id=<?php echo $data['Peminjaman_id']; ?>" class="btn btn-danger">Hapus</a>
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