<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Importnilaiun extends CI_Controller
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
            $this->load->view('master/import/importnilaiun', $data);
            $this->load->view('templates/admin_footer');
        }
    }

    public function downloadformat()
    {
        force_download('./assets/template/template_import_nilai_un.xlsx', NULL);
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
            $this->session->set_flashdata('alert', 'Import Nilai UN Siswa Gagal');
            //redirect halaman
            redirect(base_url('master/importnilaiun/'));
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./upload/excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $un = array();

            $judul = $sheet[1]['A'];

            if ($judul == 'Blangko Import Nilai UN') {

                $numrow = 3;
                foreach ($sheet as $row) {
                    $no = $row['A'];
                    $nama = $row['B'];
                    $no_pes = $row['C'];
                    $mapel_pil = ucwords($row['D']);
                    $bin = $row['E'];
                    $bing = $row['F'];
                    $mat = $row['G'];
                    $pil = $row['H'];
                    $ket = strtoupper($row['I']);

                    if (empty($no) && empty($nama) && empty($no_pes) &&  empty($mapel_pil) &&  empty($bin) &&  empty($bing) &&  empty($mat) &&  empty($pil) &&  empty($ket)) continue;

                    $cek = $this->db->get_where('t_n_un', ["no_pes" => $no_pes])->num_rows();

                    if ($numrow > 4) {
                        array_push($un, [
                            'no_pes'    => $no_pes,
                            'mapel_pil' => $mapel_pil,
                            'bin'       => $bin,
                            'bing'      => $bing,
                            'mat'       => $mat,
                            'pil'       => $pil,
                            'ket'       => $ket,
                            'tahun'     => date('Y'),
                        ]);
                    }
                    $numrow++;
                }

                $history = [
                    'kegiatan' => 'Import Nilai UN Siswa',
                    'oleh' => $this->session->userdata('email'),
                    'waktu' => NULL
                ];

                if ($cek > 0) {
                    $this->db->update_batch('t_n_un', $un, 'no_pes');
                } else {
                    $this->db->insert_batch('t_n_un', $un);
                }

                $this->db->insert('t_history', $history);
                //delete file from server
                unlink('./upload/excel/' . $data_upload['file_name']);

                //upload success
                $this->session->set_flashdata('alert', 'Import Nilai UN Siswa Berhasil');
                //redirect halaman
                redirect(base_url('master/nilaiun/'));
            } else {
                //upload gagal
                $this->session->set_flashdata('alert', 'Blangko Import Salah');
                //redirect halaman
                redirect(base_url('master/importnilaiun/'));
            }
        }
    }
}
