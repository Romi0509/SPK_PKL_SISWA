<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weight extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("M_User", "user");
        $this->load->model("M_Perusahaan", "company");
        $this->load->model("M_Subkriteria", "subcriteria");
        $this->load->model("M_Kriteria", "criteria");
        $this->load->model("M_ComparisonList", "cl");
        $this->load->model("M_Alternative", "alternative");
    }

    public function Criteria()
    {
        $data["content"] = "admin/criteria_weight";
        $data["th"] = $this->criteria->get_th();
        $data["tr"] = $this->criteria->get_th();
        $data["sum_row"] = $this->criteria->count_row();
        $data["cl"] = $this->cl->get_all();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/criteria_weight', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function SubCriteria()
    {
        // $id_user = $this->session->userdata('user_logged')['id'];

        if (isset($_POST['id_siswa'])) {
            $id_siswa = $this->input->post('id_siswa');

            $data['siswa'] = $this->user->get_data($id_siswa);
        } else {
            $data['siswa'] = $this->user->get_data();
        }
        $data["content"] = "admin/subcriteria_weight";
        $data["th"] = $this->subcriteria->get_th();
        $data["tr"] = $this->subcriteria->get_th();
        $data["sum_row"] = $this->subcriteria->count_row();
        $data["cl"] = $this->cl->get_all();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/subcriteria_weight', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function tambah_alternative()
    {
        $data = array(
            'id_subcriteria' => $this->input->post('id_subcriteria'),
            'company1' => $this->input->post('company1'),
            'company2' => $this->input->post('company2'),
            'company3' => $this->input->post('company3'),
            'company4' => $this->input->post('company4'),
            'company5' => $this->input->post('company5'),
            'company6' => $this->input->post('company6'),
            'company7' => $this->input->post('company7')
        );

        $this->db->insert('normalisasi_alternative', $data);
        $this->session->set_flashdata('success', '<div class ="alert alert-success" role="alert">
                User Berhasil Ditambah </div>');
        redirect('');
    }

    public function Alternative()
    {
        $data["content"] = "admin/alternative_weight";
        $data["subcriteria"] = $this->subcriteria->get_all_orderBy();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/alternative_weight', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function Alternative_Detail($id)
    {
        // $idgroup = $this->session->userdata("user_logged")["id"];
        $data['company'] = $this->company->get_perusahaan();
        $data["content"] = "admin/alternative_weight_detail";
        $data["subcrit"] = $id;
        $data["namesubcrit"] = $this->subcriteria->get_by_id($id);
        $data["th"] = $this->alternative->get_alternateASC();
        $data["tr"] = $this->alternative->get_alternateASC();
        $data["sum_row"] = $this->alternative->count_row();
        $data["cl"] = $this->cl->get_all();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/alternative_weight_detail', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function addCriteriaWeight()
    {
        $check = $this->criteria->cekDataTR($this->session->userdata("user_logged")["id"]);
        if ($check != "") {
            $id = array(
                "user_id" => $this->session->userdata("user_logged")["id"]
            );
            $this->criteria->deleteWeightCriteria($id);
        }

        $check2 = $this->criteria->cekDataBobot($this->session->userdata("user_logged")["id"]);
        if ($check2 != "") {
            $id2 = array(
                "user_id" => $this->session->userdata("user_logged")["id"],
            );
            $this->criteria->deleteValueWeightCriteria($id2);
        }

        foreach ($this->input->post() as $key => $value) {
            $data = array(
                "user_id" => $this->session->userdata("user_logged")["id"],
                "form_name" => $key,
                "comparison_list_id" => $value,
                // "created_by" => $this->session->userdata("user_logged")["id"],

            );
            $this->criteria->addWeightCriteria($data);
        }
        echo json_encode("Sukses menyimpan data!");
    }

    public function addSubCriteriaWeight()
    {
        $check = $this->subcriteria->cekDataTR($this->session->userdata("user_logged")["id"]);
        if ($check != "") {
            $id = array(
                "user_id" => $this->session->userdata("user_logged")["id"]
            );
            $this->subcriteria->deleteWeightSubCriteria($id);
        }

        $check2 = $this->subcriteria->cekDataBobot($this->session->userdata("user_logged")["id"]);
        if ($check2 != "") {
            $id2 = array(
                "user_id" => $this->session->userdata("user_logged")["id"],
            );
            $this->subcriteria->deleteValueWeightSubCriteria($id2);
        }

        foreach ($this->input->post() as $key => $value) {
            $data = array(
                "user_id" => $this->session->userdata("user_logged")["id"],
                "form_name" => $key,
                "comparison_list_id" => $value,

            );
            $this->subcriteria->addWeightSubCriteria($data);
        }
        echo json_encode("Sukses menyimpan data!");
    }

    public function addWeightAlternate()
    {
        $sc = $this->input->post("subcriteria_id");
        $check = $this->alternative->cekDataTR($this->session->userdata("user_logged")["id"], $this->input->post("subcriteria_id"));
        if ($check != "") {
            $id = array(
                "user_id" => $this->session->userdata("user_logged")["id"],
                "subcriteria_id" => $this->input->post("subcriteria_id"),
            );
            $this->alternative->deleteWeightAlternate($id);
        }

        $check2 = $this->alternative->cekDataBobot($this->session->userdata("user_logged")["id"], $sc);
        if ($check2 != "") {
            $id2 = array(
                "user_id" => $this->session->userdata("user_logged")["id"],
                "subcriteria_id" => $this->input->post("subcriteria_id"),
            );
            $this->alternative->deleteValueWeightAlternative($id2);
        }

        foreach ($this->input->post() as $key => $value) {
            if ($key != "subcriteria_id") {
                // foreach ($value as $key2 => $val2) {
                $data = array(
                    "user_id" => $this->session->userdata("user_logged")["id"],
                    "subcriteria_id" => $sc,
                    "form_name" => $key,
                    "comparison_list_id" => $value,

                );
                $this->alternative->addWeightAlternate($data);
                // }
            }
        }
        echo json_encode("Sukses menyimpan data!");
    }

    public function addLastCriteriaWeight()
    {
        $data = array(
            "user_id" => $this->session->userdata("user_logged")["id"],
            "criteria_id" => $this->input->post("id"),
            "weight_criteria" => $this->input->post("bobot"),
        );
        $this->criteria->addValueWeightCriteria($data);
        echo json_encode("Sukses menyimpan data!");
    }

    public function addLastSubCriteriaWeight()
    {
        $data = array(
            "user_id" => $this->session->userdata("user_logged")["id"],
            "subcriteria_id" => $this->input->post("id"),
            "weight_subcriteria" => $this->input->post("bobot"),
        );
        $this->subcriteria->addValueWeightSubCriteria($data);
        echo json_encode("Sukses menyimpan data!");
    }

    public function addLastAlternativeWeight()
    {
        $data = array(
            "user_id" => $this->session->userdata("user_logged")["id"],
            "alternative_id" => $this->input->post("id"),
            "subcriteria_id" => $this->input->post("subcriteria"),
            "weight_alternative" => $this->input->post("bobot"),
        );
        $this->alternative->addValueWeightAlternative($data);
        echo json_encode("Sukses menyimpan data!");
    }
}
