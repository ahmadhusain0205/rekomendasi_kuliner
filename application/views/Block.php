<div class="text-center" style="margin-top: 200px;">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">halaman kosong</p>
    <p class="text-gray-500 mb-0">halaman yang anda kunjungi tidak tersedia</p>
    <?php
    if($this->session->userdata('level_id') == 1){
    ?>
    <a href="<?= site_url('Admin');?>">&larr; kembali ke beranda</a>
    <?php }else { ?>
    <a href="<?= site_url('Member');?>">&larr; kembali ke beranda</a>
    <?php } ?>
</div>