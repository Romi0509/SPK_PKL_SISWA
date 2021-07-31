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
            <h6 class="m-0 font-weight-bold text-white">DATA KRITERIA</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kriteria</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Kriteria</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($kriteria->result_array() as $k) :
                            $id = $k['id'];
                            $name = $k['name'];
                        ?>

                            <tr>
                                <td><?= $name; ?></td>

                            </tr>

                            <div class="modal fade" id="update<?= $id ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Kriteria</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form role="form" action="<?= base_url('admin/kriteria/update_kriteria') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">Nama Kategori</label>
                                                    <input type="text" value="<?= $name ?>" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kriteria">
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
                                            <h4 class="modal-title">Delete Kriteria</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">Jika anda menghapus kategori ini akan menyebabkan hilangnya data pada transaksi yang lain.!!! Apakah anda yakin mau menghapus?

                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="<?= base_url(); ?>admin/kriteria/delete_kriteria/<?= $id ?>"><i class="button"><span class="icon text-white-100">Hapus</span> </a>
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
<div class="modal fade" id="tambahkriteria" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" action="<?= base_url('admin/kriteria/tambah_kriteria') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ExampleInputNama">Nama Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kriteria">
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