$(function() {
    // Tombol Tambah
    $('.tombolTambahData').on('click', function() {
        $('#judulModalLabel').html('Tambah Data Game');
        $('.modal-footer button[type=submit]').html('Simpan Data');
        
        // Pastikan URL-nya sudah tidak pakai index.php?url=
        $('.modal-body form').attr('action', 'http://localhost/project_uas_game/Home/tambah');
        
        // Reset input agar kosong
        $('#id').val('');
        $('#judul').val('');
        $('#genre').val('');
        $('#rating').val('');
    });

    // Tombol Ubah
    $('.tampilModalUbah').on('click', function() {
        $('#judulModalLabel').html('Ubah Data Game');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        // PASTIKAN ARAHNYA KE UBAH
        $('.modal-body form').attr('action', 'http://localhost/project_uas_game/Home/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/project_uas_game/Home/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // ID harus terisi agar database tahu mana yang diupdate
                $('#id').val(data.id); 
                $('#judul').val(data.judul);
                $('#genre').val(data.genre);
                $('#rating').val(data.rating);
            }
        });
    });
});