<?php

class Anggota_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    

    function getAnggotaList()
    {
        return $this->db->get('viewanggotalist', 50, 1)->result_array();
    }

    // List Anggota Tanpa Search
    function getAnggotaListNumRows()
    {
        return $this->db->get('viewanggotalist')->num_rows();
    }

    // List Anggota Tanpa Search
    function getAnggotaListPage($limit, $offset)
    {
        return $this->db->get('viewanggotalist', $limit, $offset)->result_array();
    }

    // List Anggota Dengan Search
    function getAnggotaSearchNumRows($searchprop)
    {
        $nrbu = $searchprop['nrbu'];
        $npwp = $searchprop['npwp'];
        $propinsi = $searchprop['propinsi'];
        $kota = $searchprop['kota'];
        $nama = $searchprop['nama'];
        $alamat = $searchprop['alamat'];

        $tipebu = $searchprop['tipebu'];
        $grade = $searchprop['grade'];

        $this->db->reset_query();
        
        if ($nrbu != '')
        {
            $this->db->where(['NRBU' => $nrbu]);
        }

        if ($npwp != '')
        {
            $this->db->where(['NPWP' => $npwp]);
        }

        if ($propinsi != '')
        {
            $this->db->where(['KodePropinsi' => $propinsi]);
        }

        if ($kota != '')
        {
            $this->db->where(['KodeKota' => $kota]);
        }

        if ($nama != '')
        {
            $this->db->like(['NamaBU' => $nama]);
        }

        if ($alamat != '')
        {
            $this->db->like(['Alamat' => $alamat]);
        }



        if ($tipebu != '')
        {
            $this->db->where(['TipeBU' => $tipebu]);
        }

        if ($grade != '')
        {
            $this->db->where(['Grade' => $grade]);
        }



        return $this->db->get('viewanggotalist')->num_rows();
    }

    // List Anggota Dengan Search
    function getAnggotaSearchPage($searchprop, $limit, $offset)
    {
        $nrbu = $searchprop['nrbu'];
        $npwp = $searchprop['npwp'];
        $propinsi = $searchprop['propinsi'];
        $kota = $searchprop['kota'];
        $nama = $searchprop['nama'];
        $alamat = $searchprop['alamat'];

        $tipebu = $searchprop['tipebu'];
        $grade = $searchprop['grade'];

        $this->db->reset_query();
        
        if ($nrbu != '')
        {
            $this->db->where(['NRBU' => $nrbu]);
        }

        if ($npwp != '')
        {
            $this->db->where(['NPWP' => $npwp]);
        }

        if ($propinsi != '')
        {
            $this->db->where(['KodePropinsi' => $propinsi]);
        }

        if ($kota != '')
        {
            $this->db->where(['KodeKota' => $kota]);
        }

        if ($nama != '')
        {
            $this->db->like(['NamaBU' => $nama]);
        }

        if ($alamat != '')
        {
            $this->db->like(['Alamat' => $alamat]);
        }



        if ($tipebu != '')
        {
            $this->db->where(['TipeBU' => $tipebu]);
        }

        if ($grade != '')
        {
            $this->db->where(['Grade' => $grade]);
        }

        

        return $this->db->get('viewanggotalist', $limit, $offset)->result_array();
    }

    // List Anggota Plus SubBidang Dengan Search
    function getAnggotaSubBidangSearchNumRows($searchprop)
    {
        $nrbu = $searchprop['nrbu'];
        $npwp = $searchprop['npwp'];
        $propinsi = $searchprop['propinsi'];
        $kota = $searchprop['kota'];
        $nama = $searchprop['nama'];
        $alamat = $searchprop['alamat'];

        $tipebu = $searchprop['tipebu'];
        $grade = $searchprop['grade'];
        $subbidang = $searchprop['subbidang'];

        $this->db->reset_query();
        $this->db->distinct();
        $this->db->select('Id, NRBU, TipeBU, TipeBUName, NamaBU, NPWP, Alamat, KodeKota, KotaName, KodePropinsi, PropinsiName');
        //$this->db->from('viewanggotasubbidanglist');
        
        if ($nrbu != '')
        {
            $this->db->where(['NRBU' => $nrbu]);
        }

        if ($npwp != '')
        {
            $this->db->where(['NPWP' => $npwp]);
        }

        if ($propinsi != '')
        {
            $this->db->where(['KodePropinsi' => $propinsi]);
        }

        if ($kota != '')
        {
            $this->db->where(['KodeKota' => $kota]);
        }

        if ($nama != '')
        {
            $this->db->like(['NamaBU' => $nama]);
        }

        if ($alamat != '')
        {
            $this->db->like(['Alamat' => $alamat]);
        }



        if ($tipebu != '')
        {
            $this->db->where(['TipeBU' => $tipebu]);
        }

        if ($grade != '')
        {
            $this->db->where(['Grade' => $grade]);
        }

        if ($subbidang != '')
        {
            $this->db->where(['SubBidangCode' => $subbidang]);
        }



        return $this->db->get('viewanggotasubbidanglist')->num_rows();
    }

    // List Anggota Plus SubBidangDengan Search
    function getAnggotaSubBidangSearchPage($searchprop, $limit, $offset)
    {
        $nrbu = $searchprop['nrbu'];
        $npwp = $searchprop['npwp'];
        $propinsi = $searchprop['propinsi'];
        $kota = $searchprop['kota'];
        $nama = $searchprop['nama'];
        $alamat = $searchprop['alamat'];

        $tipebu = $searchprop['tipebu'];
        $grade = $searchprop['grade'];
        $subbidang = $searchprop['subbidang'];

        $this->db->reset_query();
        $this->db->distinct();
        $this->db->select('Id, NRBU, TipeBU, TipeBUName, NamaBU, NPWP, Alamat, KodeKota, KotaName, KodePropinsi, PropinsiName');
        //$this->db->from('viewanggotasubbidanglist');
        
        if ($nrbu != '')
        {
            $this->db->where(['NRBU' => $nrbu]);
        }

        if ($npwp != '')
        {
            $this->db->where(['NPWP' => $npwp]);
        }

        if ($propinsi != '')
        {
            $this->db->where(['KodePropinsi' => $propinsi]);
        }

        if ($kota != '')
        {
            $this->db->where(['KodeKota' => $kota]);
        }

        if ($nama != '')
        {
            $this->db->like(['NamaBU' => $nama]);
        }

        if ($alamat != '')
        {
            $this->db->like(['Alamat' => $alamat]);
        }



        if ($tipebu != '')
        {
            $this->db->where(['TipeBU' => $tipebu]);
        }

        if ($grade != '')
        {
            $this->db->where(['Grade' => $grade]);
        }

        if ($subbidang != '')
        {
            $this->db->where(['SubBidangCode' => $subbidang]);
        }

        

        return $this->db->get('viewanggotasubbidanglist', $limit, $offset)->result_array();
    }



    // Detail Anggota
    function getAnggotaDetail($Id)
    {
        return $this->db->get_where('viewanggotadetail', ['Id' => $Id])->row_array();
    }

    // List Sub Bidang
    function getAnggotaSubBidang($Id)
    {
        return $this->db->get_where('viewanggotasubbidang', ['AnggotaId' => $Id])->result_array();
    }

    // Insert Sub Bidang
    function insertSubBidang($data)
	{
		$this->db->insert('anggotasubbidang', $data);
    }

    // Delete Sub Bidang
    function deleteSubBidang($Id)
    {
        $this->db->where('Id', $Id);
        $this->db->delete('anggotasubbidang');
    }



    // Update Anggota
    function updateAnggota($data)
    {
        $array = array(
            'NRBU' => $data['NRBU'],
            'TipeBU' => $data['TipeBU'],
            'NamaBU' => $data['NamaBU'],
            'NPWP' => $data['NPWP'],
            'Alamat' => $data['Alamat'],
            'KodePropinsi' => $data['KodePropinsi'],
            'KodeKota' => $data['KodeKota'],
            'KodePos' => $data['KodePos'],
            'NoTelp' => $data['NoTelp'],
            'Email' => $data['Email'],
            'Pemilik' => $data['Pemilik'],
            'JenisBU' => $data['JenisBU'],
            'BentukBU' => $data['BentukBU'],
            'Grade' => $data['Grade'],
            'Kekayaan' => $data['Kekayaan']
        );
        
        $this->db->where('Id', $data['Id']);
        $this->db->update('anggota', $array);
    }

    // Insert Anggota
    function insertAnggota($data)
    {
        $this->db->insert('anggota', $data);
    }

    // Delete Anggota
    function deleteAnggota($Id)
    {
        $this->db->where('Id', $Id);
        $this->db->delete('anggota');
    }



    // List Propinsi
    function getPropinsiList()
    {
        return $this->db->get('refpropinsi')->result_array();
    }

    // List Kota Per Propinsi
    function getKotaByPropinsiList($PropinsiId)
    {
        return $this->db->get_where('refkota', ['PropinsiId' => $PropinsiId])->result_array();
    }

    // List Tipe BU
    function getTipeBUList()
    {
        return $this->db->get('reftipebu')->result_array();
    }

    // List Jenis BU
    function getJenisBUList()
    {
        return $this->db->get('refjenisbu')->result_array();
    }

    // List Bentuk BU
    function getBentukBUList()
    {
        return $this->db->get('refbentukbu')->result_array();
    }

    // List Grade
    function getGradeList()
    {
        return $this->db->get('refgrade')->result_array();
    }

    // List Sub Bidang
    function getSubBidangList()
    {
        return $this->db->get('refsubbidang')->result_array();
    }



    // Desc Propinsi
    function getPropinsiName($PropinsiId)
    {
        $this->db->select('PropinsiName');
        $this->db->from('refpropinsi');
        $this->db->where('PropinsiId',$PropinsiId);
        $result =  $this->db->get()->row();
        return $result->PropinsiName;
    }

    // Desc Kota/Kabupaten
    function getKotaName($KotaId)
    {
        $this->db->select('KotaName');
        $this->db->from('refkota');
        $this->db->where('KotaId',$KotaId);
        $result =  $this->db->get()->row();
        return $result->KotaName;
    }

    function getTipeBUName($TipeBUCode)
    {
        $this->db->select('TipeBUName');
        $this->db->from('reftipebu');
        $this->db->where('TipeBUCode',$TipeBUCode);
        $result =  $this->db->get()->row();
        return $result->TipeBUName;
    }

    function getGradeName($GradeCode)
    {
        $this->db->select('GradeName');
        $this->db->from('refgrade');
        $this->db->where('GradeCode',$GradeCode);
        $result =  $this->db->get()->row();
        return $result->GradeName;
    }
}