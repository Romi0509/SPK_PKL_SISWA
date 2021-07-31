<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Rangking Untuk Seluruh Anggota</h6>
        </div>
        <input type="hidden" id="sum_alter" value="<?= $sum_row ?>">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nilai Ranking</th>
                            <th>Rekomendasi Tempat Prakerin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $iduser = 0;
                        foreach ($anggota as $key) : ?>
                            <?php if (!empty($alter)) : ?>
                                <?php $borda = 0;
                                $idalter = 0;
                                foreach ($alter as $key2) : ?>
                                    <?php if ($key->id == $key2->user_id) :
                                        $idalter++;
                                        $borda++ ?>
                                        <?php if ($borda < 2) : ?>
                                            <tr>
                                                <td>
                                                    <?= $key->name; ?>
                                                </td>
                                                <td>
                                                    <?= $key2->rank_value ?>
                                                </td>
                                                <td>
                                                    <?= $key2->name ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr class="odd">
                                    <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <a class="btn btn-primary" style="color: #fff;" onclick="showmatrix()"><i class="fa fa-calculator"></i> Tampil Seluruh Data</a>
    <!-- Daftar kriteria -->
    <div class="row py-4" id="matrikdiv" style="display:none;">
        <?php $iduser = 0;
        foreach ($anggota as $key) : $iduser++; ?>
            <div class="col s12 m6 xl6">
                <div class="card animated fadeInUp">
                    <div class="card-content">
                        <h4 class="card-title py-2 mx-2"><?= $iduser . ". " . $key->name; ?></h4>
                        <div class="row">
                            <div class="col s12">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            <th>Nilai Ranking</th>
                                            <th>Poin Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($alter)) : ?>
                                            <?php $borda = 0;
                                            $idalter = 0;
                                            foreach ($alter as $key2) : ?>
                                                <?php if ($key->id == $key2->user_id) :
                                                    $idalter++;
                                                    $borda++ ?>

                                                    <tr>
                                                        <td>
                                                            <?= $key2->name ?>
                                                        </td>
                                                        <td>
                                                            <?= $key2->rank_value ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" data-alterid="<?= $key2->id_company ?>" id="siswa<?= $iduser ?>alter<?= $idalter ?>" value="<?= $borda ?>" disabled>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr class="odd">
                                                <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>