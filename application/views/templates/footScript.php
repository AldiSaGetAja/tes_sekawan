<!--begin::Modals-->
<!--begin::Javascript-->
<script>
    var hostUrl = " <?= base_url('assets/') ?>assets/ ";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src=" <?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/scripts.bundle.js "></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src=" <?= base_url('assets/') ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/index.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/xy.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/percent.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/radar.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/themes/Animated.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/map.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/geodata/worldLow.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/geodata/continentsLow.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/geodata/usaLow.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js "></script>
<script src=" https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js "></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src=" <?= base_url('assets/') ?>assets/plugins/custom/datatables/datatables.bundle.js "></script>
<script src=" <?= base_url('assets/') ?>assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
<!-- manage_barang -->
<!-- <script src=" <?= base_url('assets/') ?>assets/js/custom/apps/ecommerce/reports/sales/sales.js"></script> -->
<!-- <script src=" <?= base_url('assets/') ?>assets/js/custom/apps/ecommerce/catalog/categories.js"></script> -->
<!-- <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/> -->
<!-- <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script> -->

<script src=" <?= base_url('assets/') ?>assets/js/custom/apps/ecommerce/sales/save-order.js"></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/apps/ecommerce/catalog/save-product.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src=" <?= base_url('assets/') ?>assets/js/widgets.bundle.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/widgets.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/apps/chat/chat.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/utilities/modals/upgrade-plan.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/utilities/modals/create-app.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/utilities/modals/new-target.js "></script>
<script src=" <?= base_url('assets/') ?>assets/js/custom/utilities/modals/users-search.js "></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // toastr.success("I do not think that means what you think it means.");
    <?php
    if ($this->session->flashdata('success')) {
    ?>
        // toastr.success("I do not think that means what you think it means.");
        toastr.success("<?= $this->session->flashdata('success'); ?>");
    <?php
        // echo $this->session->flashdata();
    } elseif ($this->session->flashdata('error')) {
    ?>
        // toastr.success("I do not think that means what you think it means.");
        toastr.error("<?= $this->session->flashdata('error'); ?>");
    <?php
        // echo $this->session->flashdata();
    } elseif ($this->session->flashdata('warning')) {
    ?>
        // toastr.success("I do not think that means what you think it means.");
        toastr.warning("<?= $this->session->flashdata('warning'); ?>");
    <?php
        // echo $this->session->flashdata();
    } elseif ($this->session->flashdata('info')) {
    ?>
        // toastr.success("I do not think that means what you think it means.");
        toastr.info("<?= $this->session->flashdata('info'); ?>");
    <?php
        // echo $this->session->flashdata();
    }
    ?>
</script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

</body>
<!--end::Body-->

</html>