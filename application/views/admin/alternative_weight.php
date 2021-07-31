<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">

                <!-- Daftar kriteria -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary py-3">
                        <h6 class="m-0 font-weight-bold text-white">DATA ALTERNATIF</h6>
                    </div>
                    <div class="card-body">
                        <form action="#" id="form_wcriteria">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped">
                                    <?php foreach ($subcriteria as $key) :
                                        $idx = $this->session->userdata("user_logged")["id"];
                                        $querys = 'SELECT subcriteria_id FROM tr_comparison_alternative WHERE subcriteria_id="' . $key->id . '" AND user_id="' . $idx . '"';
                                        $queryss = $this->db->query($querys)->num_rows();
                                        if ($queryss != 0) {
                                            $badge = '<span class="badge badge-danger">Terisi</span>';
                                        } else {
                                            $badge = "";
                                        }
                                        // echo $queryss;
                                    ?>
                                        <a href="<?= base_url() ?>admin/Weight/Alternative_Detail/<?= $key->id; ?>" class="collection-item"><?= $key->criterianame; ?> - <?= $key->name; ?><?= $badge ?></a><br>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>