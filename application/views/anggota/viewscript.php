<script>
    $(document).ready(function () {
        if ($('#propinsi').val() != '')
        {
            $.ajax({
                url: '<?= base_url('anggota/getKotaByPropinsiJson'); ?>' + '/' + $('#propinsi').val(),
                success: function (result) {
                    $('#kota').empty();
                    $('#kota').append($('<option></option>').attr('value', ''));
                    $.each(result, function () {
                        $('#kota').append($('<option></option>').attr('value', this.KotaId).text(this.KotaName));
                    });
                }
            });
        }
        else

        $('#propinsi').change(function (e) {
            $.ajax({
                url: '<?= base_url('anggota/getKotaByPropinsiJson'); ?>' + '/' + $('#propinsi').val(),
                success: function (result) {
                    $('#kota').empty();
                    $('#kota').append($('<option></option>').attr('value', ''));
                    $.each(result, function () {
                        $('#kota').append($('<option></option>').attr('value', this.KotaId).text(this.KotaName));
                    });
                }
            });
        });
    });
</script>


<!-- jquery for modal content -->

<script>
    $(document).ready(function () {
        $('.a-modal').on('click', function(e) {
            $('#detailModal').find('.modal-content').load($(this).attr('href'));
        });
    });
</script>