<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
    }

    public function index()
    {
        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/index');
        $this->load->view('templates/footer');
    }

    public function summary1()
    {
        $this->db->select('p.PropinsiId, p.PropinsiName as Propinsi, count(a.Id) as Jumlah');
        $this->db->from('refpropinsi p');
        $this->db->join('anggota a', 'a.KodePropinsi = p.PropinsiId', 'left');
        $this->db->group_by('p.PropinsiName');

        $orderby = $this->input->get('orderby');

        $data['orderbypropinsi'] = $orderby == 'propinsi' ? 'propinsi_desc' : 'propinsi';
        $data['orderbyjumlah'] = $orderby == 'jumlah' ? 'jumlah_desc' : 'jumlah';

        if ($orderby == 'propinsi')
        {
            $this->db->order_by('p.PropinsiName');
        }
        else if ($orderby == 'propinsi_desc')
        {
            $this->db->order_by('p.PropinsiName', 'DESC');
        }
        else if ($orderby == 'jumlah')
        {
            $this->db->order_by('count(a.Id)');
        }
        else if ($orderby == 'jumlah_desc')
        {
            $this->db->order_by('count(a.Id)', 'DESC');
        }
        else
        {
            $this->db->order_by('p.PropinsiId');
        }
        
        $result = $this->db->get()->result_array();
        $data['result'] = $result;

        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/summary1', $data);
        $this->load->view('templates/footer');
    }

    public function summary2($PropinsiId = NULL)
    {
        $data['propinsi'] = $this->db->get('refpropinsi')->result_array();

        $this->db->select('p.PropinsiId, p.PropinsiName, q.KotaId, q.KotaName, count(Id) as Jumlah');
        $this->db->from('refpropinsi p');
        $this->db->join('refkota q', 'p.PropinsiId = q.PropinsiId');
        $this->db->join('anggota a', 'a.KodePropinsi = p.PropinsiId and a.KodeKota = q.KotaId', 'left');
        if ($PropinsiId != '')
        {
            $this->db->where('p.PropinsiId',$PropinsiId);
        }
        $this->db->group_by('p.PropinsiId, q.KotaId');

        $orderby = $this->input->get('orderby');

        $data['orderbykota'] = $orderby == 'kota' ? 'kota_desc' : 'kota';
        $data['orderbyjumlah'] = $orderby == 'jumlah' ? 'jumlah_desc' : 'jumlah';

        if ($orderby == 'kota')
        {
            $this->db->order_by('q.KotaName');
        }
        else if ($orderby == 'kota_desc')
        {
            $this->db->order_by('q.KotaName', 'DESC');
        }
        else if ($orderby == 'jumlah')
        {
            $this->db->order_by('count(a.Id)');
        }
        else if ($orderby == 'jumlah_desc')
        {
            $this->db->order_by('count(a.Id)', 'DESC');
        }
        else
        {
            $this->db->order_by('p.PropinsiId, q.KotaId');
        }

        $result = $this->db->get()->result_array();
        $data['result'] = $result;

        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/summary2', $data);
        $this->load->view('templates/footer');
    }

    public function summary2z()
    {
        $PropinsiId = $this->input->post('propinsi', true);
        redirect('summary/summary2/'.$PropinsiId);
    }

    public function summary3($PropinsiId = NULL, $KotaId = NULL)
    {
        $data['propinsi'] = $this->db->get('refpropinsi')->result_array();

        $this->db->select('z.TipeBUCode, z.TipeBUName, count(Id) as Jumlah');
        $this->db->from('reftipebu z');
        $this->db->join('anggota a', 'a.TipeBU = z.TipeBUCode', 'left');
        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $this->db->where('a.KodePropinsi',$PropinsiId);
        }
        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $this->db->where('a.KodeKota',$KotaId);
        }
        $this->db->group_by('z.TipeBUCode');

        $result = $this->db->get()->result_array();
        $data['result'] = $result;

        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $data['propinsiname'] = $this->Anggota_model->getPropinsiName($PropinsiId);
        }
        else
        {
            $data['propinsiname'] = '';
        }

        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $data['kotaname'] = $this->Anggota_model->getKotaName($KotaId);
        }
        else
        {
            $data['kotaname'] = '';
        }

        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/summary3', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/indexscript');
        $this->load->view('templates/footerbegin');
    }

    public function summary3z()
    {
        $PropinsiId = $this->input->post('propinsi', true);
        $KotaId = $this->input->post('kota', true);
        if (($PropinsiId != '') && ($KotaId != ''))
        {
            redirect('summary/summary3/'.$PropinsiId.'/'.$KotaId);
        }
        else if ($PropinsiId != '')
        {
            redirect('summary/summary3/'.$PropinsiId);
        }
        else
        {
            redirect('summary/summary3');
        }
    }


    public function sumdisplay($PropinsiId = NULL, $KotaId = NULL)
    {
        $data['propinsi'] = $this->db->get('refpropinsi')->result_array();

        $this->db->select('z.TipeBUCode, z.TipeBUName, count(Id) as Jumlah');
        $this->db->from('reftipebu z');
        $this->db->join('anggota a', 'a.TipeBU = z.TipeBUCode', 'left');
        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $this->db->where('a.KodePropinsi',$PropinsiId);
        }
        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $this->db->where('a.KodeKota',$KotaId);
        }
        $this->db->group_by('z.TipeBUCode');

        $result = $this->db->get()->result_array();
        $data['result'] = $result;

        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $data['propinsiname'] = $this->Anggota_model->getPropinsiName($PropinsiId);
        }
        else
        {
            $data['propinsiname'] = '';
        }

        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $data['kotaname'] = $this->Anggota_model->getKotaName($KotaId);
        }
        else
        {
            $data['kotaname'] = '';
        }

        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/sumdisplay', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/indexscript');
        $this->load->view('templates/footerbegin');
    }


    public function summary4($PropinsiId = NULL, $KotaId = NULL)
    {
        $data['propinsi'] = $this->db->get('refpropinsi')->result_array();

        $this->db->select('z.GradeCode, z.GradeName, count(Id) as Jumlah');
        $this->db->from('refgrade z');
        $this->db->join('anggota a', 'a.Grade = z.GradeCode', 'left');
        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $this->db->where('a.KodePropinsi',$PropinsiId);
        }
        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $this->db->where('a.KodeKota',$KotaId);
        }
        $this->db->group_by('z.GradeCode');

        $result = $this->db->get()->result_array();
        $data['result'] = $result;

        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $data['propinsiname'] = $this->Anggota_model->getPropinsiName($PropinsiId);
        }
        else
        {
            $data['propinsiname'] = '';
        }

        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $data['kotaname'] = $this->Anggota_model->getKotaName($KotaId);
        }
        else
        {
            $data['kotaname'] = '';
        }

        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/summary4', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/indexscript');
        $this->load->view('templates/footerbegin');
    }

    public function summary4z()
    {
        $PropinsiId = $this->input->post('propinsi', true);
        $KotaId = $this->input->post('kota', true);
        if (($PropinsiId != '') && ($KotaId != ''))
        {
            redirect('summary/summary4/'.$PropinsiId.'/'.$KotaId);
        }
        else if ($PropinsiId != '')
        {
            redirect('summary/summary4/'.$PropinsiId);
        }
        else
        {
            redirect('summary/summary4');
        }
    }

    public function summary5($PropinsiId = NULL, $KotaId = NULL)
    {
        $data['propinsi'] = $this->db->get('refpropinsi')->result_array();

        $this->db->select('z.SubBidangCode, z.SubBidangName, count(distinct a.Id) as Jumlah');
        $this->db->from('refsubbidang z');
        $this->db->join('anggotasubbidang b', 'b.SubBidangCode = z.SubBidangCode', 'left');
        $this->db->join('anggota a', 'a.Id = b.AnggotaId', 'left');
        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $this->db->where('a.KodePropinsi',$PropinsiId);
        }
        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $this->db->where('a.KodeKota',$KotaId);
        }
        $this->db->group_by('z.SubbidangCode');

        $result = $this->db->get()->result_array();
        $data['result'] = $result;

        if (($PropinsiId != NULL) && ($PropinsiId != ''))
        {
            $data['propinsiname'] = $this->Anggota_model->getPropinsiName($PropinsiId);
        }
        else
        {
            $data['propinsiname'] = '';
        }

        if (($KotaId != NULL) && ($KotaId != ''))
        {
            $data['kotaname'] = $this->Anggota_model->getKotaName($KotaId);
        }
        else
        {
            $data['kotaname'] = '';
        }

        $data['title'] = 'Summary';
        $this->load->view('templates/header', $data);
        $this->load->view('summary/summary5', $data);
        $this->load->view('templates/footerbegin');
        $this->load->view('anggota/indexscript');
        $this->load->view('templates/footerbegin');
    }

    public function summary5z()
    {
        $PropinsiId = $this->input->post('propinsi', true);
        $KotaId = $this->input->post('kota', true);
        if (($PropinsiId != '') && ($KotaId != ''))
        {
            redirect('summary/summary5/'.$PropinsiId.'/'.$KotaId);
        }
        else if ($PropinsiId != '')
        {
            redirect('summary/summary5/'.$PropinsiId);
        }
        else
        {
            redirect('summary/summary5');
        }
    }
}