<?php
// fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename=export-to-excel.xls");

// tambahkan table
?>
<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pesanan</th>
            <th>Tanggal</th>
            <th>Nama Driver</th>
            <th>Nama Kendaraan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $pengajuan = 0;
        $ditolak_pengajuan = 0;
        $proses = 0;
        $ditolak_proses = 0;
        $diterima = 0;

        foreach ($pesanan as $p) {
            $status = json_decode($p->status, true);
        ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $p->nama_pesanan ?></td>
                <td><?= date('d-m-Y H:i', strtotime($p->waktu_pesan)) ?></td>
                <td><?= $p->nama_kendaraan ?></td>
                <td><?= $p->nama_driver ?></td>
                <td>
                    <?php
                    if ($status["status"] == 1) {
                        echo 'dalam pengajuan';
                        if ($status["tolak"] == true) {
                            echo ' & ditolak';
                            $ditolak_pengajuan++;
                        } else {
                            $pengajuan++;
                        }
                    } elseif ($status["status"] == 2) {
                        echo 'proses selanjutnya';
                        if ($status["tolak"] == true) {
                            echo ' & ditolak';
                            $ditolak_proses++;
                        } else {
                            $proses++;
                        }
                    } elseif ($status["status"] == 3) {
                        echo 'diterima';
                        $diterima++;
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="6"></td>
        </tr>
    </tbody>
</table>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Status</th>
            <th>Pengajuan</th>
            <th>Proses</th>
            <th>diterima</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1.</td>
            <td>Ditolak</td>
            <td><?= $ditolak_pengajuan ?></td>
            <td><?= $pengajuan ?></td>
            <td>0</td>
            <td><?= $ditolak_pengajuan + $ditolak_proses ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Diterima</td>
            <td><?= $ditolak_proses ?></td>
            <td><?= $proses ?></td>
            <td><?= $diterima ?></td>
            <td><?= $proses + $ditolak_proses + $diterima ?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">Total</td>
            <td><?= $pengajuan + $ditolak_pengajuan ?></td>
            <td><?= $proses + $ditolak_proses ?></td>
            <td><?= $diterima ?></td>
            <td><?= number_format($pengajuan + $proses + $ditolak_pengajuan + $ditolak_proses + $diterima) ?></td>
        </tr>
    </tfoot>
</table>