<?php
class Manuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') == 2) {
            redirect('Block');
        }
        logout();
    }
    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'manuser' => $this->db->query('select u.user_id, u.username, u.name, u.address, u.phone, u.image, u.on_off, u.level_id, u.created from user u')->result()
        ];
        $this->template->load('Template', 'Manuser/Data', $data);
    }
    public function add()
    {
        $data['level'] = $this->db->get('level')->result();
        $this->form_validation->set_rules('username', 'nama panggilan', 'required|is_unique[user.username]|trim', [
            'is_unique' => 'username sudah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'sandi', 'required|trim');
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('address', 'alamat', 'required');
        $this->form_validation->set_rules('phone', 'nomor telpon', 'required|numeric', [
            'numeric' => 'nomor telpon harus berupa angka'
        ]);
        $this->form_validation->set_rules('level_id', 'level', 'required');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->template->load('Template', 'Manuser/Add', $data);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'image' => 'default.png',
                'on_off' => 0,
                'level_id' => $this->input->post('level_id'),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil menambahkan data!
            </div>'
            );
            redirect('Manuser');
        }
    }
    public function lvup($id)
    {
        $where = $id;
        $level_id = 1;
        $this->db->set('level_id', $level_id);
        $this->db->where('user_id', $where);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil meningkatkan level!
            </div>'
        );
        redirect('Manuser');
    }
    public function lvdown($id)
    {
        $where = $id;
        $level_id = 2;
        $this->db->set('level_id', $level_id);
        $this->db->where('user_id', $where);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil menurunkan level!
            </div>'
        );
        redirect('Manuser');
    }
    public function delete($id)
    {
        $where = array('user_id' => $id);
        $this->db->where($where);
        $this->db->delete('user');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil menghapus data!
            </div>'
        );
        redirect('Manuser');
    }
    public function edit($id)
    {
        $where = array('user_id' => $id);
        $data['manuser'] = $this->db->get_where('user', $where)->result();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Manuser/Edit', $data);
    }
    public function edit_process()
    {
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('address', $this->input->post('address'));
        $this->db->set('phone', $this->input->post('phone'));
        $this->db->where('user_id', $this->input->post('user_id'));
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil mengubah data!
            </div>'
        );
        redirect('Manuser');
    }
}
