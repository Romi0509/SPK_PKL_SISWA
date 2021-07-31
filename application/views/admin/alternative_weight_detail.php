<!-- Begin Page Content -->
<div class="container-fluid">
    <input type="hidden" id="sum" value="<?= $sum_row ?>">
    <input type="hidden" id="subcriteria_id" value="<?= $subcrit ?>">

    <?= $this->session->flashdata('message'); ?>
    <?= $this->session->flashdata('success'); ?>

    <div class="card-body">
        <div class=" py-3">
            <a href="#" data-toggle="modal" data-target="#tambahalternatif" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-100">
                    Tambah
                </span> </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%">
                <thead>
                    <tr>
                        <td>Alternative</td>
                        <?php foreach ($th as $key) : ?>
                            <th><?= $key->name ?></th>
                        <?php endforeach; ?>
                        <th>action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahalternatif" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <label style="text-align: center;">Keterangan Pilihan Perbandingan</label>
                <div class="container-fluid">
                    <ul>
                        <li><b>1 = Sama pentingnya dibanding yang lain.</b></li>
                        <li><b>2 = Mendekati sedikit penting dibanding yang lain.</b></li>
                        <li><b>3 = Sedikit penting dibanding yang lain.</b></li>
                        <li><b>4 = Lebih sedikit penting dibanding yang lain.</b></li>
                        <li><b>5 = Cukup penting dibanding dengan yang lain.</b></li>
                        <li><b>6 = Mendekati sangat penting dibanding dengan yang lain.</b></li>
                        <li><b>7 = Sangat penting dibanding dengan yang lain.</b></li>
                        <li><b>8 = Mendekati ekstrim pentingnya dibanding dengan yang lain.</b></li>
                        <li><b>9 = Ekstrim pentingnya dibanding dengan yang lain.</b></li>
                    </ul>
                </div>

                <form role="form" action="<?= base_url('admin/weight/tambah_alternative') ?>" method="post">
                    <div class="modal-body">

                        <label>Masukkan Nilai Siswa:</label>
                        <div class="container-fluid">
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Komunikasi Data</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company1" name="company1" placeholder="Masukkan Nilai Komunikasi Data">
                                </div>
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Rangkaian Elektronik</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company2" name="company2" placeholder="Masukkan Nilai Rangkaian Elektronik">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Perekayasaan Sistem Kontrol</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company3" name="company3" placeholder="Masukkan Nilai Perekayasaan Sistem Kontrol">
                                </div>
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Sensor dan Aktuator</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company4" name="company4" placeholder="Masukkan Nilai Sensor dan Aktuator">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Gambar Teknik</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company5" name="company5" placeholder="Masukkan Nilai Gambr Teknik">
                                </div>
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Gambar Teknik</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company6" name="company6" placeholder="Masukkan Nilai Gambr Teknik">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label for="ExampleInputNama">Nilai Semester</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="company7" name="company7" placeholder="Masukkan Nilai Semester">
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

    <div class="card shadow mb-4">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">DATA ALTERNATIF</h6>
        </div>
        <div class="card-body">
            <form action="#" id="form_wcriteria">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Alternative</td>
                                <?php foreach ($th as $key) : ?>
                                    <th><?= $key->name ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id = 0;
                            foreach ($tr as $key) :
                                $id++; ?>
                                <tr>
                                    <td><?= $key->name; ?></td>
                                    <?php for ($i = 1; $i < $sum_row + 1; $i++) : ?>
                                        <?php if ($id < $i) : ?>
                                            <td>
                                                <select class="form-control inputweight kolom<?= $i ?>" name="<?= "x" . $i . "y" . $id ?>" id="<?= "x" . $i . "y" . $id ?>" data-id="<?= "x" . $id . "y" . $i ?>">
                                                    <?php
                                                    $name = "x" . $i . "y" . $id;
                                                    $idx = $this->session->userdata("user_logged")["id"];
                                                    $querys = 'SELECT comparison_list_id FROM tr_comparison_alternative WHERE user_id="' . $idx . '" AND form_name="' . $name . '"AND subcriteria_id="' . $subcrit . '"';
                                                    $queryss = $this->db->query($querys)->row();
                                                    $select = $queryss->comparison_list_id;
                                                    foreach ($cl as $key) :
                                                        if ($select == "") {
                                                            $sl = "";
                                                        } else {
                                                            if ($key->id == $select) {
                                                                $sl = "selected='selected'";
                                                            } else {
                                                                $sl = "";
                                                            }
                                                        }
                                                    ?>
                                                        <option value="<?= $key->id; ?>" <?= $sl; ?>><?= $key->weight; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                        <?php elseif ($id == $i) : ?>
                                            <td><input type="text" class="form-control kolom<?= $i ?>" id="<?= "x" . $i . "y" . $id  ?>" value="1" disabled></td>
                                        <?php else : ?>
                                            <td id="rValue">
                                                <input id="<?= "x" . $i . "y" . $id  ?>" class="form-control kolom<?= $i ?>" value="1" type="text" disabled>
                                            </td>
                                        <?php endif; ?>
                                    <?php endfor ?>
                                </tr>
                            <?php endforeach; ?>
                        <tfoot>
                            <tr>
                                <td>Jumlah</td>
                                <?php
                                for ($h = 1; $h <= $sum_row; $h++) {
                                ?>
                                    <td><input type="text" id="total<?= $h; ?>" class="form-control" value="" readonly /></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tfoot>

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <button type="submit" id="tombol_submit" class="btn btn-primary" name="action"><i class="fa fa-save"></i> Simpan</button>
    </form>
    <a class="btn btn-primary" style="color: #fff;" onclick="showmatrix()" style="margin-left: 2em;"><i class="fa fa-calculator"></i> Hitung</a>


    </a>
    <!-- Daftar Perhitungan matrik -->
    <div class="row py-4" id="matrikdiv" style="display:none;">
        <div class="col s12">
            <div class="card animated fadeInUp">
                <form action="#" id="form_wcriteria2">
                    <div class="card-content">
                        <h4 class="card-title">Hitung Bobot & Nilai Konsistensi</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <th>Kriteria</th>
                                    <?php foreach ($th as $key) : ?>
                                        <th><?= $key->name ?></th>
                                    <?php endforeach; ?>
                                    <th>Jumlah</th>
                                    <th>Bobot</th>
                                    <th>Nilai <br>Konsistensi</th>
                                </thead>
                                <tbody>
                                    <?php $id = 0;
                                    foreach ($tr as $key) :
                                        $id++; ?>
                                        <tr>
                                            <td><?= $key->name; ?></td>
                                            <?php for ($i = 1; $i < $sum_row + 1; $i++) : ?>
                                                <td>
                                                    <input id="<?= "n_x" . $i . "y" . $id  ?>" value="0" type="text" disabled>
                                                </td>
                                            <?php endfor; ?>
                                            <td>
                                                <input id="jumlah_<?= $id ?>" value="0" type="text" disabled>
                                            </td>
                                            <td>
                                                <input id="bobot_<?= $id ?>" data-criteriaid<?= $id ?>="<?= $key->id; ?>" value="0" type="text" disabled>
                                            </td>
                                            <td>
                                                <input id="kons_<?= $id ?>" value="0" type="text" disabled>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            </form>
        </div>

        <div class="col s12 py-4">
            <div class="card animated fadeInUp">
                <form action="#" id="form_wcriteria">
                    <div class="card-content">
                        <h4 class="card-title">Nilai Konsistensi</h4>
                        <p style="color: red;">Jika nilai CR kurang dari 0,1 maka perbandingan konsisten</p>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&lambda; maks</td>
                                        <td>
                                            <input id="lambda_maks" value="0" type="text" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CI</td>
                                        <td>
                                            <input id="ci" value="0" type="text" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IR(n = <?= $sum_row ?>)</td>
                                        <td>
                                            <input id="ir" value="0" type="text" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CR(CI/IR)</td>
                                        <td>
                                            <input id="cr" value="0" type="text" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <p id="ket"></p>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>