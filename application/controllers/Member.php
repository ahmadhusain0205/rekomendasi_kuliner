<?php
class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') == 1) {
            redirect('Block');
        }
        logout();
    }
    public function index()
    {
        $data['persenuser'] = $this->db->get_where('user', 'level_id = 1')->num_rows();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kulter'] = $this->db->get_where('culinary', 'is_actived = 1')->num_rows();
        $data['kulaju'] = $this->db->get_where('culinary', 'is_actived = 0')->num_rows();
        $data['pengguna'] = $this->db->get_where('user', 'level_id = 2')->num_rows();
        $data['place'] = $this->db->query('select c.culinary_id, c.image, c.name, c.address, c.wifi_id, c.link, (select sum(r.nilai_tempat)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_tempat, (select sum(r.nilai_pemandangan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pemandangan, (select sum(r.nilai_pelayanan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pelayanan, (select sum(r.nilai_kecepatan_saji)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_kecepatan_saji, (select sum(r.total_nilai)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as total_nilai from culinary c ORDER BY total_nilai DESC limit 1')->row_array();
        $this->template->load('Template', 'Member/Dashboard', $data);
    }
}
