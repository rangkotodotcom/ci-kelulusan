<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();

        $data['title'] = 'Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['system'] = $this->db->get('t_system')->row();

        $this->load->view('templates/index_header', $data);
        $this->load->view('index/index', $data);
        $this->load->view('templates/index_footer', $data);
    }

    public function hasil()
    {
        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib di isi!'
        ]);

        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['profilsekolah'] = $this->Index_model->Profil_sekolah();

            $data['title'] = 'Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
            $data['system'] = $this->db->get('t_system')->row();

            $this->load->view('templates/index_header', $data);
            $this->load->view('index/index', $data);
            $this->load->view('templates/index_footer');
        } else {
            $this->_hasil();
        }
    }

    private function _hasil()
    {
        $no_pes = $this->input->post('no_pes');
        $tgl_lhr = $this->input->post('tgl_lhr');
        $data['system'] = $this->db->get('t_system')->row();

        $profilsekolah = $this->Index_model->Profil_sekolah();

        $cek_no_pes = $this->db->get_where('t_bio_siswa', ['no_pes' => $no_pes, 'tahun' => $data['system']->tahun_data])->row_array();
        $cek_tgl_lhr = $this->db->get_where('t_bio_siswa', ['tgl_lhr' => $tgl_lhr, 'tahun' => $data['system']->tahun_data])->row_array();
        $nilai = $this->db->get_where('t_n_un', ['no_pes' => $no_pes, 'tahun' => $data['system']->tahun_data])->row_array();
        $izin = $this->db->get_where('t_adm', ['no_pes' => $no_pes, 'tahun_adm' => $data['system']->tahun_data])->row_array();

        if ($cek_no_pes) {
            if ($cek_tgl_lhr) {
                $data =  [
                    'nama'      => $cek_no_pes['nama'],
                    't_lahir'   => $cek_no_pes['t_lahir'],
                    'tgl_lhr'   => $cek_no_pes['tgl_lhr'],
                    'n_ortu'    => $cek_no_pes['n_ortu'],
                    'nis'       => $cek_no_pes['nis'],
                    'nisn'      => $cek_no_pes['nisn'],
                    'no_pes'    => $cek_no_pes['no_pes'],
                    'jurusan'   => $cek_no_pes['jurusan'],
                    'foto'      => $cek_no_pes['foto'],
                    'mapel_pil' => $nilai['mapel_pil'],
                    'bin'       => $nilai['bin'],
                    'bing'      => $nilai['bing'],
                    'mat'       => $nilai['mat'],
                    'pil'       => $nilai['pil'],
                    'ket'       => $nilai['ket'],
                    'pustaka'   => $izin['pustaka'],
                    'komite'    => $izin['komite']
                ];

                if ($nilai['ket'] == 'L') {
                    $ket = "LULUS";
                } else {
                    $ket = "TIDAK LULUS";
                }

                $this->load->library('ciqrcode');

                $config['cacheable']    = true; //boolean, the default is true
                $config['cachedir']     = './upload/qrcode/cache/'; //string, the default is application/cache/
                $config['errorlog']     = './upload/qrcode/log/'; //string, the default is application/logs/
                $config['imagedir']     = './upload/qrcode/'; //direktori penyimpanan qr code
                $config['quality']      = true; //boolean, the default is true
                $config['size']         = '1024'; //interger, the default is 1024
                $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
                $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
                $this->ciqrcode->initialize($config);

                $image_name = $no_pes . '.png'; //buat name dari qr code sesuai dengan no_pes

                $data_code = 'Siswa yang bernama ' . $cek_no_pes['nama'] . ' dengan No Peserta ' . $cek_no_pes['no_pes'] . ' Dinyatakan ' . $ket . ' dari ' . $profilsekolah['nama_sekolah'];

                $params['data'] = $data_code; //data yang akan di jadikan QR CODE
                $params['level'] = 'H'; //H=High
                $params['size'] = 10;
                $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder upload/qrcode/
                $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


                $data['system'] = $this->db->get('t_system')->row();
                $cek_qr = $this->db->get_where('t_code', ['no_pes' => $no_pes, 'tahun_code' => $data['system']->tahun_data])->num_rows();

                if ($cek_qr < 1) {
                    $qr = [
                        'no_pes' => $no_pes,
                        'qrcode' => $image_name,
                        'tahun_code' => date('Y')
                    ];

                    $this->db->insert('t_code', $qr);
                } else {
                    $this->db->set('qrcode', $image_name);
                    $this->db->where('no_pes', $no_pes);
                    $this->db->update('t_code');
                }

                $this->session->set_flashdata('hasil', $data);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('alert', 'Tanggal Lahir Tidak Sesuai');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('alert', 'No Peserta Tidak Ditemukan');
            redirect(base_url());
        }
    }

    public function printskl($no_pes = null)
    {
        if (!isset($no_pes)) {
            redirect(base_url());
        }

        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();
        $data['blangkosurat'] = $this->Index_model->Blangko_surat();

        $data['title'] = 'Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['system'] = $this->db->get('t_system')->row();
        $data['skl'] = $this->_dataskl($no_pes, $data['system']->tahun_data);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_left' => 25, 'margin_right' => 25, 'margin_top' => 10]);

        $mpdf->SetWatermarkImage(base_url('assets/img/pdd.png'));
        $mpdf->showWatermarkImage = true;
        $mpdf->watermarkImageAlpha = 0.2;

        $mpdf->SetAuthor($data['profilsekolah']['nama_sekolah']);
        $mpdf->SetCreator('ICT ' . $data['profilsekolah']['nama_sekolah']);
        $mpdf->SetSubject($no_pes);


        $html1 = $this->load->view('index/printskl_dy', $data, true);
        $mpdf->WriteHTML($html1);
        $mpdf->SetHTMLFooter('
<table width="100%" style="border-top:1px solid; font-size:10px;">
    <tr>
        <td width="37%"><i>' . $data["skl"]["nama"] . '</i></td>
        <td width="27%" align="center">' .  $data['profilsekolah']['nama_sekolah'] . '</td>
        <td width="37%" align="right"><i>' . $data["skl"]["nisn"] . '</i></td>
        
    </tr>
</table>');

        $mpdf->Output('SKL-' . $no_pes . '.pdf', 'D');

        redirect(base_url());
    }

    public function printnilaiskl($no_pes = null)
    {
        if (!isset($no_pes)) {
            redirect(base_url());
        }

        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();
        $data['blangkosurat'] = $this->Index_model->Blangko_surat();

        $data['title'] = 'Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['system'] = $this->db->get('t_system')->row();
        $data['skl'] = $this->_dataskl($no_pes, $data['system']->tahun_data);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_left' => 25, 'margin_right' => 25]);

        $mpdf->SetWatermarkImage(base_url('assets/img/pdd.png'));
        $mpdf->showWatermarkImage = true;
        $mpdf->watermarkImageAlpha = 0.2;

        $mpdf->SetAuthor($data['profilsekolah']['nama_sekolah']);
        $mpdf->SetCreator('ICT ' . $data['profilsekolah']['nama_sekolah']);
        $mpdf->SetSubject($no_pes);

        $html2 = $this->load->view('index/printnilaiskl_dy', $data, true);
        $mpdf->WriteHTML($html2);
        $mpdf->SetHTMLFooter('
<table width="100%" style="border-top:1px solid; font-size:10px;">
    <tr>
        <td width="37%"><i>' . $data["skl"]["nama"] . '</i></td>
        <td width="27%" align="center">' .  $data['profilsekolah']['nama_sekolah'] . '</td>
        <td width="37%" align="right"><i>' . $data["skl"]["nisn"] . '</i></td>
        
    </tr>
</table>');


        $mpdf->Output('Nilai-' . $no_pes . '.pdf', 'D');

        redirect(base_url());
    }

    private function _dataskl($no_pes, $tahun_data)
    {

        $cek_no_pes = $this->db->get_where('t_bio_siswa', ['no_pes' => $no_pes, 'tahun' => $tahun_data])->row_array();
        $nilai = $this->db->get_where('t_n_un', ['no_pes' => $no_pes, 'tahun' => $tahun_data])->row_array();
        $nilai_rapor = $this->db->get_where('t_n_rapor', ['no_pes' => $no_pes, 'tahun' => $tahun_data])->row_array();
        $nilai_us = $this->db->get_where('t_n_us', ['no_pes' => $no_pes, 'tahun' => $tahun_data])->row_array();
        $qrcode = $this->db->get_where('t_code', ['no_pes' => $no_pes, 'tahun_code' => $tahun_data])->row_array();

        if ($cek_no_pes) {
            $data =  [
                'nama'          => $cek_no_pes['nama'],
                't_lahir'       => $cek_no_pes['t_lahir'],
                'tgl_lhr'       => $cek_no_pes['tgl_lhr'],
                'n_ortu'        => $cek_no_pes['n_ortu'],
                'nis'           => $cek_no_pes['nis'],
                'nisn'          => $cek_no_pes['nisn'],
                'no_pes'        => $cek_no_pes['no_pes'],
                'jurusan'       => $cek_no_pes['jurusan'],
                'foto'          => $cek_no_pes['foto'],
                'mapel_pil'     => $nilai['mapel_pil'],
                'bin'           => $nilai['bin'],
                'bing'          => $nilai['bing'],
                'mat'           => $nilai['mat'],
                'pil'           => $nilai['pil'],
                'ket'           => $nilai['ket'],
                'pai_rapor'     => $nilai_rapor['pai'],
                'ppkn_rapor'    => $nilai_rapor['ppkn'],
                'ind_rapor'     => $nilai_rapor['ind'],
                'mtk_rapor'     => $nilai_rapor['mtk'],
                'sejind_rapor'  => $nilai_rapor['sejind'],
                'ing_rapor'     => $nilai_rapor['ing'],
                'senbud_rapor'  => $nilai_rapor['senbud'],
                'pjok_rapor'    => $nilai_rapor['pjok'],
                'pkwu_rapor'    => $nilai_rapor['pkwu'],
                'mat_sej_rapor' => $nilai_rapor['mat_sej'],
                'fis_eko_rapor' => $nilai_rapor['fis_eko'],
                'kim_sos_rapor' => $nilai_rapor['kim_sos'],
                'bio_geo_rapor' => $nilai_rapor['bio_geo'],
                'lm_rapor'      => $nilai_rapor['lm'],
                'pai_us'        => $nilai_us['pai'],
                'ppkn_us'       => $nilai_us['ppkn'],
                'ind_us'        => $nilai_us['ind'],
                'mtk_us'        => $nilai_us['mtk'],
                'sejind_us'     => $nilai_us['sejind'],
                'ing_us'        => $nilai_us['ing'],
                'senbud_us'     => $nilai_us['senbud'],
                'pjok_us'       => $nilai_us['pjok'],
                'pkwu_us'       => $nilai_us['pkwu'],
                'mat_sej_us'    => $nilai_us['mat_sej'],
                'fis_eko_us'    => $nilai_us['fis_eko'],
                'kim_sos_us'    => $nilai_us['kim_sos'],
                'bio_geo_us'    => $nilai_us['bio_geo'],
                'lm_us'         => $nilai_us['lm'],
                'qrcode'        => $qrcode['qrcode']
            ];

            return $data;
        }
    }
}
