<?php

class M_Alternative extends CI_Model
{
    private $_table = "company";

    public function get_all($id)
    {
        $this->db->select("id_company");
        $query1 = $this->db->get("alternative")->result();
        if (!empty($query1)) {
            $listId = "";
            foreach ($query1 as $key) {
                $listId .= $key->id_company . ",";
            }
            $listId = substr($listId, 0, -1);

            $sql = "Select * from company WHERE id NOT IN ($listId)";
            $query2 = $this->db->query($sql);
            return $query2->result();
        }
    }

    public function get_alternate()
    {
        $this->db->select("*");
        // $this->db->join('company', 'company.id = alternative.id_company');
        return $this->db->get($this->_table)->result();
    }

    public function get_alternateASC()
    {
        $this->db->select("*");
        // $this->db->join('company', 'company.id = alternative.id_company');
        $this->db->order_by("company.id ASC");
        return $this->db->get($this->_table)->result();
    }

    public function get_alternateASCGroup()
    {
        $this->db->select("*");
        // $this->db->join('company', 'company.id = weight_alternative.alternative_id');
        $this->db->group_by("weight_alternative.user_id");
        $this->db->order_by("weight_alternative.alternative_id");
        return $this->db->get("weight_alternative")->result();
    }

    public function addAlternate($data)
    {
        $this->db->insert($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get_by_id($id)
    {
        $this->db->select("*");
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->result();
    }

    public function updateAlternative($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteAlternative($id)
    {
        $this->db->where("id", $id);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function count_row()
    {
        // $this->db->join('company', 'company.id = alternative.id_company');
        return $this->db->get($this->_table)->num_rows();
    }

    public function count_row2()
    {
        // $this->db->join('company', 'company.id = alternative.id_company');
        return $this->db->get($this->_table)->num_rows();
    }

    public function cekDataTR($id, $ids)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        $this->db->where("subcriteria_id", $ids);
        return $this->db->get("tr_comparison_alternative")->result();
    }

    public function addWeightAlternate($data)
    {
        $this->db->insert("tr_comparison_alternative", $data);
    }

    public function deleteWeightAlternate($where)
    {
        $this->db->where($where);
        $this->db->delete("tr_comparison_alternative");
    }

    public function cekDataBobot($id, $ids)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        $this->db->where("subcriteria_id", $ids);
        return $this->db->get("weight_alternative")->result();
    }

    public function addValueWeightAlternative($data)
    {
        $this->db->insert("weight_alternative", $data);
    }

    public function deleteValueWeightAlternative($where)
    {
        $this->db->where($where);
        $this->db->delete("weight_alternative");
    }

    public function get_th_weight()
    {
        $this->db->select("*");
        $this->db->order_by("subcriteria_id ASC");
        return $this->db->get("weight_alternative")->result();
    }

    public function get_th_weight2($id)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        $this->db->order_by("subcriteria_id ASC");
        return $this->db->get("weight_alternative")->result();
    }


    public function get_alter_rank_user()
    {
        $this->db->select("*");
        $this->db->join('company', 'company.id = rank.id_company');
        $this->db->order_by("rank_value desc");
        return $this->db->get("rank")->result();
    }

    public function saveRank($data)
    {
        $this->db->insert("rank", $data);
    }

    public function cekDataRank($id)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        return $this->db->get("rank")->result();
    }

    public function deleteRank($where)
    {
        $this->db->where($where);
        $this->db->delete("rank");
    }

    public function get_id_ketua($id)
    {
        $this->db->select("created_by");
        $this->db->where("id", $id);
        $id = $this->db->get("user_group")->row();
        return $id->created_by;
    }

    public function cek_row($id)
    {
        $this->db->where("user_id", $id);
        return $this->db->get("tr_comparison_alternative")->num_rows();
    }
}
