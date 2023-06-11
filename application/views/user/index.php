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
                    <a href="#" class="btn btn-primary er fs-6 px-3 py-3" data-bs-toggle="modal" data-bs-target="#tambah_customer">
                        customer
                        &nbsp;
                        <i class="ki-duotone ki-plus">
                            <span class="path1"></span>
                            <span class="path2"></span>
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
                                <th class="min-w-200px text-center">Nama</th>
                                <th class="min-w-200px text-center">Alamat</th>
                                <th class="min-w-100px text-center">No. Telp</th>
                                <th class="min-w-200px text-center">Asal Toko</th>
                                </th>
                                <th class="min-w-100px text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            <?php
                            $no = 1;
                            foreach ($customer as $s) {
                            ?>
                                <tr>
                                    <td class="text-center pe-0"><?= $no++ ?>.</td>
                                    <td class="text-center pe-0"><?= $s->nama_customer ?></td>
                                    <td class="text-center pe-0"><?= $s->alamat_customer ?></td>
                                    <td class="text-center pe-0"><?= $s->no_telp_customer ?></td>
                                    <td class="text-center pe-0"><?= $s->nama_toko ?></td>
                                    <td class="text-center pe-0">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-100px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit_customer" onclick="get_user(<?php echo $s->id_customer ?>)">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" onclick="hapus_user(<?php echo $s->id_customer ?>)">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
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
        <div class="modal fade" id="tambah_customer" tabindex="-1" aria-hidden="true">
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
                                <h1 class="mb-3">Tambah customer</h1>
                            </div>
                            <!--end::Heading-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nama customer</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user customer">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama customer" name="add_nama_customer" />
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Alamat customer</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan alamat user customer">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid border " placeholder="masukkan alamat customer" name="add_alamat_customer" />
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">No. Telp customer</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user no telepon">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid border " placeholder="masukkan no telp customer" name="add_no_telp_customer" onkeypress="return hanyaAngka(event)" />
                                <!-- pemisah titik -->
                                <!-- onkeyup="javascript:tandaPemisahTitik(this);" -->
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">customer toko</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user no telepon">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid border " data-control="select2" name="add_id_toko">
                                    <?php
                                    echo '<option value="">Pilih</option>';
                                    foreach ($toko as $t) {
                                        echo '<option value="' . $t->id_toko . '">' . $t->nama_toko . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--begin::Actions-->
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
        <div class="modal fade" id="edit_customer" tabindex="-1" aria-hidden="true">
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
                            <input type="hidden" class="form-control form-control-solid border " placeholder="masukkan Nama" name="id" />
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">Edit customer</h1>
                            </div>
                            <!--end::Heading-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nama customer</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user customer">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama customer" name="nama_customer" />
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Alamat customer</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan alamat user customer">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid border " placeholder="masukkan alamat customer" name="alamat_customer" />
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">No. Telp customer</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user no telepon">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid border " placeholder="masukkan no telp customer" name="no_telp_customer" onkeypress="return hanyaAngka(event)" />
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">customer toko</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user no telepon">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid border " name="id_toko" required>
                                    <?php
                                    foreach ($toko as $t) {
                                        echo '<option value="' . $t->id_toko . '">' . $t->nama_toko . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
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