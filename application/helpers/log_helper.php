<?php
function login(){
    if (isset($_SESSION['username'])) {
        $ci = get_instance();
        $user = $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();
        $x = $user['user_id'];
        $online = 0;
        $ci->db->set('on_off', $online);
        $ci->db->where('user_id', $x);
        $ci->db->update('user');
        $ci->session->sess_destroy();
        $ci->session->set_flashdata(
            'message',
            '<div class="btn btn-outline-light btn-sm" role="alert">
                terima kasih sudah berkunjung!
            </div>'
        );
        redirect('Auth');
    }
}
function logout()
{
    $ci = get_instance();
    if (!isset($_SESSION['username'])) {
        $ci->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
                    silahkan login terlebih dahulu!
                </div>'
        );
        redirect('Auth');
    }
}
