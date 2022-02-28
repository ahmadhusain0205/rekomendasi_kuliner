<?php
class Culinary extends CI_Controller
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
        $data['culinary'] = $this->db->query('SELECT * FROM culinary WHERE is_actived = 1 ORDER BY name ASC')->result();
        $data['rating'] = $this->db->query('SELECT r.culinary_id, u.image, u.name, r.nilai_tempat as tempat, r.nilai_pelayanan as pelayan, r.nilai_pemandangan as view, r.nilai_kecepatan_saji as saji FROM rating r JOIN user u ON r.user_id=u.user_id WHERE culinary_id')->result();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data_rating'] = $this->db->get('rating')->result();
        $this->template->load('Template', 'Culinary/Data', $data);
    }
    public function add()
    {
        $this->form_validation->set_rules('name', 'nama kuliner', 'required');
        $this->form_validation->set_rules('address', 'alamat kuliner', 'required');
        $this->form_validation->set_rules('link', 'link map kuliner', 'required|valid_url');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="btn btn-outline-danger btn-sm" role="alert">
                    gagal mengajukan!
                </div>'
            );
            redirect('Culinary');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'link' => $this->input->post('link'),
                'image' => 'default.png',
                'wifi_id' => $this->input->post('wifi_id'),
                'is_actived' => 0
            ];
            $this->db->insert('culinary', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="btn btn-outline-light btn-sm" role="alert">
                    berhasil mengajukan!
                </div>'
            );
            redirect('Culinary');
        }
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['culinary'] = $this->db->query('SELECT * FROM culinary WHERE name LIKE "' . $keyword . '" OR name LIKE "%' . $keyword . '" OR name LIKE "' . $keyword . '%" OR name LIKE "%' . $keyword . '%" AND is_actived = 1 ORDER BY name ASC')->result();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Culinary/Data', $data);
    }
    public function nilai()
    {
        $user_id = $this->input->post('user_id');
        $id = $this->input->post('culinary_id');
        $nt = (int) $this->input->post('tempat');
        $np = (int) $this->input->post('pelayanan');
        $nv = (int) $this->input->post('view');
        $ns = (int) $this->input->post('saji');
        $tn = ($nt + $np + $nv + $ns) / 4;
        $this->db->set('nilai_tempat', $nt);
        $this->db->set('nilai_pelayanan', $np);
        $this->db->set('nilai_pemandangan', $nv);
        $this->db->set('nilai_kecepatan_saji', $ns);
        $this->db->set('total_nilai', $tn);
        $this->db->where('culinary_id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->update('rating');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-success btn-sm" role="alert">
                    berhasil menilai!
                </div>'
        );
        redirect('Culinary');
    }
    public function similarity()
    {
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $target = $this->db->query('SELECT round(sqrt(sum(power(total_nilai, 2))),3) as total, user_id FROM rating WHERE user_id = ' . $user['user_id'])->row_array();
        // foreach ($target as $t) {
        //     $pembilangtarget = (float)$t->total;
        // }
        var_dump((float)$target['total'], $target['user_id']);
    }
}
