<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pengkajian_model extends CI_Model
{
//    var $table = 'tbl_bmn';
    var $column_order = array('id_visit', 'date', 'mr_number', 'patient_id', 'patient_name', 'patient_sex', 'birth_date', 'clinic_name' ); //set column field database for datatable orderable
    var $column_search = array('v.date', 'p.id','p.name', 'p.sex', 'p.birth_date', 'c.name' ); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('date' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    private function _get_datatables_query()
    {
        $this->db->select("
        v.id as id_visit,
				v.date as date,
				DATE_FORMAT(v.date, '%d-%m-%y') as time21,
				DATE_FORMAT(v.date, '%H:%i') as time22,				
				CASE
					WHEN DATE(v.date) = CURDATE() THEN DATE_FORMAT(v.date, '%d %M %Y %H:%i')
					ELSE DATE_FORMAT(v.date, '%d %M %Y %H:%i') END as time,
				CASE
				WHEN (p.nik <> '') THEN CONCAT(p.`id`) 
				ELSE CONCAT(p.id)
				END as mr_number,
				p.id as patient_id,
				p.name as patient_name,
				p.sex as patient_sex,
				p.birth_date as birth_date,
				p.birth_date as birth_date_for_age,
				DATE(v.date) as visit_date_for_age,
				v.date as visit_date,
				c.id as clinic_id,
				c.name as clinic_name,
				v.served as served
        
        ");
        $this->db->from('visits as v');
        $this->db->join('patients as p', 'p.id = v.patient_id','join');
        $this->db->join('ref_clinics as c', 'c.id = v.clinic_id','join');
        $this->db->join('prescribes as pres', 'pres.visit_id = v.id','join');
        
        $this->db->where('v.date >=', '2023-05-25'.' 00:00:00');
        $this->db->where('v.date <=', '2023-05-25'.' 23:59:00');

        // $this->db->where('v.date >=', date('Y-m-d').' 00:00:00');
        // $this->db->where('v.date <=', date('Y-m-d').' 23:59:00');
        $this->db->group_by('v.id'); 

        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->select("
            v.id as id_visit,
			v.date as date,
			DATE_FORMAT(v.date, '%d-%m-%y') as time21,
			DATE_FORMAT(v.date, '%H:%i') as time22,				
			CASE
				WHEN DATE(v.date) = CURDATE() THEN DATE_FORMAT(v.date, '%d %M %Y %H:%i')
					ELSE DATE_FORMAT(v.date, '%d %M %Y %H:%i') END as time,
				CASE
				WHEN (p.nik <> '') THEN CONCAT(p.`id`) 
				ELSE CONCAT(p.id)
				END as mr_number,
				p.id as patient_id,
				p.name as patient_name,
				p.sex as patient_sex,
				p.birth_date as birth_date,
				p.birth_date as birth_date_for_age,
				DATE(v.date) as visit_date_for_age,
				v.date as visit_date,
				c.id as clinic_id,
				c.name as clinic_name,
				v.served as served
        
        ");
        $this->db->from('visits as v');
        $this->db->join('patients as p', 'p.id = v.patient_id','join');
        $this->db->join('ref_clinics as c', 'c.id = v.clinic_id','join');
        $this->db->join('prescribes as pres', 'pres.visit_id = v.id','join');
        
        $this->db->where('v.date >=', date('Y-m-d').' 00:00:00');
        $this->db->where('v.date <=', date('Y-m-d').' 23:59:00');
        $this->db->group_by('v.id'); 
        
        return $this->db->count_all_results();
    }
    public function getDataObat($id_visit){

        $this->db->select("
            rd.code as code,
            p.visit_id,
            p.`id`, 
            rd.name as `name`, 
            p.`mix_name` as `mix_name`,
            p.`unit` as unit, 
            p.`dosis1`, 
            p.`dosis2`, 
            SUM(p.`qty`) as qty, 
            p.`log`,
            p.drug_taken,
            rd.fungsi_obat,
            rd.cara_pakai,
            rd.waktu_pakai,
            p.signa
        ")
        ->from('prescribes as p')
        ->join('visits as v', 'v.id = p.visit_id','join')
        ->join('ref_drugs as rd', 'rd.id = p.drug_id','join')
        
        ->where('p.randomnumber IS NULL')
        ->where('p.visit_id', $id_visit)
        ->where('p.log', 'no')
        ->where('p.drug_taken', 'yes')
        
        ->group_by('p.drug_id')
        ->order_by('p.id');
        $query = $this->db->get();         
        return $query->result(); 
    }
    public function getDataPasien($id_visit){
        $this->db->select("
        v.id as id_visit,
				v.date as date,
				DATE_FORMAT(v.date, '%d-%m-%y') as time21,
				DATE_FORMAT(v.date, '%H:%i') as time22,				
				CASE
					WHEN DATE(v.date) = CURDATE() THEN DATE_FORMAT(v.date, '%d %M %Y %H:%i')
					ELSE DATE_FORMAT(v.date, '%d %M %Y %H:%i') END as time,
				CASE
				WHEN (p.nik <> '') THEN CONCAT(p.`id`) 
				ELSE CONCAT(p.id)
				END as mr_number,
				p.id as patient_id,
				p.name as patient_name,
				p.sex as patient_sex,
				p.birth_date as birth_date,
				p.birth_date as birth_date_for_age,
				DATE(v.date) as visit_date_for_age,
				v.date as visit_date,
				c.id as clinic_id,
				c.name as clinic_name,
				v.served as served
        
        ");
        $this->db->from('visits as v');
        $this->db->join('patients as p', 'p.id = v.patient_id','join');
        $this->db->join('ref_clinics as c', 'c.id = v.clinic_id','join');
        $this->db->join('prescribes as pres', 'pres.visit_id = v.id','join');
        
        $this->db->where('v.id', $id_visit);
        $this->db->group_by('v.id');
        $query = $this->db->get(); 
        return $query->row();
    }
    public function getDataApoteker()
    {

        $this->db->select("
            *
        ")
        ->from('apoteker');
        $query = $this->db->get();         
        return $query->result(); 
    }

}