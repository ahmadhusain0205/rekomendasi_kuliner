<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment;filename=databarang.xls");
header("Pragma:no-cache");
header("Expires:0");
?>
<table>
  <thead>
    <tr>
      <th>culinary_id</th>
      <th>user_id</th>
      <th>nilai_tempat</th>
      <th>nilai_pelayanan</th>
      <th>nilai_pemandangan</th>
      <th>nilai_kecepatan_saji</th>
      <th>total_nilai</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rating as $i) : ?>
      <tr>
        <td><?= $i->culinary_id; ?></td>
        <td><?= $i->user_id; ?></td>
        <td><?= $i->nilai_tempat; ?></td>
        <td><?= $i->nilai_pelayanan; ?></td>
        <td><?= $i->nilai_pemandangan; ?></td>
        <td><?= $i->nilai_kecepatan_saji; ?></td>
        <td><?= $i->total_nilai; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>