<!DOCTYPE html>
<html>
<head>
    <title><?= $judul ?></title>
<style>

body{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#customers {
  border-collapse: collapse;
  width: 100%;
  
}

#customers td {
  border: 0px solid $#ddd;
  padding: 8px;
  font-size: 12px;
}
#customers th{
  padding: 8px;
  font-size: 12px;
}


#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #858796;
  color: white;
}
</style>
</head>
<body>
<table border="0" width="100%">
    <tr>
        <td align="center"><h1>Laporan Penagihan</h1></td>
    </tr>
    <tr>
        <td align="center">
            <?php if($tglawal == '' || $tglakhir == ''): ?>
                <h6>Semua Tanggal</h6>
            <?php else: ?>
                <h6><?= $tglawal ?> - <?= $tglakhir ?></h6>
            <?php endif; ?>
            
        </td>
    </tr>
</table>
<br>
<table id="customers">
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>User</th>
    <th>KPK</th>
    <th>Kolektabilitas</th>
    <th>No. PMP</th>
    <th>Nama Nasabah</th>
    <th>Alamat</th>
    <th>Agunan</th>
    <th>Nominal Pembayaran</th>
  </tr>
      <?php $no=1; foreach ($data as $d) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $d->tanggal_penagihan ?></td>
          <td><?= $d->nama ?></td>
          <td><?= $d->nama_kolektabilitas ?></td>
          <td><?= $d->no_pmp ?></td>
          <td><?= $d->nama_nasabah ?></td>
          <td><?= $d->alamat ?></td>
          <td><?= $d->nama_agunan ?></td>
          <td><?= $d->nominal ?></td>
        </tr>
      <?php } ?>
</table>

</body>
</html>
