<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rank extends CI_Controller
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
		if ($this->user->isNotLogin()) redirect(site_url('login'));
	}

	public function Personal()
	{
		$data["content"] = "admin/personal_rank";
		$data["th"] = $this->criteria->get_th_weightPerson($this->session->userdata("user_logged")["id"]);
		$data["tr"] = $this->subcriteria->get_th_weightPerson($this->session->userdata("user_logged")["id"]);
		$data["th2"] = $this->subcriteria->get_th();
		$data["tr2"] = $this->alternative->get_th_weight2($this->session->userdata("user_logged")["id"]);
		$data["alter"] = $this->alternative->get_alternateASC();
		$data["sum_row_sub"] = $this->subcriteria->count_row();
		$data["sum_row"] = $this->alternative->count_row();
		$data["cl"] = $this->cl->get_all();
		// $data["cek"] = $this->alternative->cekDataRank();
		$this->load->view('partial/header', $data);
		$this->load->view('partial/sidebar', $data);
		$this->load->view('partial/navbar', $data);
		// $this->load->view('partial/breadcrumb');

		$this->load->view('admin/personal_rank', $data);
		$this->load->view('partial/footer', $data);
		$this->load->view('partial/js', $data);
	}

	public function deleteRank()
	{
		$datadelete = array(
			"user_id" => $this->session->userdata("user_logged")["id"],
		);
		$this->alternative->deleteRank($datadelete);
		echo json_encode("Sukses!");
	}

	public function saveRank()
	{
		$data = array(
			"user_id" => $this->session->userdata("user_logged")["id"],
			"id_company" => $this->input->post("id_company"),
			"rank_value" => $this->input->post("rank_value"),

		);
		$this->alternative->saveRank($data);
		echo json_encode("Sukses menyimpan data!");
	}

	public function Group()
	{
		$data["content"] = "admin/group_rank";
		$comp = $this->alternative->get_alternateASC();
		$data["alter"] = $this->alternative->get_alter_rank_user();
		$data["sum_row"] = $this->alternative->count_row();
		$data["anggota"] = $this->user->get_all();
		$data["alter2"] = $comp;
		// $data["borda"] = $this->alternative->get_alternateASC($idgroup);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/sidebar', $data);
		$this->load->view('partial/navbar', $data);
		// $this->load->view('partial/breadcrumb');

		$this->load->view('admin/group_rank', $data);
		$this->load->view('partial/footer', $data);
		$this->load->view('partial/js', $data);
	}
}
