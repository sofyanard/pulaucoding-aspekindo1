<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Anggota_model');
    }

	public function index()
	{
        $this->session->unset_userdata('searchprop');
        
        // Pagination Config
        $config['base_url'] = base_url('anggota/index');
        $config['per_page'] = 50;
        $config['total_rows'] = $this->Anggota_model->getAnggotaListNumRows();
        $this->pagination->initialize($config);
        $offset = $this->uri->segment(3);
        
        $anggotas = $this->Anggota_model->getAnggotaListPage($config['per_page'], $offset);
        $data['anggotas'] = $anggotas;
        $data['startno'] = $offset + 1;

        // DropDownList Propinsi
        $propinsi = $this->Anggota_model->getPropinsiList();
        $data['propinsi'] = $propinsi;

        // DropDownList Kota
        $kota = $this->Anggota_model->getKotaByPropinsiList(0);
        $data['kota'] = $kota;
        
        $data['title'] = 'Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/indexscript');
        $this->load->view('templates/footerbegin');
    }

    public function search()
    {
        $config['base_url'] = base_url('anggota/search');
        $config['per_page'] = 50;

        if ($this->input->post('submit'))
        {
            $searchprop = null;
            $this->session->unset_userdata('searchprop');

            $searchprop = [
                'nrbu' => $this->input->post('nrbu'),
                'npwp' => $this->input->post('npwp'),
                'propinsi' => $this->input->post('propinsi'),
                'kota' => $this->input->post('kota'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'tipebu' => $this->input->get('tipebu'),
                'grade' => $this->input->get('grade')
            ];

            $data['searchprop'] = $searchprop;
            $this->session->set_userdata('searchprop', $searchprop);
        }
        else
        {
            $data['searchprop'] = $this->session->userdata('searchprop');
        }

        $config['total_rows'] = $this->Anggota_model->getAnggotaSearchNumRows($data['searchprop']);
        $this->pagination->initialize($config);
        $offset = $this->uri->segment(3);

        $anggotas = $this->Anggota_model->getAnggotaSearchPage($data['searchprop'], $config['per_page'], $offset);
        $data['anggotas'] = $anggotas;
        $data['startno'] = $offset + 1;

        // DropDownList Propinsi
        $propinsi = $this->Anggota_model->getPropinsiList();
        $data['propinsi'] = $propinsi;

        // DropDownList Kota
        $kota = $this->Anggota_model->getKotaByPropinsiList(0);
        $data['kota'] = $kota;
        
        $data['title'] = 'Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/indexscript');
        $this->load->view('templates/footerbegin');
    }

    public function view()
    {
        $config['reuse_query_string'] = true;
        
        $config['base_url'] = base_url('anggota/view');
        $config['per_page'] = 50;

        $searchprop = null;
        $searchprop = [
            'nrbu' => $this->input->get('nrbu'),
            'npwp' => $this->input->get('npwp'),
            'propinsi' => $this->input->get('propinsi'),
            'kota' => $this->input->get('kota'),
            'nama' => $this->input->get('nama'),
            'alamat' => $this->input->get('alamat'),
            'tipebu' => $this->input->get('tipebu'),
            'grade' => $this->input->get('grade')
        ];
        $data['searchprop'] = $searchprop;

        if ($data['searchprop'] != null)
        {
            $config['total_rows'] = $this->Anggota_model->getAnggotaSearchNumRows($data['searchprop']);
        }
        else
        {
            $config['total_rows'] = $this->Anggota_model->getAnggotaListNumRows();
        }
        
        $this->pagination->initialize($config);
        $offset = $this->uri->segment(3);

        if ($data['searchprop'] != null)
        {
            $anggotas = $this->Anggota_model->getAnggotaSearchPage($data['searchprop'], $config['per_page'], $offset);
        }
        else
        {
            $anggotas = $this->Anggota_model->getAnggotaListPage($config['per_page'], $offset);
        }
        
        $data['anggotas'] = $anggotas;
        $data['startno'] = $offset + 1;

        // DropDownList Propinsi
        $propinsi = $this->Anggota_model->getPropinsiList();
        $data['propinsi'] = $propinsi;

        $data['title'] = 'Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/view', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/viewscript');
        $this->load->view('templates/footerbegin');
    }

    public function display()
    {
        $config['reuse_query_string'] = true;
        
        $config['base_url'] = base_url('anggota/display');
        $config['per_page'] = 50;

        $searchprop = null;
        $searchprop = [
            'nrbu' => $this->input->get('nrbu'),
            'npwp' => $this->input->get('npwp'),
            'propinsi' => $this->input->get('propinsi'),
            'kota' => $this->input->get('kota'),
            'nama' => $this->input->get('nama'),
            'alamat' => $this->input->get('alamat'),
            'tipebu' => $this->input->get('tipebu'),
            'grade' => $this->input->get('grade'),
            'subbidang' => $this->input->get('subbidang')
        ];
        $data['searchprop'] = $searchprop;

        //if ($data['searchprop'] != null)
        //{
            $config['total_rows'] = $this->Anggota_model->getAnggotaSubBidangSearchNumRows($data['searchprop']);
        //}
        //else
        //{
        //    $config['total_rows'] = $this->Anggota_model->getAnggotaListNumRows();
        //}
        
        $this->pagination->initialize($config);
        $offset = $this->uri->segment(3);

        //if ($data['searchprop'] != null)
        //{
            $anggotas = $this->Anggota_model->getAnggotaSubBidangSearchPage($data['searchprop'], $config['per_page'], $offset);
        //}
        //else
        //{
        //    $anggotas = $this->Anggota_model->getAnggotaListPage($config['per_page'], $offset);
        //}
        
        $data['anggotas'] = $anggotas;
        $data['startno'] = $offset + 1;

        // DropDownList Propinsi
        $propinsi = $this->Anggota_model->getPropinsiList();
        $data['propinsi'] = $propinsi;

        $data['title'] = 'Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/display', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/viewscript');
        $this->load->view('templates/footerbegin');
    }

    // sama dengan method display cuma beda view
    public function display2()
    {
        $config['reuse_query_string'] = true;
        
        $config['base_url'] = base_url('anggota/display');
        $config['per_page'] = 50;

        $searchprop = null;
        $searchprop = [
            'nrbu' => $this->input->get('nrbu'),
            'npwp' => $this->input->get('npwp'),
            'propinsi' => $this->input->get('propinsi'),
            'kota' => $this->input->get('kota'),
            'nama' => $this->input->get('nama'),
            'alamat' => $this->input->get('alamat'),
            'tipebu' => $this->input->get('tipebu'),
            'grade' => $this->input->get('grade'),
            'subbidang' => $this->input->get('subbidang')
        ];
        $data['searchprop'] = $searchprop;

        //if ($data['searchprop'] != null)
        //{
            $config['total_rows'] = $this->Anggota_model->getAnggotaSubBidangSearchNumRows($data['searchprop']);
        //}
        //else
        //{
        //    $config['total_rows'] = $this->Anggota_model->getAnggotaListNumRows();
        //}
        
        $this->pagination->initialize($config);
        $offset = $this->uri->segment(3);

        //if ($data['searchprop'] != null)
        //{
            $anggotas = $this->Anggota_model->getAnggotaSubBidangSearchPage($data['searchprop'], $config['per_page'], $offset);
        //}
        //else
        //{
        //    $anggotas = $this->Anggota_model->getAnggotaListPage($config['per_page'], $offset);
        //}
        
        $data['anggotas'] = $anggotas;
        $data['startno'] = $offset + 1;

        // DropDownList Propinsi
        $propinsi = $this->Anggota_model->getPropinsiList();
        $data['propinsi'] = $propinsi;

        $data['title'] = 'Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/display2', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/viewscript');
        $this->load->view('templates/footerbegin');
    }

    public function displayjson()
    {
        $config['reuse_query_string'] = true;
        
        $config['base_url'] = base_url('anggota/display');
        $config['per_page'] = 50;

        $searchprop = null;
        $searchprop = [
            'nrbu' => $this->input->get('nrbu'),
            'npwp' => $this->input->get('npwp'),
            'propinsi' => $this->input->get('propinsi'),
            'kota' => $this->input->get('kota'),
            'nama' => $this->input->get('nama'),
            'alamat' => $this->input->get('alamat'),
            'tipebu' => $this->input->get('tipebu'),
            'grade' => $this->input->get('grade'),
            'subbidang' => $this->input->get('subbidang')
        ];
        $data['searchprop'] = $searchprop;

        $config['total_rows'] = $this->Anggota_model->getAnggotaSubBidangSearchNumRows($data['searchprop']);
        
        $this->pagination->initialize($config);
        $offset = $this->uri->segment(3);

        $anggotas = $this->Anggota_model->getAnggotaSubBidangSearchPage($data['searchprop'], $config['per_page'], $offset);
        
        $data['anggotas'] = $anggotas;
        $data['startno'] = $offset + 1;

        // DropDownList Propinsi
        $propinsi = $this->Anggota_model->getPropinsiList();
        $data['propinsi'] = $propinsi;



        header('Content-Type: application/json');
        echo json_encode($anggotas);
    }



    public function detail($Id)
    {
        $anggota = $this->Anggota_model->getAnggotaDetail($Id);
        $data['anggota'] = $anggota;

        $subbidang = $this->Anggota_model->getAnggotaSubBidang($Id);
        $data['subbidang'] = $subbidang;

        $data['title'] = 'Detail Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/detail', $data);
        $this->load->view('templates/footer');
    }

    public function detailview($Id)
    {
        $anggota = $this->Anggota_model->getAnggotaDetail($Id);
        $data['anggota'] = $anggota;

        $subbidang = $this->Anggota_model->getAnggotaSubBidang($Id);
        $data['subbidang'] = $subbidang;

        $data['title'] = 'Detail Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('anggota/detailview', $data);
        $this->load->view('templates/footer');
    }



    public function edit($Id)
    {
        // Set Form Validation

        $this->form_validation->set_rules('nrbu', 'NRBU', 'required|numeric');
        $this->form_validation->set_rules('tipebu', 'TipeBU', 'required');
        $this->form_validation->set_rules('namabu', 'NamaBU', 'required|trim');
        $this->form_validation->set_rules('npwp', 'NPWP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('propinsi', 'KodePropinsi', 'required');
        $this->form_validation->set_rules('kota', 'KodeKota', 'required');
        $this->form_validation->set_rules('kodepos', 'KodePos', 'numeric');
        $this->form_validation->set_rules('kekayaan', 'Kekayaan', 'numeric');



        if ($this->form_validation->run() == false)
        {
            // Load Current Data
        
            $anggota = $this->Anggota_model->getAnggotaDetail($Id);
            $data['anggota'] = $anggota;

            $subbidang = $this->Anggota_model->getAnggotaSubBidang($Id);
            $data['subbidang'] = $subbidang;

            $propinsi = $this->Anggota_model->getPropinsiList();
            $data['propinsi'] = $propinsi;

            $kota = $this->Anggota_model->getKotaByPropinsiList($anggota['KodePropinsi']);
            $data['kota'] = $kota;

            $tipebu = $this->Anggota_model->getTipeBUList();
            $data['tipebu'] = $tipebu;

            $jenisbu = $this->Anggota_model->getJenisBUList();
            $data['jenisbu'] = $jenisbu;

            $bentukbu = $this->Anggota_model->getBentukBUList();
            $data['bentukbu'] = $bentukbu;

            $grade = $this->Anggota_model->getGradeList();
            $data['grade'] = $grade;

            $listsubbidang = $this->Anggota_model->getSubBidangList();
            $data['listsubbidang'] = $listsubbidang;



            $data['title'] = 'Edit Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('anggota/edit', $data);
            $this->load->view('templates/footerbegin');
            $this->load->view('anggota/editscript');
            $this->load->view('templates/footerbegin');
        }
        else
        {
            $data = [
                'Id' => $Id,
                'NRBU' => $this->input->post('nrbu', true),
                'TipeBU' => $this->input->post('tipebu', true),
                'NamaBU' => $this->input->post('namabu', true),
                'NPWP' => $this->input->post('npwp', true),
                'Alamat' => $this->input->post('alamat', true),
                'KodePropinsi' => $this->input->post('propinsi', true),
                'KodeKota' => $this->input->post('kota', true),
                'KodePos' => $this->input->post('kodepos', true),
                'NoTelp' => $this->input->post('notelp', true),
                'Email' => $this->input->post('email', true),
                'Pemilik' => $this->input->post('pemilik', true),
                'JenisBU' => $this->input->post('jenisbu', true),
                'BentukBU' => $this->input->post('bentukbu', true),
                'Grade' => $this->input->post('grade', true),
                'Kekayaan' => $this->input->post('kekayaan', true)
            ];

            $this->Anggota_model->updateAnggota($data);
            $this->session->set_flashdata('message', 'Data Anggota berhasil diupdate!');
            $this->session->set_flashdata('msgclass', 'alert alert-success alert-dismissible fade show');
            redirect('anggota/edit/'.$Id);
        }
    }



    public function create()
    {
        // Set Form Validation

        $this->form_validation->set_rules('nrbu', 'NRBU', 'required|numeric');
        $this->form_validation->set_rules('tipebu', 'TipeBU', 'required');
        $this->form_validation->set_rules('namabu', 'NamaBU', 'required|trim');
        $this->form_validation->set_rules('npwp', 'NPWP', 'required|trim|is_unique[anggota.NPWP]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('propinsi', 'KodePropinsi', 'required');
        $this->form_validation->set_rules('kota', 'KodeKota', 'required');
        $this->form_validation->set_rules('kodepos', 'KodePos', 'numeric');
        $this->form_validation->set_rules('kekayaan', 'Kekayaan', 'numeric');



        if ($this->form_validation->run() == false)
        {
            $propinsi = $this->Anggota_model->getPropinsiList();
            $data['propinsi'] = $propinsi;

            $tipebu = $this->Anggota_model->getTipeBUList();
            $data['tipebu'] = $tipebu;

            $jenisbu = $this->Anggota_model->getJenisBUList();
            $data['jenisbu'] = $jenisbu;

            $bentukbu = $this->Anggota_model->getBentukBUList();
            $data['bentukbu'] = $bentukbu;

            $grade = $this->Anggota_model->getGradeList();
            $data['grade'] = $grade;



            $data['title'] = 'Create Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('anggota/create', $data);
            $this->load->view('templates/footerbegin');
            $this->load->view('anggota/editscript');
            $this->load->view('templates/footerbegin');
        }
        else
        {
            $data = [
                'NRBU' => $this->input->post('nrbu', true),
                'TipeBU' => $this->input->post('tipebu', true),
                'NamaBU' => $this->input->post('namabu', true),
                'NPWP' => $this->input->post('npwp', true),
                'Alamat' => $this->input->post('alamat', true),
                'KodePropinsi' => $this->input->post('propinsi', true),
                'KodeKota' => $this->input->post('kota', true),
                'KodePos' => $this->input->post('kodepos', true),
                'NoTelp' => $this->input->post('notelp', true),
                'Email' => $this->input->post('email', true),
                'Pemilik' => $this->input->post('pemilik', true),
                'JenisBU' => $this->input->post('jenisbu', true),
                'BentukBU' => $this->input->post('bentukbu', true),
                'Grade' => $this->input->post('grade', true),
                'Kekayaan' => $this->input->post('kekayaan', true)
            ];

            $this->Anggota_model->insertAnggota($data);
            $this->session->set_flashdata('message', 'Data Anggota berhasil diinsert!');
            $this->session->set_flashdata('msgclass', 'alert alert-success alert-dismissible fade show');
            redirect('anggota');
        }
    }

    public function delete($Id)
    {
        $this->Anggota_model->deleteAnggota($Id);
        $this->session->set_flashdata('message', 'Data Anggota berhasil didelete!');
        $this->session->set_flashdata('msgclass', 'alert alert-success alert-dismissible fade show');
        redirect('anggota');
    }



    public function insertSubBidang($AnggotaId)
    {
        $data = [
            'AnggotaId' => $AnggotaId,
            'SubBidangCode' => $this->input->post('subbidang', true)
        ];

        $this->Anggota_model->insertSubBidang($data);
        $this->session->set_flashdata('message', 'Sub Bidang berhasil ditambah!');
        $this->session->set_flashdata('msgclass', 'alert alert-success alert-dismissible fade show');
        redirect('anggota/edit/'.$AnggotaId);
    }

    public function deleteSubBidang($AnggotaId, $SubBidangId)
    {
        $this->Anggota_model->deleteSubBidang($SubBidangId);
        $this->session->set_flashdata('message', 'Sub Bidang berhasil didelete!');
        $this->session->set_flashdata('msgclass', 'alert alert-success alert-dismissible fade show');
        redirect('anggota/edit/'.$AnggotaId);
    }



    public function getPropinsiJson()
    {
        $propinsi = $this->Anggota_model->getPropinsiList();

        header('Content-Type: application/json');
        echo json_encode($propinsi);
    }
    
    public function getKotaByPropinsiJson($PropinsiId)
    {
        $kota = $this->Anggota_model->getKotaByPropinsiList($PropinsiId);

        header('Content-Type: application/json');
        echo json_encode($kota);
    }
}
