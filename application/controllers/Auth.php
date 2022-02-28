<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
    }
    public function index()
    {
        $data['culinary'] = $this->db->query('select c.culinary_id, c.image, c.name, c.address, c.wifi_id, c.link, (select sum(r.nilai_tempat)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_tempat, (select sum(r.nilai_pemandangan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pemandangan, (select sum(r.nilai_pelayanan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pelayanan, (select sum(r.nilai_kecepatan_saji)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_kecepatan_saji, (select sum(r.total_nilai)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as total_nilai from culinary c ORDER BY total_nilai DESC')->result();
        $this->template->load('TemplateHome', 'Auth/Home', $data);
    }
    public function keadaan()
    {
        $x = $this->input->post('keadaan');
        $data['culinary'] = $this->db->query('select c.culinary_id, c.image, c.name, c.address, c.wifi_id, c.link, (select sum(r.nilai_tempat)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_tempat, (select sum(r.nilai_pemandangan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pemandangan, (select sum(r.nilai_pelayanan)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_pelayanan, (select sum(r.nilai_kecepatan_saji)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as nilai_kecepatan_saji, (select sum(r.total_nilai)/count(r.culinary_id) from rating r where r.culinary_id=c.culinary_id) as total_nilai from culinary c ORDER BY ' . $x . ' DESC')->result();
        $this->template->load('TemplateHome', 'Auth/Home', $data);
    }
    public function login()
    {
        $this->form_validation->set_rules('username', 'nama panggilan', 'required|trim');
        $this->form_validation->set_rules('password', 'sandi', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $this->template->load('TemplateAuth', 'Auth/Login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // ambil satu baris data user
            $user = $this->db->get_where('user', ['username' => $username])->row_array();
            // jika user ada
            if ($user) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // jika sama
                    $data = [
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'level_id' => $user['level_id'],
                        'on_off' => $user['on_off'],
                        'image' => $user['image']
                    ];
                    $this->session->set_userdata($data);
                    $x = $user['user_id'];
                    $online = 1;
                    $this->db->set('on_off', $online);
                    $this->db->where('user_id', $x);
                    $this->db->update('user');
                    if ($user['level_id'] == 2) {
                        redirect('Member');
                    } else {
                        redirect('Admin');
                    }
                } else {
                    // jika tidak sama
                    $this->session->set_flashdata(
                        'message',
                        '<div class="btn btn-outline-warning btn-sm" role="alert">
                            username atau password salah!
                        </div>'
                    );
                    $this->template->load('TemplateAuth', 'Auth/Login');
                }
            } else {
                //jika user tidak ada
                $this->session->set_flashdata(
                    'message',
                    '<div class="btn btn-outline-danger btn-sm" role="alert">
                        akun belum terdaftar, silahkan mendaftar!
                    </div>'
                );
                $this->template->load('TemplateAuth', 'Auth/Login');
            }
        }
    }
    public function regis()
    {
        $this->form_validation->set_rules('username', 'nama panggilan', 'required|is_unique[user.username]|trim', [
            'is_unique' => 'username sudah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'sandi', 'required|trim');
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('address', 'alamat', 'required');
        $this->form_validation->set_rules('phone', 'nomor telpon', 'required|numeric', [
            'numeric' => 'nomor telpon harus berupa angka'
        ]);
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $this->template->load('TemplateAuth', 'Auth/Register');
        } else {
            $data = [
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'address' => $this->input->post('address', true),
                'phone' => $this->input->post('phone'),
                'image' => 'default.png',
                'on_off' => 0,
                'level_id' => 2,
            ];
            $this->db->insert('user', $data);
            $culinary = $this->db->query('SELECT culinary_id FROM culinary')->result();
            $cek = $this->db->query('select user_id from user order by user_id desc limit 1')->result();
            foreach ($cek as $c) {
                $b = $c->user_id;
            }
            foreach ($culinary as $c) {
                $data = [
                    'culinary_id' => $c->culinary_id,
                    'user_id' => $b
                ];
                $this->db->insert('rating', $data);
            }
            $this->session->set_flashdata(
                'message',
                '<div class="btn btn-outline-light btn-sm" role="alert">
                    berhasil mendaftar silahkan masuk!
                </div>'
            );
            redirect('Auth');
        }
    }
    public function logout()
    {
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $x = $user['user_id'];
        $online = 0;
        $this->db->set('on_off', $online);
        $this->db->where('user_id', $x);
        $this->db->update('user');
        $this->session->sess_destroy();
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                terima kasih sudah berkunjung!
            </div>'
        );
        redirect('Auth');
    }
}
