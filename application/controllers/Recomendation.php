<?php
class Recomendation extends CI_Controller
{
  public function index()
  {
    // $data_x = $this->db->query('SELECT user_id, culinary_id, total_nilai FROM rating WHERE user_id in (SELECT user_id FROM rating WHERE total_nilai is not null)')->result();
    // $data_y = $this->db->query('SELECT user_id, culinary_id, total_nilai FROM data_x WHERE culinary_id not in (SELECT culinary_id from data_x WHERE total_nilai is null)')->result();
    // $data_z = $this->db->query('SELECT a.culinary_id, a.total_nilai as target, (SELECT b.total_nilai FROM `data_y` b WHERE b.user_id in (SELECT user_id FROM user_data_null) AND b.culinary_id=a.culinary_id LIMIT 1) as objek FROM `data_y` a WHERE a.user_id not in (SELECT user_id FROM user_data_null)')->result();
    // $objek = $this->db->query('SELECT a.culinary_id, a.total_nilai as objek FROM `data_y` a WHERE a.user_id not in (SELECT user_id FROM user_data_null)')->result();
    // $target = $this->db->query('SELECT a.culinary_id, a.total_nilai as target FROM `data_y` a WHERE a.user_id in (SELECT user_id FROM user_data_null)')->result();
    // $pembilang = $this->db->query('SELECT c.user_id as user_objek, d.user_id as user_target, sum(c.nilai_objek*d.nilai_target) as pembilang FROM objek c JOIN target d on c.culinary_id=d.culinary_id GROUP BY d.user_id, c.user_id')->result();
    // $penyebut = $this->db->query('SELECT a.user_id, (SELECT akar FROM akar_target WHERE user_id = '.$this->session->userdata('user_id').')*a.akar as penyebut FROM akar_objek a;')->result();
    // $akar_target = $this->db->query('SELECT b.user_id, sqrt(sum(pow(b.total_nilai, 2))) as akar_target FROM data_y b WHERE b.user_id in (SELECT user_id FROM user_data_null) GROUP BY b.user_id')->result();
    // $akar_objek = $this->db->query('SELECT b.user_id, sqrt(sum(pow(b.total_nilai, 2))) as akar_objek FROM data_y b WHERE b.user_id not in (SELECT user_id FROM user_data_null) GROUP BY b.user_id')->result();
    // $allnull = $this->db->query('SELECT user_id FROM rating WHERE user_id not in (SELECT user_id FROM rating WHERE total_nilai is not null) group by user_id')->result();


    $penyebut = $this->db->query('SELECT a.user_id, (SELECT akar FROM akar_target WHERE user_id = ' . $this->session->userdata('user_id') . ')*a.akar as penyebut FROM akar_objek a')->result();
    $un = $this->db->query('select user_id, count(user_id) as cnt from all_null where user_id = ' . $this->session->userdata('user_id'))->row_array();
    if ($un['user_id'] == null) {
      if ($this->session->userdata('user_id') != $un['user_id']) {
        $user_null = $this->db->query('select user_id from user_data_null where user_id =' . $this->session->userdata('user_id'))->row_array();
        if ($user_null) {
          foreach ($penyebut as $p) {
            $similarity = $this->db->query('select a.user_objek, a.pembilang, a.pembilang/' . $p->penyebut . ' as similarity from pembilang a where a.user_objek = ' . $p->user_id . ' and a.user_target = ' . $this->session->userdata('user_id'))->result();
            foreach ($similarity as $s) {
              $x[] = $s->similarity;
            }
          }
          if (empty($x)) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['culinary'] = $this->db->query('select c.culinary_id, c.image, c.name, c.address, c.wifi_id, c.link, (select sum(r.nilai_tempat)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_tempat, (select sum(r.nilai_pemandangan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pemandangan, (select sum(r.nilai_pelayanan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pelayanan, (select sum(r.nilai_kecepatan_saji)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_kecepatan_saji, (select sum(r.total_nilai)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as total_nilai from culinary c where c.culinary_id in (select culinary_id from rating where user_id = ' . $this->session->userdata('user_id') . ' and total_nilai is null) ORDER BY total_nilai DESC')->result();
            $this->template->load('Template', 'Recomendation/data', $data);
          } else {
            $xx = max($x);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            foreach ($penyebut as $p) {
              $cek_user = $this->db->query('select a.user_objek, a.pembilang, a.pembilang/' . $p->penyebut . ' as similarity from pembilang a where a.user_objek = ' . $p->user_id . ' and a.user_target = ' . $this->session->userdata('user_id') . ' group by a.user_objek having similarity = ' . $xx . ' limit 1')->result();
              foreach ($cek_user as $cu) {
                $abc = $cu->user_objek;
              }
            }


            // foreach ($cek_user as $cu) {
            // $z = $cu->user_objek;
            // $select_kuliner = $this->db->query('select culinary_id from rating where user_id = ' . $z . ' and culinary_id in (select culinary_id from rating where user_id = ' . $this->session->userdata('user_id') . ' AND total_nilai is null) order by total_nilai desc')->result();


            $data['culinary'] = $this->db->query('SELECT r.user_id, r.total_nilai, c.culinary_id, c.image, c.name, c.address, c.wifi_id, c.link, c.is_actived from rating r join culinary c on r.culinary_id=c.culinary_id where user_id = ' . $abc . ' and c.culinary_id in (select culinary_id from rating where user_id = ' . $this->session->userdata('user_id') . ' AND total_nilai is null) order by total_nilai desc')->result();


            // foreach ($select_kuliner as $sk) {
            // $data['culinary'] = $this->db->query('select * from culinary where culinary_id = ' . $sk->culinary_id . ' GROUP BY name')->result();
            // }


            $this->template->load('Template', 'Recomendation/Data', $data);


            // }
          }
        } else {
          $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
          $this->template->load('Template', 'Recomendation/Kosong', $data);
        }
      } else {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Recomendation/Null', $data);
      }
    } else {
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
      $this->template->load('Template', 'Recomendation/Null', $data);
    }
  }
}
