$(function() {
    
    // fungsi modal tambah data
    $('.tombolTambahData').on('click', function() {
        // ubah nama label
        $('#tambahLabel').html('Tambah Data Player');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    // fungsi modal ubah ketika diklik
    $('.tampilModalUbah').on('click', function() {
        // ubah nama label
        $('#tambahLabel').html('Ubah Data Player');
        // ambil button submit
        $('.modal-footer button[type=submit]').html('Ubah Data');
        // ubah action ke ubah
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/player/ubah');

        // memanggil data-id
        const id = $(this).data('id');
        
        // menjalankan ajax
        $.ajax({
            url : 'http://localhost/mvc/public/player/getUbah',
            data : {id : id},
            method : 'post',
            dataType : 'json',
            success : function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#club').val(data.club);
                $('#posisi').val(data.posisi);
            }
        });
    });

});