<?php
    class Pegawai extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function index()
        {
            $qry = $this->db->query('select jabatan.nama_jabatan, pegawai.* from jabatan, pegawai where pegawai.jabatan_id = jabatan.id order by id asc');
            $view['data'] = $qry->result_array();
            $this->load->view('pegawai/list', $view);
        }

        public function tambah()
        {
            $data['jabatan_combo'] = $this->_jabatan_combo_generate();
            $this->load->view('pegawai/form', $data);
        }

        public function edit($prm_key = '')
        {
            if(trim($prm_key) != '')
            {
                $view['jabatan_combo'] = $this->_jabatan_combo_generate();
                $qry = $this->db->get_where('pegawai', array('id' => $prm_key));
                $view['data'] = $qry->result_array();
                $this->load->view('pegawai/form', $view);
            } else {
            redirect(site_url().'/pegawai');
            }
        }

        public function hapus($prm_key = '') {
            if(trim($prm_key) != '') {
                $qry = $this->db->delete('pegawai', array('id' => $prm_key));
            }
            redirect(site_url().'/pegawai');
        }

        public function simpan()
        {
            $data['jabatan_combo'] = $this->_jabatan_combo_generate();
            $this->load->library('form_validation');
            $rules = array(
                array
                (
                    'field' => 'txt_id'
                    , 'label' => 'ID'
                    , 'rules' => 'trim'
                ), 
                array
                (
                    'field' => 'cmb_jabatan'
                    , 'label' => 'Jabatan'
                    , 'rules' => 'trim|required'
                ), 
                array
                (
                'field' => 'txt_nama_pegawai'
                , 'label' => 'Nama'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_alamat'
                , 'label' => 'Alamat'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_tempat_lahir'
                , 'label' => 'Tempat Lahir'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_tgl_lahir'
                , 'label' => 'Tanggal Lahir'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_email'
                , 'label' => 'Email'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_telepon'
                , 'label' => 'Telepon'
                , 'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('<code>', '</code>');
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('pegawai/form', $data);
            } else {
                $qry = $this->db->get_where('pegawai', array('id' => $this->input->post('txt_id')));
                $data = array
                (
                    'jabatan_id' => $this->input->post('cmb_jabatan')
                    , 'nama_pegawai' => $this->input->post('txt_nama_pegawai')
                    , 'alamat' => $this->input->post('txt_alamat')
                    , 'tempat_lahir' => $this->input->post('txt_tempat_lahir')
                    , 'tgl_lahir' => $this->input->post('txt_tgl_lahir')
                    , 'email' => $this->input->post('txt_email')
                    , 'telepon' => $this->input->post('txt_telepon')
                );
                if( count($qry->result()) == 0 )
                {
                    $data = array_merge(array( 'id' => $this->input->post('txt_id') ), $data);
                    $this->db->insert('pegawai', $data);
                } else {
                    $this->db->update('pegawai', $data, array('id' => $this->input->post('txt_id')));
                }
                redirect(site_url().'/pegawai');
            }
        }

        private function _jabatan_combo_generate()
        {
            $qry = $this->db->query('select * from jabatan');
            $result = $qry->result_array();
            return $result;
        }
    }