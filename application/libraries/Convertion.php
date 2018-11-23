<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Convertion {

    function get_kelurahan($id) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $hasil = '';

        $query = $CI->db_model->get('data_kelurahan', '*', array('id_kel' => $id))->row();
        //echo $CI->db->last_query();exit;
        if (!empty($query)) {
            $hasil = isset($query->nama_kel) ? $query->nama_kel : '';
        }

        return $hasil;
    }

    function cek_verified($periode = null, $id_kelurahan = null) {
        $CI = & get_instance();
//        $id_anggaran_kelurahan = $CI->db->where('md5(id_kelurahan)', $id_kelurahan)
//                        ->get('anggaran_kelurahan')->row()->id_anggaran_kelurahan;

        $data = $CI->db
//                ->where('id_anggaran_kelurahan', $id_anggaran_kelurahan)
                ->like('tgl_realisasi', $periode)
                ->get('realisasi_anggaran');

        $hasil = 1;
        if ($data->num_rows() > 0) {
            foreach ($data->result() AS $row) {
                if ($row->verified == 0)
                    $hasil = 0;
            }
        }else {
            $hasil = 0;
        }

        return $hasil;
    }

    function notif($periode = null, $id_kelurahan = null, $id_anggaran = null) {
        # realisasi_anggaran where verified = 0, id_anggaran_kelurahan, tgl_realisasi
        # id_anggaran_kelurahan => anggaran_kelurahan where id_anggaran, id_kelurahan

        $CI = & get_instance();

        $hasil = 0;
        $anggaran_kelurahan = $CI->db->where('id_kelurahan', $id_kelurahan)
                        ->where('id_anggaran', $id_anggaran)
                        ->get('anggaran_kelurahan')->row();

        $id_anggaran_kelurahan = $anggaran_kelurahan->id_anggaran_kelurahan;
        $realisasi_anggaran = $CI->db->where('id_anggaran_kelurahan', $id_anggaran_kelurahan)
                ->where('verified', 0)
                ->like('tgl_realisasi', $periode)
                ->get('realisasi_anggaran');

        if ($realisasi_anggaran->num_rows() > 0) {
            $hasil = $realisasi_anggaran->num_rows();
        }

        return $hasil;
    }

    function anggaran_terpakai($periode = null, $id_kelurahan = null, $id_anggaran = null) {
        # realisasi_anggaran where verified = 0, id_anggaran_kelurahan, tgl_realisasi
        # id_anggaran_kelurahan => anggaran_kelurahan where id_anggaran, id_kelurahan

        $CI = & get_instance();

        $hasil = 0;
        $anggaran_kelurahan = $CI->db->where('id_kelurahan', $id_kelurahan)
                        ->where('id_anggaran', $id_anggaran)
                        ->get('anggaran_kelurahan')->row();

        $id_anggaran_kelurahan = $anggaran_kelurahan->id_anggaran_kelurahan;
        $realisasi_anggaran = $CI->db->where('id_anggaran_kelurahan', $id_anggaran_kelurahan)
                //->where('verified', 0)
                ->like('tgl_realisasi', $periode)
                ->get('realisasi_anggaran');

        //echo $CI->db->last_query();

        if ($realisasi_anggaran->num_rows() > 0) {
            foreach ($realisasi_anggaran->result() AS $row) {
                $nominal = isset($row->nominal_realisasi) ? $row->nominal_realisasi : 0;
                $hasil += $nominal;
            }
        }

        return $hasil;
    }

    function cek_verified_($periode = null, $id_kelurahan = null) {
        $CI = & get_instance();
        $id_anggaran_kelurahan = $CI->db->where('md5(id_kelurahan)', $id_kelurahan)
                        ->get('anggaran_kelurahan')->row()->id_anggaran_kelurahan;

        $data = $CI->db->where('id_anggaran_kelurahan', $id_anggaran_kelurahan)
                ->like('tgl_realisasi', $periode)
                ->get('realisasi_anggaran');

        $hasil = 1;
        if ($data->num_rows() > 0) {
            foreach ($data->result() AS $row) {
                if ($row->verified == 0)
                    $hasil = 0;
            }
        }else {
            $hasil = 0;
        }

        return $hasil;
    }

    function sisa_anggaran($tahun = null, $id_anggaran = null, $id_anggaran_kelurahan = null) {

        $CI = & get_instance();
        $total_spj = $sisa = $spj1 = $spj2 = $spj3 = (float) 0;

        if ($id_anggaran_kelurahan != null)
            $CI->db->where('b.id_anggaran_kelurahan', $id_anggaran_kelurahan);

        $q_realisasi = $CI->db->select('a.id_anggaran, b.id_anggaran_kelurahan, b.tgl_realisasi,'
                        . ' b.nominal_realisasi, b.jenis_spj')
                ->join('realisasi_anggaran b', 'b.id_anggaran_kelurahan = a.id_anggaran_kelurahan', 'left')
                ->from('anggaran_kelurahan a')
                ->where('a.flag = 0')
                ->like('b.tgl_realisasi', $tahun)
                ->where('b.tgl_realisasi IS NOT NULL', null, false)
                ->where('a.id_anggaran', $id_anggaran)
                ->get();

        if ($q_realisasi->num_rows() > 0) {
            foreach ($q_realisasi->result() AS $realisasi) {
                $jenis_spj = isset($realisasi->jenis_spj) ? $realisasi->jenis_spj : '';
                $nominal = isset($realisasi->nominal_realisasi) ? (float) $realisasi->nominal_realisasi : (float) 0;

                if ($jenis_spj == 1) {
                    $spj1 += $nominal;
                } else if ($jenis_spj == 2) {
                    $spj2 += $nominal;
                } else if ($jenis_spj == 3) {
                    $spj3 += $nominal;
                }
            }
        }
        $hasil = array(
            'spj1' => $spj1,
            'spj2' => $spj2,
            'spj3' => $spj3,
            'total_spj' => $spj1 + $spj2 + $spj3
        );

        return $hasil;
    }

    function sd_bulan_ini($periode = null, $id_anggaran = null, $id_anggaran_kelurahan = null) {

        $CI = & get_instance();
        $total_spj = $sisa = $spj1 = $spj2 = $spj3 = (float) 0;

        $pecah = explode('-', $periode);
        $tahun = $pecah[0];
        $bulan = (int) $pecah[1];

        for ($i = 1; $i <= $bulan; $i++) {
//        sprintf('%04d',$number);

            $period = $tahun . '-' . sprintf('%02d', $i);

            if ($id_anggaran_kelurahan != null)
                $CI->db->where('b.id_anggaran_kelurahan', $id_anggaran_kelurahan);

            $q_realisasi = $CI->db->select('a.id_anggaran, b.id_anggaran_kelurahan, b.tgl_realisasi,'
                            . ' b.nominal_realisasi, b.jenis_spj')
                    ->join('realisasi_anggaran b', 'b.id_anggaran_kelurahan = a.id_anggaran_kelurahan', 'left')
                    ->from('anggaran_kelurahan a')
                    ->where('a.flag = 0')
                    ->like('b.tgl_realisasi', $period)
                    ->where('b.tgl_realisasi IS NOT NULL', null, false)
                    ->where('a.id_anggaran', $id_anggaran)
                    ->get();

            if ($q_realisasi->num_rows() > 0) {
                foreach ($q_realisasi->result() AS $realisasi) {
                    $jenis_spj = isset($realisasi->jenis_spj) ? $realisasi->jenis_spj : '';
                    $nominal = isset($realisasi->nominal_realisasi) ? (float) $realisasi->nominal_realisasi : (float) 0;

                    if ($jenis_spj == 1) {
                        $spj1 += $nominal;
                    } else if ($jenis_spj == 2) {
                        $spj2 += $nominal;
                    } else if ($jenis_spj == 3) {
                        $spj3 += $nominal;
                    }
                }
            }
        }
        $hasil = array(
            'spj1' => $spj1,
            'spj2' => $spj2,
            'spj3' => $spj3,
            'total_spj' => $spj1 + $spj2 + $spj3
        );

        return $hasil;
    }

}

?>