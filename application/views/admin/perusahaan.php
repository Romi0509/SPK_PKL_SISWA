<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">TABEL KATEGORI</h1> -->
    <!-- <p class="mb-4"></a>.</p> -->

    <!-- DataTales Example -->
    <?= $this->session->flashdata('success'); ?>


    <div class="card shadow mb-4">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">DATA PERUSAHAAN</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Kota</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Kota</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($perusahaan->result_array() as $k) :
                            $id = $k['id'];
                            $nama_perusahaan = $k['name'];
                            $address = $k['address'];
                            $city = $k['city'];

                        ?>

                            <tr>
                                <td><?= $nama_perusahaan; ?></td>
                                <td><?= $address; ?></td>
                                <td><?= $city; ?></td>

                            </tr>

                            <div class="modal fade" id="update<?= $id ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Perusahaan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form role="form" action="<?= base_url('admin/perusahaan/update_perusahaan') ?>" method="post">
                                            <input type="hidden" name="id_perusahaan" value="<?= $id ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">Nama Perusahaan</label>
                                                    <input type="text" value="<?= $nama_perusahaan ?>" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">Alamat</label>
                                                    <input type="text" value="<?= $address ?>" class="form-control" id="address" name="address" placeholder="Masukkan Alamat">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">city</label>
                                                    <input type="text" value="<?= $city ?>" class="form-control" id="city" name="city" placeholder="Masukkan city">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="btn"><i class="fa fa-save"></i> Simpan</button>
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal fade" id="delete<?= $id ?>" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Perusahaan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">Jika anda menghapus kategori ini akan menyebabkan hilangnya data pada transaksi yang lain.!!! Apakah anda yakin mau menghapus?

                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="<?= base_url(); ?>admin/perusahaan/delete_perusahaan/<?= $id ?>"><i class="button"><span class="icon text-white-100">Hapus</span> </a>
                                        </div>


                                    </div>
                                <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" action="<?= base_url('admin/perusahaan/tambah_perusahaan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ExampleInputNama">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="ExampleInputNama">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="ExampleInputNama">city</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Masukkan city">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" nama_perusahaan="btn"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
                </div>
        </div>
        </form>
    </div>
</div>