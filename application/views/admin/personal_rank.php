<div class="row">
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <div class="card">
                    <div class="card-content">
                        <input type="hidden" id="sum_sub" value="<?= $sum_row_sub ?>">
                        <input type="hidden" id="sum_alter" value="<?= $sum_row ?>">
                        <div id="respon"></div>
                    </div>
                </div>
                <!-- Daftar SUBkriteria -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary py-3">
                        <h6 class="m-0 font-weight-bold text-white">Perhitungan Bobot Global</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>X</th>
                                        <th>Sub-Kriteria</th>
                                        <th></th>
                                        <th>Bobot Global</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ids = 0;
                                    foreach ($tr as $key) :
                                        $ids++;
                                        $idc = $key->id_criteria; ?>
                                        <tr>
                                            <td>
                                                <?php foreach ($th as $key2) :
                                                    if ($key2->criteria_id == $idc) : ?>
                                                        <input class="form-control" type="text" id="wcriteria<?= $ids ?>" name="wcriteria<?= $ids ?>" value="<?= $key2->weight_criteria; ?>" disabled>
                                                <?php endif;
                                                endforeach; ?>
                                            </td>
                                            <td>X</td>
                                            <td>
                                                <input class="form-control" type="text" id="subcr<?= $ids ?>" name="subcr<?= $ids ?>" value="<?= $key->weight_subcriteria; ?>" disabled>
                                            </td>
                                            <td>=</td>
                                            <td>
                                                <input class="form-control" type="text" id="global_<?= $ids ?>" name="global_<?= $ids ?>" value="0" disabled>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <a class="btn btn-primary" onclick="showmatrix()" style="margin-right:10px; color: white;">Hitung Ranking
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Daftar Perhitungan matrik -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row" id="matrikdiv" style="display:none;">
                    <div class="col s12">
                        <div class="card animated fadeInUp">
                            <form action="#" id="form_wcriteria2">
                                <div class="card-content">
                                    <h4 class="card-title">Hitung Nilai Rank Alternatif</h4>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-striped">
                                            <thead>
                                                <th>Alternatif | Sub-Kriteria (Global)</th>
                                                <?php foreach ($th2 as $key) : ?>
                                                    <th><?= $key->name ?></th>
                                                <?php endforeach; ?>
                                                <th>Nilai Rank</th>
                                            </thead>
                                            <tbody>
                                                <?php $idss = 0;
                                                foreach ($alter as $key1) :
                                                    $idalter = $key1->id;
                                                    $idss++;
                                                ?>
                                                    <tr>
                                                        <td><?= $key1->name ?></td>
                                                        <?php $idss2 = 0;
                                                        foreach ($tr2 as $key3) :
                                                            if ($key3->alternative_id == $idalter) :
                                                                $idss2++;
                                                        ?>
                                                                <td><input type="text" id="xx_<?= $idss2; ?>yy_<?= $idss; ?>" name="xx_<?= $idss2; ?>yy_<?= $idss; ?>" value="<?= $key3->weight_alternative ?>" disabled></td>
                                                        <?php endif;
                                                        endforeach; ?>
                                                        <td>
                                                            <input type="text" id="nilairank_<?= $idss; ?>" name="nilairank_<?= $idss; ?>" data-idcompany="<?= $idalter ?>" disabled>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if (empty($cek)) : ?>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a class="btn btn-primary" id="addRank" style="margin-right:10px; color: white;">Simpan Rank
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>