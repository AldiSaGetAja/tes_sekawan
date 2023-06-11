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
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <?php
            if ($this->session->userdata('level') == 1) {
            ?>
                <a href="#" class="btn btn-primary er fs-6 px-3 py-3" data-bs-toggle="modal" data-bs-target="#tambah_pesanan">
                    Pesanan
                    &nbsp;
                    <i class="ki-duotone ki-plus">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </a>
            <?php
            }
            ?>
            <a href="<?= base_url('pesanan/excel') ?>" class="btn btn-primary er fs-6 px-3 py-3">
                Generate Excel
                &nbsp;
                <i class="ki-duotone ki-file">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                    <span class="path6"></span>
                </i>
            </a>
            <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
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
                            if ($status["status"] == "1") {
                                echo '<span class="badge badge-light-warning">Pengajuan</span>';
                                if ($status['tolak'] == true) {
                                    echo '<span class="badge badge-light-danger">Ditolak</span>';
                                }
                            } elseif ($status["status"] == "2") {
                                echo '<span class="badge badge-light-warning">Persetujuan Selanjutnya</span>';
                                if ($status['tolak'] == true) {
                                    echo '<span class="badge badge-light-danger">Ditolak</span>';
                                }
                            } elseif ($status["status"] == "3") {
                                echo '<span class="badge badge-light-warning">Diterima</span>';
                            }
                            echo '<br>';
                            echo 'status terakhir : ' . date('d-m-Y H:i', strtotime($status['waktu']));
                            ?>
                        </td>
                        <td class="text-center pe-0"><?= $d->username ?></td>
                        <td class="text-center pe-0">
                            <?php
                            if ($this->session->userdata('level') == 1) {
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
                            } elseif ($this->session->userdata('level') == 2) {
                                if ($status["status"] == "1") {
                                ?>
                                    <a class="btn btn-light-danger er fs-5 px-3 py-3" href="#" class="menu-link px-3" data-bs-toggle="modal" onclick="tolak(<?php echo $d->id_psn_kendaraan ?>)">
                                        Tolak Pengajuan
                                        &nbsp;
                                        <i class="ki-duotone ki-pencil">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <a class="btn btn-light-success er fs-5 px-3 py-3" href="#" class="menu-link px-3" data-bs-toggle="modal" onclick="setuju1(<?php echo $d->id_psn_kendaraan ?>)">
                                        Setujui pengajuan
                                        &nbsp;
                                        <i class="ki-duotone ki-pencil">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <?php
                                } elseif ($status["status"] == "2") {
                                    if ($status["tolak"] == false) {

                                    ?>
                                        <a class="btn btn-light-danger er fs-5 px-3 py-3" href="#" class="menu-link px-3" data-bs-toggle="modal" onclick="tolak(<?php echo $d->id_psn_kendaraan ?>)">
                                            Tolak Permintaan
                                            &nbsp;
                                            <i class="ki-duotone ki-pencil">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a class="btn btn-light-success er fs-5 px-3 py-3" href="#" class="menu-link px-3" data-bs-toggle="modal" onclick="terima(<?php echo $d->id_psn_kendaraan ?>)">
                                            Terima Permintaan
                                            &nbsp;
                                            <i class="ki-duotone ki-pencil">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                <?php
                                    } else {
                                        echo 'permintaan ditolak';
                                    }
                                } else {
                                    echo 'pesanan diterima';
                                }
                                ?>
                            <?php
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
<!--end::Products-->
<!-- </div> -->
<!--end::Content container-->
<!-- </div> -->
<!--end::Content-->
<!--begin::Modal - New Target-->
<div class="modal fade" id="tambah_pesanan" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="form_tambah" class="form" action="#" name="form_tambah">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Tambah Pesanan</h1>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Kendaraan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Pilih kendaraan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <select name="add_id_kendaraan" class="form-control form-control-solid border ">
                            <option value=""></option>
                            <?php
                            foreach ($kendaraan as $k) {
                            ?>
                                <option value="<?= $k->id_kendaraan ?>"><?= $k->nama_kendaraan ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Penyetuju</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="pilih penyetuju">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <select name="add_id_user" class="form-control form-control-solid border ">
                            <option value=""></option>
                            <?php
                            foreach ($user as $k) {
                            ?>
                                <option value="<?= $k->id_user ?>"><?= $k->username ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Driver</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="pilih driver">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!-- <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama driver" name="add_nama_pesanan" /> -->
                        <select name="add_id_driver" class="form-control form-control-solid border ">
                            <option value=""></option>
                            <?php
                            foreach ($driver as $k) {
                            ?>
                                <option value="<?= $k->id_driver ?>"><?= $k->nama_driver ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Pesanan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama pesanan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama driver" name="add_nama_pesanan" />
                    </div>

                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                        <button type="button" id="btn_tambah" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
<!--begin::Modal - New Target-->
<div class="modal fade" id="edit_pesanan" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="form_edit" class="form" action="#">
                    <input type="hidden" class="form-control form-control-solid border " name="id" />
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Edit Driver</h1>
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Kendaraan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Pilih kendaraan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <select name="id_kendaraan" class="form-control form-control-solid border ">
                            <option value=""></option>
                            <?php
                            foreach ($kendaraan as $k) {
                            ?>
                                <option value="<?= $k->id_kendaraan ?>"><?= $k->nama_kendaraan ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Penyetuju</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="pilih penyetuju">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <select name="id_user" class="form-control form-control-solid border ">
                            <option value=""></option>
                            <?php
                            foreach ($user as $k) {
                            ?>
                                <option value="<?= $k->id_user ?>"><?= $k->username ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Driver</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="pilih driver">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!-- <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama driver" name="nama_pesanan" /> -->
                        <select name="id_driver" class="form-control form-control-solid border ">
                            <option value=""></option>
                            <?php
                            foreach ($driver as $k) {
                            ?>
                                <option value="<?= $k->id_driver ?>"><?= $k->nama_driver ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Pesanan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama pesanan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama driver" name="nama_pesanan" />
                    </div>

                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="btn_edit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->