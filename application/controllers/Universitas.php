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
        $this->page->setLoadJs('assets/js/universitas');
    }

    public function index()
    {
        $data['universitas'] = $this->MUniversitas->getAll();
        loadPage('universitas/index', $data);
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('universitas', '', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                    $universitas = $this->input->post('universitas');
                    $nilai = $this->input->post('nilai');

                    $this->MUniversitas->universitas = $universitas;
                    if ($this->MUniversitas->insert() == true) {
                        $success = false;
                        $kdUniversitas = $this->MUniversitas->getLastID()->kdUniversitas;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdUniversitas = $kdUniversitas;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('universitas');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('universitas/tambah', $data);
            }
        }else{
            if(count($_POST)){
                $kdUniversitas = $this->uri->segment(3, 0);
                dump($kdUniversitas);
                if($kdUniversitas > 0){
                    $universitas = $this->input->post('universitas');
                    $nilai = $this->input->post('nilai');
                    $where = array('kdUniversitas' => $kdUniversitas);
                    $this->MUniversitas->universitas = $universitas;
                    dump($universitas);
                    if($this->MUniversitas->update($where) == true){
                        $success = false;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdUniversitas = $kdUniversitas;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('universitas');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiUniversitas'] = $this->MNilai->getNilaiByUniveristas($id);
            loadPage('universitas/tambah', $data);
        }

    }

    private function getDataInsert()
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

    public function delete($id)
    {
        if($this->MNilai->delete($id) == true){
            if($this->MUniversitas->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
            }
        }
    }
}