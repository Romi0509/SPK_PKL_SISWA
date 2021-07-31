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
            <h6 class="m-0 font-weight-bold text-white">DATA SUB KRITERIA</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama SubKriteria</th>
                            <th>Nama Kriteria</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama SubKriteria</th>
                            <th>Nama Kriteria</th>


                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($subkriteria->result_array() as $k) :
                            $id = $k['id'];
                            $name = $k['name'];
                            $id_criteria = $k['criterianame'];
                        ?>

                            <tr>
                                <td><?= $name; ?></td>
                                <td><?= $id_criteria; ?></td>


                            </tr>

                            <!-- <div class="modal fade" id="update<?= $id ?>" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Sub Kriteria</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form role="form" action="<?= base_url('admin/subkriteria/update_sub_kriteria') ?>" method="post">
                                            <input type="hidden" name="id_subkriteria" value="<?= $id ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">Nama Subkriteria</label>
                                                    <input type="text" value="<?= $nama_subkriteria ?>" class="form-control" id="nama_subkriteria" name="nama_subkriteria" placeholder="Masukkan Nama SubKriteria">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="btn"><i class="fa fa-save"></i> Simpan</button>
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div> -->

                            <div class="modal fade" id="delete<?= $id ?>" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Sub Kriteria</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">Jika anda menghapus kategori ini akan menyebabkan hilangnya data pada transaksi yang lain.!!! Apakah anda yakin mau menghapus?

                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="<?= base_url(); ?>admin/subkriteria/delete_sub_kriteria/<?= $id ?>"><i class="button"><span class="icon text-white-100">Hapus</span> </a>
                                        </div>


                                    </div>
                                <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- <div class="modal fade" id="tambahsubkriteria" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Sub Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" action="<?= base_url('admin/subkriteria/tambah_sub_kriteria') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ExampleInputNama">Nama Sub Kriteria</label>
                        <input type="text" class="form-control" id="nama_subkriteria" name="nam" placeholder="Masukkan Nama Sub Kriteria">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btn"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
                </div>
        </div>
        </form>
    </div>
</div> -->