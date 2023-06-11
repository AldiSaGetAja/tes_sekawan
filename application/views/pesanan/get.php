<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search . . ." />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!-- <div class="table-responsive"> -->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-50px">No.</th>
                    <th class="min-w-150px text-center">Nama Pesanan</th>
                    <th class="min-w-150px text-center">Nama Driver</th>
                    <th class="min-w-150px text-center">No.Telp Driver</th>
                    <th class="min-w-150px text-center">Alamat Driver</th>
                    <th class="min-w-150px text-center">Nama Kendaraan</th>
                    <th class="min-w-120px text-center">Roda Kndraan</th>
                    <th class="min-w-200px text-center">Waktu Pesanan</th>
                    <th class="min-w-200px text-center">Status</th>
                    <th class="min-w-150px text-center">Pihak Penyetuju</th>
                    <th class="min-w-250px text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600 text-center">
                <?php
                $no = 1;
                foreach ($pesanan as $d) {
                ?>
                    <tr>
                        <td class="text-center pe-0"><?= $no++ ?>.</td>
                        <td class="text-center pe-0"><?= $d->nama_pesanan ?></td>
                        <td class="text-center pe-0"><?= $d->nama_driver ?></td>
                        <td class="text-center pe-0"><?= $d->no_telp ?></td>
                        <td class="text-center pe-0"><?= $d->alamat ?></td>
                        <td class="text-center pe-0"><?= $d->nama_kendaraan ?></td>
                        <td class="text-center pe-0"><?= $d->jml_roda ?></td>
                        <td class="text-center pe-0"><?= date('d-m-Y H:i:s', strtotime($d->waktu_pesan)) ?></td>
                        <td class="text-center pe-0">
                            <?php
                            $status =  json_decode($d->status, true);
                            if ($status['status'] == 1) {
                                echo '<span class="badge badge-light-warning">Pengajuan</span>';
                                if ($status['tolak'] == true) {
                                    echo '<span class="badge badge-light-danger">Ditolak</span>';
                                }
                            } elseif ($status['status'] == 2) {
                                echo '<span class="badge badge-light-warning">Persetujuan Selanjutnya</span>';
                                if ($status['tolak'] == true) {
                                    echo '<span class="badge badge-light-danger">Persetujuan ke-2</span>';
                                }
                            } elseif ($status['status'] == 3) {
                                echo '<span class="badge badge-light-warning">Diterima</span>';
                            }
                            echo '<br>';
                            echo 'status terakhir : ' . date('d-m-Y H:i', strtotime($status['waktu']));
                            ?>
                        </td>
                        <td class="text-center pe-0"><?= $d->username ?></td>
                        <td class="text-center pe-0">
                            <?php
                            if ($status['status'] == 1) {
                            ?>
                                <a class="btn btn-light-warning er fs-5 px-3 py-3" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit_pesanan" onclick="get_user(<?php echo $d->id_psn_kendaraan ?>)">
                                    Ubah identitas pesanan
                                    &nbsp;
                                    <i class="ki-duotone ki-pencil">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            <?php
                            } else {
                                echo 'Hanya pengajuan bisa diubah';
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- </div> -->
    </div>
    <!--end::Card body-->
</div>
<!--end::Modal - New Target-->