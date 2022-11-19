<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Importsiswa extends CI_Controller
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
            $this->load->view('master/import/importsiswa', $data);
            $this->load->view('templates/admin_footer');
        }
    }

    public function downloadformat()
    {
        force_download('./assets/template/template_import_siswa.xlsx', NULL);
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
            $this->session->set_flashdata('alert', 'Import Data Siswa Gagal');
            //redirect halaman
            redirect(base_url('master/importsiswa/'));
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./upload/excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $bio_siswa = array();

            $judul = $sheet[1]['A'];

            if ($judul == 'Blangko Import Data Diri') {

                $numrow = 3;
                foreach ($sheet as $row) {

                    $no = $row['A'];
                    $nama = strtoupper($row['B']);
                    $t_lahir = ucwords($row['C']);
                    $tgl_lhr = $row['D'];
                    $n_ortu = ucwords($row['E']);
                    $nis = $row['F'];
                    $nisn = $row['G'];
                    $no_pes = $row['H'];
                    $jurusan = strtoupper($row['I']);
                    $foto = $row['J'];

                    if (empty($no) && empty($nama) &&  empty($t_lahir) &&  empty($tgl_lhr) &&  empty($n_ortu) &&  empty($nis) &&  empty($nisn) &&  empty($no_pes) && empty($jurusan) &&  empty($foto)) continue;

                    $cek = $this->db->get_where('t_bio_siswa', ["no_pes" => $no_pes])->num_rows();

                    if ($numrow > 4) {
                        array_push($bio_siswa, [
                            'nama'      => $nama,
                            't_lahir'   => $t_lahir,
                            'tgl_lhr'   => $tgl_lhr,
                            'n_ortu'    => $n_ortu,
                            'nis'       => $nis,
                            'nisn'      => $nisn,
                            'no_pes'    => $no_pes,
                            'jurusan'   => $jurusan,
                            'foto'      => $foto,
                            'tahun'     => date('Y'),
                        ]);
                    }
                    $numrow++;
                }


                $history = [
                    'kegiatan' => 'Import Data Siswa',
                    'oleh' => $this->session->userdata('email'),
                    'waktu' => NULL
                ];

                if ($cek > 0) {
                    $this->db->update_batch('t_bio_siswa', $bio_siswa, 'no_pes');
                } else {
                    $this->db->insert_batch('t_bio_siswa', $bio_siswa);
                }

                $this->db->insert('t_history', $history);
                // delete file from server
                unlink('./upload/excel/' . $data_upload['file_name']);

                //upload success
                $this->session->set_flashdata('alert', 'Import Data Siswa Berhasil');
                //redirect halaman
                redirect(base_url('master/datadiri/'));
            } else {
                //upload gagal
                $this->session->set_flashdata('alert', 'Blangko Import Salah');
                //redirect halaman
                redirect(base_url('master/importsiswa/'));
            }
        }
    }
}
