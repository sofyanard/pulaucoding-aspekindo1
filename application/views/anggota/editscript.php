<script>
    $(document).ready(function () {
        $('#propinsi').change(function (e) {
            $.ajax({
                url: '<?= base_url('anggota/getKotaByPropinsiJson'); ?>' + '/' + $('#propinsi').val(),
                success: function (result) {
                    $('#kota').empty();
                    $.each(result, function () {
                        $('#kota').append($('<option></option>').attr('value', this.KotaId).text(this.KotaName));
                    });
                }
            });
        });
    });
</script>
