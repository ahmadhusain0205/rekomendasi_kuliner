<?php
class Mankuli extends CI_Controller
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
        $data['mankuli_aktif'] = $this->db->get_where('culinary', 'is_actived = 1')->result();
        $data['mankuli_noaktif'] = $this->db->get_where('culinary', 'is_actived = 0')->result();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Mankuli/Data', $data);
    }
    public function actived($id)
    {
        $where = $id;
        $is_active = 1;
        $this->db->set('is_actived', $is_active);
        $this->db->where('culinary_id', $where);
        $this->db->update('culinary');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil menambahkan kuliner!
            </div>'
        );
        $user_id = $this->db->query('SELECT user_id FROM user WHERE level_id = 2')->result();
        $culinary_id = $this->db->query('SELECT culinary_id FROM culinary ORDER BY culinary_id DESC LIMIT 1')->row_array();
        foreach ($user_id as $u) {
            $data = [
                'culinary_id' => $culinary_id['culinary_id'],
                'user_id' => $u->user_id,
                'nilai_tempat' => 0,
                'nilai_pelayanan' => 0,
                'nilai_pemandangan' => 0,
                'nilai_kecepatan_saji' => 0,
                'total_nilai' => 0,
            ];
            $this->db->insert('rating', $data);
        }
        redirect('Mankuli');
    }
    public function delete($id)
    {
        $where = array('culinary_id' => $id);
        $this->db->where($where);
        $this->db->delete('culinary');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil menghapus data!
            </div>'
        );
        redirect('Mankuli');
    }
    public function add()
    {
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('address', 'alamat', 'required');
        $this->form_validation->set_rules('wifi_id', 'wifi', 'required|trim');
        $this->form_validation->set_rules('link', 'link map', 'required|trim|valid_url');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->template->load('Template', 'Mankuli/Add', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'wifi_id' => $this->input->post('wifi_id'),
                'link' => $this->input->post('link'),
                'is_actived' => 0,
                'image' => 'default.png'
            ];
            $this->db->insert('culinary', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="btn btn-outline-light btn-sm" role="alert">
                    berhasil menambahkan data!
                </div>'
            );
            redirect('Mankuli');
        }
    }
    public function edit($id)
    {
        $where = array('culinary_id' => $id);
        $data['mankuli'] = $this->db->get_where('culinary', $where)->result();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Mankuli/Edit', $data);
    }
    public function edit_process()
    {
        $data['culinary'] = $this->db->get_where('culinary', 'culinary_id = ' . $this->input->post('culinary_id'))->row_array();
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './assets/img/culinary/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $old_image = $data['culinary']['image'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets/img/culinary/' . $old_image);
                }
                $new = $this->upload->data('file_name');
                $this->db->set('image', $new);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('address', $this->input->post('address'));
        $this->db->set('wifi_id', $this->input->post('wifi_id'));
        $this->db->set('link', $this->input->post('link'));
        $this->db->where('culinary_id', $this->input->post('culinary_id'));
        $this->db->update('culinary');
        $this->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                berhasil mengubah data!
            </div>'
        );
        redirect('Mankuli');
    }
}
