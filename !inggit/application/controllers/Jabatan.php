<?php
class Jabatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $qry = $this->db->query('select * from jabatan');
        $view['data'] = $qry->result_array();
        $this->load->view('jabatan/list', $view);
    }

    public function tambah()
    {
        $this->load->view('jabatan/form');
    }

    public function edit($prm_key = '')
    {
        if(trim($prm_key) != '')
        {
            $qry = $this->db->get_where('jabatan', array('id' => $prm_key));
            $view['data'] = $qry->result_array();
            $this->load->view('jabatan/form', $view);
        } else {
            redirect(site_url().'/jabatan');
        }
    }

    public function hapus($prm_key = '') 
    {
        if(trim($prm_key) != '') {
            $qry = $this->db->delete('jabatan', array('id' => $prm_key));
        }
        redirect(site_url().'/jabatan');
    }

    public function simpan()
    {
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'txt_id'
                , 'label' => 'ID'
                , 'rules' => 'trim'
            ), 
            array(
                'field' => 'txt_nama_jabatan'
                , 'label' => 'Jabatan'
                , 'rules' => 'trim|required'
            ),
            array(
                'field' => 'txt_gaji_pokok'
                , 'label' => 'Gaji Pokok'
                , 'rules' => 'trim|required'
            ),
            array(
                'field' => 'txt_tunjangan'
                , 'label' => 'Tunjangan'
                , 'rules' => 'trim|required'
            ),
            array(
                'field' => 'txt_uang_transport'
                , 'label' => 'Uang Transport'
                , 'rules' => 'trim|required'
            ),
            array(
                'field' => 'txt_uang_makan'
                , 'label' => 'Uang Makan'
                , 'rules' => 'trim|required'
            ),
            array(
                'field' => 'txt_lembur'
                , 'label' => 'Lembur'
                , 'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<code>', '</code>');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('jabatan/form');
        } else {
            $qry = $this->db->get_where('jabatan', array('id' => $this->input->post('txt_id')));
            $data = array('nama_jabatan' => $this->input->post('txt_nama_jabatan')
                        , 'gaji_pokok' => $this->input->post('txt_gaji_pokok')
                        , 'tunjangan' => $this->input->post('txt_tunjangan')
                        , 'uang_transport' => $this->input->post('txt_uang_transport')
                        , 'uang_makan' => $this->input->post('txt_uang_makan')
                        , 'lembur' => $this->input->post('txt_lembur')
                    );
            if( count($qry->result()) == 0 )
            {
                $data = array_merge(array('id' => $this->input->post('txt_id') ), $data);
                $this->db->insert('jabatan', $data);
            } else {
                $this->db->update('jabatan', $data, array('id' => $this->input->post('txt_id')));
            }
            redirect(site_url().'/jabatan');
        }
    }
}