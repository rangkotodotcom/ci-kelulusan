<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Importnilairapor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'admin') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/import/importnilairapor', $data);
            $this->load->view('templates/admin_footer');
        }
    }

    public function downloadformat()
    {
        force_download('./assets/template/template_import_nilai_rapor.xlsx', NULL);
    }

    public function upload()
    {
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = './upload/excel/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('alert', 'Import Nilai Rapor Siswa Gagal');
            //redirect halaman
            redirect(base_url('master/importnilairapor/'));
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./upload/excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $rapor = array();

            $judul = $sheet[1]['A'];

            if ($judul == 'Blangko Import Nilai Rapor') {
                $numrow = 3;
                foreach ($sheet as $row) {

                    $no = $row['A'];
                    $nama = $row['B'];
                    $no_pes = $row['C'];
                    $pai = $row['D'];
                    $ppkn = $row['E'];
                    $ind = $row['F'];
                    $mtk = $row['G'];
                    $sejind = $row['H'];
                    $ing = $row['I'];
                    $senbud = $row['J'];
                    $pjok = $row['K'];
                    $pkwu = $row['L'];
                    $mat_sej = $row['M'];
                    $fis_eko = $row['N'];
                    $kim_sos = $row['O'];
                    $bio_geo = $row['P'];
                    $lm = $row['Q'];

                    if (empty($no) && empty($nama) &&  empty($no_pes) &&  empty($pai) &&  empty($ppkn) &&  empty($ind) &&  empty($mtk) &&  empty($sejind) &&  empty($ing) &&  empty($senbud) &&  empty($pjok) &&  empty($pkwu) &&  empty($mat_sej) &&  empty($fis_eko) &&  empty($kim_sos) &&  empty($bio_geo) &&  empty($lm)) continue;

                    $cek = $this->db->get_where('t_n_rapor', ["no_pes" => $no_pes])->num_rows();

                    if ($numrow > 4) {
                        array_push($rapor, [
                            'no_pes'    => $no_pes,
                            'pai'       => $pai,
                            'ppkn'      => $ppkn,
                            'ind'       => $ind,
                            'mtk'       => $mtk,
                            'sejind'    => $sejind,
                            'ing'       => $ing,
                            'senbud'    => $senbud,
                            'pjok'      => $pjok,
                            'pkwu'      => $pkwu,
                            'mat_sej'   => $mat_sej,
                            'fis_eko'   => $fis_eko,
                            'kim_sos'   => $kim_sos,
                            'bio_geo'   => $bio_geo,
                            'lm'        => $lm,
                            'tahun'     => date('Y'),
                        ]);
                    }
                    $numrow++;
                }

                $history = [
                    'kegiatan' => 'Import Nilai Rapor Siswa',
                    'oleh' => $this->session->userdata('email'),
                    'waktu' => NULL
                ];

                if ($cek > 0) {
                    $this->db->update_batch('t_n_rapor', $rapor, 'no_pes');
                } else {
                    $this->db->insert_batch('t_n_rapor', $rapor);
                }

                $this->db->insert('t_history', $history);
                //delete file from server
                unlink('./upload/excel/' . $data_upload['file_name']);

                //upload success
                $this->session->set_flashdata('alert', 'Import Nilai Rapor Siswa Berhasil');
                //redirect halaman
                redirect(base_url('master/nilairapor/'));
            } else {
                //upload gagal
                $this->session->set_flashdata('alert', 'Blangko Import Salah');
                //redirect halaman
                redirect(base_url('master/importnilairapor/'));
            }
        }
    }
}
