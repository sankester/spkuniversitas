<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:42
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Universitas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Universitas');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MUniversitas');
        $this->load->model('MNilai');
    }

    public function index()
    {

        loadPage('universitas/index');
    }

    public function tambah()
    {
        if (count($_POST)) {
            $this->form_validation->set_rules('universitas', '', 'trim|required');
//            $this->form_validation->set_rules('nilai', '', 'required',array('required' => 'Anda harus mengisi nilai kriteria !!!'));
            if ($this->form_validation->run() == false) {
                $errors = $this->form_validation->error_array();
                $this->session->set_flashdata('errors', $errors);
                redirect(current_url());
            } else {

                $universitas = $this->input->post('universitas');
                $nilai = $this->input->post('nilai');

                $this->MUniversitas->universitas = $universitas;
                if($this->MUniversitas->insert() == true){
                    $success = false;
                    $kdUniversitas = $this->MUniversitas->getLastID()->kdUniversitas;
                    foreach ($nilai as $item => $value) {
                        $this->MNilai->kdUniversitas = $kdUniversitas;
                        $this->MNilai->kdKriteria = $item;
                        $this->MNilai->nilai = $value;
                        if ( $this->MNilai->insert()) {
                            $success = true;
                        }
                    }
                    if($success == true){
                        $this->session->set_flashdata('message','Berhasil menambah data :)');
                        redirect('universitas');
                    }else{
                        echo 'gagal';
                    }
                }

            }
        }else{
            $data['dataView'] = $this->getDataView();
            loadPage('universitas/tambah', $data);
        }
    }

    private function getDataView()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }
}