<?php
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        logout();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Profile/Data', $data);
    }
    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Profile/Edit', $data);
    }
    public function edit_process()
    {
        // $this->form_validation->set_rules('image', 'foto', 'required');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $address = $this->input->post('address');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        // if ($this->form_validation->run() == true) {
        // cek jika ada gambar baru
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new = $this->upload->data('file_name');
                // var_dump($new);
                $this->db->set('image', $new);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('name', $name);
        $this->db->set('username', $username);
        $this->db->set('address', $address);
        $this->db->set('phone', $phone);
        $this->db->where('username', $username);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil mengubah profil!
            </div>'
        );
        redirect('Profile');
        // } else {
        //     $this->session->set_flashdata(
        //         'message',
        //         '<div class="btn btn-outline-danger btn-sm" role="alert">
        //         gagal mengubah profil!
        //     </div>'
        //     );
        //     redirect('Profile/edit');
        // }
    }
    public function password()
    {
        $this->form_validation->set_rules('password', 'sandi baru', 'required|trim');
        $this->form_validation->set_rules('password2', 'ulangi sandi baru', 'required|trim|matches[password]', [
            'matches' => 'sandi tidak sama'
        ]);
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $id = $this->input->post('user_id');
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            // $data['password'] = $this->db->get_where('user', 'user_id = ' . $id)->row_array();
            $this->template->load('Template', 'Profile/Password', $data);
        } else {
            $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
            $this->db->where('user_id', $id);
            $this->db->update('user');
            $this->session->set_flashdata(
                'message',
                '<div class="btn btn-outline-light btn-sm" role="alert">
                    berhasil mengubah sandi!
                </div>'
            );
            redirect('Profile');
        }
    }
}
