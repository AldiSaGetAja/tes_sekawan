<script>
    "use strict";
    var KTAppEcommerceCategories = function() {
        var t, e, n = () => {
            t.querySelectorAll('[data-kt-ecommerce-category-filter="delete_row"]').forEach((t => {
                t.addEventListener("click", (function(t) {
                    t.preventDefault();
                    const n = t.target.closest("tr"),
                        o = n.querySelector('[data-kt-ecommerce-category-filter="category_name"]').innerText;
                    Swal.fire({
                        text: "Are you sure you want to delete " + o + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((function(t) {
                        t.value ? Swal.fire({
                            text: "You have deleted " + o + "!.",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function() {
                            e.row($(n)).remove().draw()
                        })) : "cancel" === t.dismiss && Swal.fire({
                            text: o + " was not deleted.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        })
                    }))
                }))
            }))
        };
        return {
            init: function() {
                (t = document.querySelector("#kt_ecommerce_category_table")) && ((e = $(t).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,
                    columnDefs: [{
                        orderable: !1,
                        targets: 0
                    }, {
                        orderable: !1,
                        targets: 3
                    }]
                })).on("draw", (function() {
                    n()
                })), document.querySelector('[data-kt-ecommerce-category-filter="search"]').addEventListener("keyup", (function(t) {
                    e.search(t.target.value).draw()
                })), n())
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTAppEcommerceCategories.init()
    }));
</script>
<script>
    $('#btn_tambah').click(function(event) {
        var form = new FormData($('#form_tambah')[0]);
        $.ajax({
            type: "post",
            data: form,
            url: '<?php echo base_url('customer/tambah_customer') ?>',
            dataType: 'json',
            cache: 'false',
            contentType: false,
            processData: false,
            success: function(hasil) {

                if (hasil.hasil) {
                    $('#tambah_customer').hide('slow');
                    location.reload();
                }
            }
        });
    });

    $('#btn_edit').click(function(event) {
        $.ajax({
            type: "post",
            data: {
                'form_edit': $('#form_edit').serialize()
            },
            url: '<?php echo base_url('customer/edit_customer') ?>',
            dataType: 'json',
            cache: 'false',
            success: function(hasil) {

                if (hasil.hasil) {
                    $('#edit_customer').hide('slow');
                    location.reload();
                }
            }
        });
    });

    function get_user(x) {
        $.ajax({
            type: "post",
            data: 'id=' + x,
            url: '<?php echo base_url('customer/getcustomerbyid') ?>',
            dataType: 'json',
            cache: 'false',
            success: function(hasil) {
                $('[name="id"]').val(hasil['id_customer']);
                $('[name="nama_customer"]').val(hasil['nama_customer']);
                $('[name="alamat_customer"]').val(hasil['alamat_customer']);
                $('[name="no_telp_customer"]').val(hasil['no_telp_customer']);
                $('[name="id_toko"]').val(hasil['id_toko']);
            }
        });
    }

    function hapus_user(x) {
        Swal.fire({
            title: 'Apakah yakin ingin menghapus data ini?! ',
            text: "Anda tidak dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    data: 'id=' + x,
                    url: '<?php echo base_url('customer/hapus_customer') ?>',
                    dataType: 'json',
                    cache: 'false',
                    success: function(hasil) {
                        if (hasil.hasil) {
                            location.reload();
                        }
                    }
                });
                Swal.fire(
                    'Terhapus!',
                    'Data berhasil terhapus.',
                    'success',
                )

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Batal',
                    'Data tidak terhapus.',
                    'error'
                )
            }
        });
        
    }
    
</script>