<?php
class Laporan_pdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        authcek();
        mhscek();
    }

    public function cetaknilai($id_mhs)
    {
        $this->load->model('Magang_model');
        $f = $this->Magang_model->get_tbl_magang_to_mhs($id_mhs);
        $data['form'] = $f[0];
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('mhs_magang/laporan_pdf', $data);
    }
}
