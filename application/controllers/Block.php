<?php
class Block extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        logout();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('Template', 'Block', $data);
    }
}