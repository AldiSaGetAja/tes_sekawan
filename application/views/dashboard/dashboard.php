                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10">

                                    <div class="col-sm-5 col-xl-6 mb-xl-10 rounded p-6 hover-scale">
                                        <!--begin::Card widget 2-->
                                        <div class="card h-lg-100 bg-light-danger bg-hover-danger bg-light-danger border border-gray-400 shadow">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                                <!--begin::Icon-->

                                                <!--end::Icon-->
                                                <!--begin::Section-->

                                                <!--end::Section-->
                                                <div class="d-flex flex-row flex-column-fluid">
                                                    <div class="d-flex flex-row-fluid flex-center mx-lg-1">
                                                        <div class="d-flex flex-column my-0">
                                                            <!--begin::Number-->
                                                            <span class="fw-semibold fs-3x text-gray-800 lh-2 ls-n2"><?= number_format($kendaraan) ?></span>
                                                            <!--end::Number-->
                                                            <!--begin::Follower-->
                                                            <div class="m-0">
                                                                <span class="fw-semibold fs-6 text-gray-700">Kendaraan</span>
                                                            </div>
                                                            <!--end::Follower-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--begin::Badge-->
                                                <div class="text-center pt-5 d-3 mx-lg-2">
                                                    <a href="<?= base_url('assets/metronic/html/') ?>demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-600">Lihat detail
                                                        <i class="ki-duotone ki-arrow-right fs-5 text-info">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i></a>
                                                </div>
                                                <img src="<?= base_url('assets/') ?>assets/media/icons/duotune/ecommerce/ecm001.svg" class="position-absolute me-1 bottom-1 end-0 h-80px" alt="" />

                                                <!--end::Badge-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card widget 2-->
                                    </div>
                                    <div class="col-sm-5 col-xl-6 mb-xl-10 rounded p-6 hover-scale">
                                        <!--begin::Card widget 2-->
                                        <div class="card h-lg-100 bg-light-primary bg-hover-primary bg-light-primary border border-gray-400 shadow">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                                <!--begin::Icon-->

                                                <!--end::Icon-->
                                                <!--begin::Section-->

                                                <!--end::Section-->
                                                <div class="d-flex flex-row flex-column-fluid">
                                                    <div class="d-flex flex-row-fluid flex-center mx-lg-1">
                                                        <div class="d-flex flex-column my-0">
                                                            <!--begin::Number-->
                                                            <span class="fw-semibold fs-3x text-gray-800 lh-2 ls-n2"><?= number_format($driver) ?></span>
                                                            <!--end::Number-->
                                                            <!--begin::Follower-->
                                                            <div class="m-0">
                                                                <span class="fw-semibold fs-6 text-gray-700">Driver</span>
                                                            </div>
                                                            <!--end::Follower-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--begin::Badge-->
                                                <div class="text-center pt-5 d-3 mx-lg-2">
                                                    <a href="<?= base_url('assets/metronic/html/') ?>demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-600">Lihat detail
                                                        <i class="ki-duotone ki-arrow-right fs-5 text-info">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i></a>
                                                </div>
                                                <img src="<?= base_url('assets/') ?>assets/media/icons/duotune/communication/com006.svg" class="position-absolute me-1 bottom-1 end-0 h-80px" alt="" />

                                                <!--end::Badge-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card widget 2-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row gx-5 gx-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-6 mb-5 mb-xl-10">
                                        <!--begin::Chart widget 8-->
                                        <div class="card h-lg-100 border border-gray-400 shadow">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 border-white">
                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-800">Hasil Transaksi</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Semua Outlet</span>
                                                </h3>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->
                                            <!-- begin body -->
                                            <div class="card-body pt-5">
                                                <div id="chartdiv" style="height: 350px;"></div>
                                            </div>
                                            <!-- end body -->
                                        </div>
                                        <!--end::Chart widget 8-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6 mb-5 mb-xl-10">
                                        <!--begin::Tables widget 16-->
                                        <div class="card h-lg-100 border border-gray-400 shadow">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 border-white">
                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-800">Pendapatan Penjualan</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Dalam Sebulan</span>
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                            <div class="card-body">
                                                <div id="lingkaran" style="height: 350px;"></div>
                                            </div>

                                        </div>
                                        <!--end::Tables widget 16-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->