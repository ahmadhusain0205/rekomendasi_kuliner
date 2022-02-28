<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Manrating extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level_id') == 2) {
      redirect('Block');
    }
    $this->load->model('M_rating');
    logout();
  }
  public function index()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manrating' => $this->db->query('select r.id, r.culinary_id, r.user_id, r.nilai_tempat, r.nilai_pemandangan, r.nilai_pelayanan, r.nilai_kecepatan_saji, r.total_nilai, c.name , u.username from rating r join culinary c on r.culinary_id=c.culinary_id join user u on r.user_id=u.user_id')->result()
    ];
    $this->template->load('Template', 'Manrating/Data', $data);
  }
  public function import()
  {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'xlsx|xls';
    $config['file_name'] = 'barang' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('import')) {
      $file = $this->upload->data();
      $reader = ReaderEntityFactory::createXLSXReader();

      $reader->open('uploads/' . $file['file_name']);
      foreach ($reader->getSheetIterator() as $sheet) {
        $numRow = 1;
        foreach ($sheet->getRowIterator() as $row) {
          if ($numRow > 1) {
            $data = [
              'culinary_id' => $row->getCellAtIndex(0),
              'user_id' => $row->getCellAtIndex(1),
              'nilai_tempat' => $row->getCellAtIndex(2),
              'nilai_pelayanan' => $row->getCellAtIndex(3),
              'nilai_pemandangan' => $row->getCellAtIndex(4),
              'nilai_kecepatan_saji' => $row->getCellAtIndex(5),
              'total_nilai' => $row->getCellAtIndex(6)
            ];
            $this->M_rating->import($data);
          }
          $numRow++;
        }
        $reader->close();
        unlink('uploads/' . $file['file_name']);
        $this->session->set_flashdata(
          'message',
          '<div class="btn btn-outline-light btn-sm" role="alert">
              berhasil mengunggah data!
          </div>'
        );
        redirect('Manrating');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="btn btn-outline-danger btn-sm" role="alert">
            gagal mengunggah data!
        </div>'
      );
      redirect('Manrating');
    }
  }
  public function delete($id)
  {
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->delete('rating');
    $this->session->set_flashdata(
      'message',
      '<div class="btn btn-outline-light btn-sm" role="alert">
          berhasil menghapus barang!
      </div>'
    );
    redirect('Manrating');
  }
  public function export()
  {
    $data['rating'] = $this->db->get('rating')->result();
    $this->load->view('Manrating/Export', $data);
  }
}
