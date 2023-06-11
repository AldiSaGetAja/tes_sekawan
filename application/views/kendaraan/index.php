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
            <a href="#" class="btn btn-primary er fs-6 px-3 py-3" data-bs-toggle="modal" data-bs-target="#tambah_kendaraan">
                Kendaraan
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
                    <th class="min-w-200px text-center">Nama Kendaraan</th>
                    <th class="min-w-200px text-center">Jumlah Roda</th>
                    <th class="min-w-100px text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600 text-center">
                <?php
                $no = 1;
                foreach ($kendaraan as $k) {
                ?>
                    <tr>
                        <td class="text-center pe-0"><?= $no++ ?>.</td>
                        <td class="text-center pe-0"><?= $k->nama_kendaraan ?></td>
                        <td class="text-center pe-0"><?= $k->jml_roda ?></td>
                        <td class="text-center pe-0">
                            <a class="btn btn-light-warning er fs-4 px-3 py-3" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit_kendaraan" onclick="get_user(<?php echo $k->id_kendaraan ?>)">
                                Ubah
                                &nbsp;
                                <i class="ki-duotone ki-pencil">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <a class="btn btn-light-danger er fs-4 px-3 py-3" data-kt-ecommerce-category-filter="delete_row" onclick="hapus_user(<?php echo $k->id_kendaraan ?>)">
                                Hapus
                                &nbsp;
                                <i class="ki-duotone ki-trash">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                </i>
                            </a>
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
<div class="modal fade" id="tambah_kendaraan" tabindex="-1" aria-hidden="true">
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
                        <h1 class="mb-3">Tambah Kendaraan</h1>
                    </div>
                    <!--end::Heading-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Kendaraan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user Kendaraan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama Kendaraan" name="add_nama_kendaraan" />
                    </div>
                    <!--end::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Jumlah Roda</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="masukkan jumlah roda">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="number" class="form-control form-control-solid border " placeholder="masukkan Jumlah Roda Kendaraan" name="add_jml_roda" value="2" min="0" max="10" />
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
<div class="modal fade" id="edit_kendaraan" tabindex="-1" aria-hidden="true">
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
                        <h1 class="mb-3">Edit Kendaraan</h1>
                    </div>
                    <!--end::Heading-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Kendaraan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="masukkan nama user Kendaraan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid border " placeholder="masukkan nama Kendaraan" name="nama_kendaraan" />
                    </div>
                    <!--end::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Jumlah Roda Kendaraan</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="masukkan Jumlah Roda user Kendaraan">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="number" class="form-control form-control-solid border " placeholder="masukkan Jumlah Roda Kendaraan" name="jml_roda" />
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