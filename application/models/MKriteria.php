<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MKriteria extends CI_Model{

    public $kdKriteria;
    public $kriteria;
    public $sifat;
    public $bobot;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'kriteria';
    }



    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $kriterias[] = $row;
            }
            return $kriterias;
        }
    }

    public function getById()
    {

        $this->db->from($this->getTable());
        $this->db->where('kdKriteria',$this->kdKriteria);
        $query = $this->db->get();

        return $query->row();
    }

    public function insert()
    {
        $data = array(
            'kriteria' => $this->kriteria,
            'sifat' => $this->sifat,
            'bobot' => $this->bobot
        );
        $this->db->insert($this->getTable(), $data);
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $data = array(
            'kriteria' => $this->kriteria,
            'sifat' => $this->sifat,
            'bobot' => $this->bobot
        );

        $this->db->update($this->getTable(), $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdKriteria', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdKriteria');
        $this->db->order_by('kdKriteria', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }

}