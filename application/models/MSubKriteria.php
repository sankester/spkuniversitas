<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:54
 */
class MSubKriteria extends CI_Model{

    public $kdSubKriteria;
    public $kdKriteria;
    public $subKriteria;
    public $value;


    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'subkriteria';
    }

    private function getData(){
        $data = array(
            'kdKriteria' => $this->kdKriteria,
            'subKriteria' => $this->subKriteria,
            'value' => $this->value
        );
        return $data;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriterias[] = $row;
            }

            return$subkriterias;
        }
    }

    public function getById()
    {
        $this->db->where('kdKriteria', $this->kdKriteria);
        $query = $this->db->get($this->getTable());

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriteria[] = $row;
            }

            return $subkriteria;
        }
    }

    public function insert()
    {
        $data = $this->getData();
        $this->db->insert($this->getTable(), $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        $data = $this->getData();
        $this->db->where('kdSubKriteria', $this->kdSubKriteria);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdKriteria', $id);
        return $this->db->delete($this->getTable());
    }
}