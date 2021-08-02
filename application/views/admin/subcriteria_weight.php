<!-- Begin Page Content -->


<div class="container-fluid">
    <input type="hidden" id="sum" value="<?= $sum_row ?>">

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow h-100 py-2 px-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Keterangan Pilihan Perbandingan</div>
                        <ul>
                            <li><b>1 = Sama pentingnya dibanding yang lain.</b></li>
                            <li> <b>2 = Mendekati sedikit penting dibanding yang lain.</b></li>
                            <li><b>3 = Sedikit penting dibanding yang lain.</b></li>
                            <li><b>4 = Lebih sedikit penting dibanding yang lain.</b></li>
                            <li><b>5 = Cukup penting dibanding dengan yang lain.</b></li>
                            <li><b>6 = Mendekati sangat penting dibanding dengan yang lain.</b></li>
                            <li><b>7 = Sangat penting dibanding dengan yang lain.</b></li>
                            <li><b>8 = Mendekati ekstrim pentingnya dibanding dengan yang lain.</b></li>
                            <li><b>9 = Ekstrim pentingnya dibanding dengan yang lain.</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-6 col-md-6 mb-4 py-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Nilai</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <ul>
                            <li><b>1 = Nilai dari 0 > 60</b></li>
                            <li><b>2 = Nilai dari 61 > 70</b></li>
                            <li><b>3 = Nilai dari 71 > 80</b></li>
                            <li><b>4 = Nilai dari 81 > 90</b></li>
                            <li><b>5 = Nilai dari 91 > 100</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4 py-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Kepribadian</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <ul>
                            <li><b>1 = Kurang</b></li>
                            <li><b>2 = Cukup</b></li>
                            <li><b>3 = Baik</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <form action="" method="post">
            <div class="col-xl-12">
                <label for="ExampleInputNama">Pilih Nama Siswa</label>
                <select class="js-example-basic-single" name="id_siswa">
                    <option>Pilih :</option>
                    <?php foreach ($siswa->result_array() as $k) :
                        $nama_siswa = $k['name'];
                    ?>
                        <option value="<?= $k['id_siswa'] ?>"><?= $nama_siswa ?></option>

                    <?php endforeach ?>
                </select>

                <button type="submit">cari</button>
            </div>
        </form>
    </div>


    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white">DATA NILAI UBAH </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Komunikasi Data</th>
                                <th>Rangkaian Elektronik</th>
                                <th>Perekaysaan Sistem Kontrol</th>
                                <th>Sensor dan Aktuator</th>
                                <th>Gambar Teknik</th>
                                <th>Komunikasi</th>
                                <th>Etika</th>
                                <th>Nilai Semester</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (isset($_POST['id_siswa'])) {
                                foreach ($siswa->result_array() as $k) :
                                    $id = $k['id'];
                                    $name = $k['name'];
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
                                        <td><?= $mapel1; ?></td>
                                        <td><?= $mapel2; ?></td>
                                        <td><?= $mapel3; ?></td>
                                        <td><?= $mapel4; ?></td>
                                        <td><?= $mapel5; ?></td>
                                        <td><?= $mapel6; ?></td>
                                        <td><?= $mapel7; ?></td>
                                        <td><?= $mapel8; ?></td>
                                    </tr>

                            <?php endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <div class="card shadow mb-4">
        <div class="card-header bg-primary ">
            <h6 class="m-0 font-weight-bold text-white">DATA SUB KRITERIA</h6>
        </div>
        <div class="card-body">
            <form action="#" id="form_wcriteria">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Sub-Kriteria</td>
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
                                                <select class=" form-control inputweight kolom<?= $i ?>" name="<?= "x" . $i . "y" . $id ?>" id="<?= "x" . $i . "y" . $id ?>" data-id="<?= "x" . $id . "y" . $i ?>">
                                                    <?php
                                                    $nameform = "x" . $i . "y" . $id;
                                                    $idx = $this->session->userdata("user_logged")["id"];
                                                    $querys = 'SELECT comparison_list_id FROM tr_comparison_subcriteria WHERE user_id="' . $idx . '" AND form_name="' . $nameform . '"';
                                                    $queryss = $this->db->query($querys)->row();
                                                    // print_r($queryss);
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
                                    <th>Sub Kriteria</th>
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
                                                <input id="bobot_<?= $id ?>" data-criteriaid<?= $key->id; ?>="<?= $key->id; ?>" value="0" type="text" disabled>
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
                            <table id="example1" class="table table-bordered table-striped">
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