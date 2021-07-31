<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">DATA SISWA</h6>
        </div>
        <div class="card-body">
            <div class=" py-3">
                <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-100">
                        Tambah
                    </span> </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Username</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Username</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($user->result_array() as $k) :
                            $id = $k['id'];
                            $name = $k['name'];
                            $nisn = $k['nisn'];
                            $mapel1 = $k['komunikasi_data'];
                            $mapel2 = $k['rangkaian_elektronik'];
                            $mapel3 = $k['perekayasaan_sistem_kontrol'];
                            $mapel4 = $k['sensor_aktuator'];
                            $mapel5 = $k['gambar_teknik'];
                            $mapel6 = $k['komunikasi'];
                            $mapel7 = $k['etika'];
                            $mapel8 = $k['nilai_semester'];

                        ?>

                            <tr>
                                <td><?= $name; ?></td>
                                <td><?= $nisn; ?></td>
                                <td><a data-toggle="modal" data-target="#update<?= $id ?>" class="btn btn-primary" href="#"><i class="button"><span class="icon text-white-100">Edit</span> </a> | <a data-toggle="modal" data-target="#delete<?= $id ?>" class="btn btn-danger" href="#"><i class="button"><span class="icon text-white-100">Hapus</span> </a> </td>
                            </tr>

                            <div class="modal fade" id="update<?= $id ?>" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Siswa</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form role="form" action="<?= base_url('admin/user/update_user') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">Nama Siswa</label>
                                                    <input type="text" value="<?= $name ?>" class="form-control" id="name" name="name" placeholder="Masukkan Nama Siswa">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ExampleInputNama">NISN</label>
                                                    <input type="text" value="<?= $nisn ?>" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                                                </div>
                                                <label>Masukkan Nilai Siswa:</label>
                                                <div class="container-fluid">
                                                    <div class="row py-2">
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Komunikasi Data</label>
                                                            <input type="text" value="<?= $mapel1 ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="komunikasi_data" name="komunikasi_data" placeholder="Masukkan Nilai Komunikasi Data">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Rangkaian Elektronik</label>
                                                            <input type="text" value="<?= $mapel2 ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="rangkaian_elektronik" name="rangkaian_elektronik" placeholder="Masukkan Nilai Rangkaian Elektronik">
                                                        </div>
                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Perekayasaan Sistem Kontrol</label>
                                                            <input type="text" value="<?= $mapel3 ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="perekayasaan_sistem_kontrol" name="perekayasaan_sistem_kontrol" placeholder="Masukkan Nilai Perekayasaan Sistem Kontrol">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Sensor dan Aktuator</label>
                                                            <input type="text" value="<?= $mapel4 ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="sensor_aktuator" name="sensor_aktuator" placeholder="Masukkan Nilai Sensor dan Aktuator">
                                                        </div>
                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Gambar Teknik</label>
                                                            <input type="text" value="<?= $mapel5 ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="gambar_teknik" name="gambar_teknik" placeholder="Masukkan Nilai Gambr Teknik">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Komunikasi</label>
                                                            <select class="form-control" name="komunikasi">
                                                                <option>Pilih :</option>
                                                                <option value="kurang" <?= $mapel7 == "kurang" ? "selected" : "" ?>>Kurang</option>
                                                                <option value="cukup" <?= $mapel7 == "cukup" ? "selected" : "" ?>>Cukup</option>
                                                                <option value="baik" <?= $mapel7 == "baik" ? "selected" : "" ?>>Baik</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Etika</label>
                                                            <select class="form-control" name="etika">
                                                                <option>Pilih :</option>
                                                                <option value="kurang" <?= $mapel7 == "kurang" ? "selected" : "" ?>>Kurang</option>
                                                                <option value="cukup" <?= $mapel7 == "cukup" ? "selected" : "" ?>>Cukup</option>
                                                                <option value="baik" <?= $mapel7 == "baik" ? "selected" : "" ?>>Baik</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="ExampleInputNama">Nilai Semester</label>
                                                            <input type="text" value="<?= $mapel8 ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="nilai_semester" name="nilai_semester" placeholder="Masukkan Nilai Semester">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="btn"><i class="fa fa-save"></i> Simpan</button>
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete<?= $id ?>" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Kategori</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">Jika anda menghapus kategori ini akan menyebabkan hilangnya data pada transaksi yang lain.!!! Apakah anda yakin mau menghapus?

                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="<?= base_url(); ?>admin/user/delete_user/<?= $id ?>"><i class="button"><span class="icon text-white-100">Hapus</span> </a>
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
<div class="modal fade" id="tambahuser" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Siswa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" action="<?= base_url('admin/user/tambah_user') ?>" method="post">
                <div class="modal-body">
                    <span style="color: red;">Untuk NISN dan Password lebih baik di isi sama untuk memudahkan mengisi data</span>
                    <div class="form-group">
                        <label for="ExampleInputNama">Nama Siswa</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="ExampleInputNama">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                    </div>
                    <label>Masukkan Nilai Siswa:</label>
                    <div class="container-fluid">
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Komunikasi Data</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="komunikasi_data" name="komunikasi_data" placeholder="Masukkan Nilai Komunikasi Data">
                            </div>
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Rangkaian Elektronik</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="rangkaian_elektronik" name="rangkaian_elektronik" placeholder="Masukkan Nilai Rangkaian Elektronik">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Perekayasaan Sistem Kontrol</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="perekayasaan_sistem_kontrol" name="perekayasaan_sistem_kontrol" placeholder="Masukkan Nilai Perekayasaan Sistem Kontrol">
                            </div>
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Sensor dan Aktuator</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="sensor_aktuator" name="sensor_aktuator" placeholder="Masukkan Nilai Sensor dan Aktuator">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Gambar Teknik</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="gambar_teknik" name="gambar_teknik" placeholder="Masukkan Nilai Gambr Teknik">
                            </div>
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Komunikasi</label>
                                <select class="form-control" name="komunikasi">
                                    <option>Pilih :</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="baik">Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Etika</label>
                                <select class="form-control" name="etika">
                                    <option>Pilih :</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="baik">Baik</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="ExampleInputNama">Nilai Semester</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="nilai_semester" name="nilai_semester" placeholder="Masukkan Nilai Semester">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="nilai"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
                </div>
        </div>
        </form>
    </div>
</div>