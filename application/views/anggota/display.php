<div class="container mt-2">
<!--    <p>
        <h3><a href="<?= base_url('anggota/display'); ?>">Anggota</a></h3>
    </p> -->
    <p>
        <a href="<?= ($this->input->get('from') != '') ? $this->input->get('from') : '#'; ?>" class="btn btn-danger mx-1 my-1">Back</a>
    </p>

    <p>
    <?php
        $note = null;
        if (
            ($this->input->get('nrbu') != '') ||
            ($this->input->get('npwp') != '') ||
            ($this->input->get('propinsi') != '') ||
            ($this->input->get('kota') != '') ||
            ($this->input->get('nama') != '') ||
            ($this->input->get('alamat') != '') ||
            ($this->input->get('tipebu') != '') ||
            ($this->input->get('grade') != '') ||
            ($this->input->get('subbidang') != '')
        )
        {
            $note = '<h4>Tipe BU:</h4>';

            if ($this->input->get('nrbu') != '')
            {
                $note = $note . 'NRBU = ' . $this->input->get('nrbu') . '; ';
            }
            if ($this->input->get('npwp') != '')
            {
                $note = $note . 'NPWP = ' . $this->input->get('npwp') . '; ';
            }
            if ($this->input->get('propinsi') != '')
            {
                $note = $note . 'Propinsi = ' . $this->Anggota_model->getPropinsiName($this->input->get('propinsi')) . '; ';
            }
            if ($this->input->get('kota') != '')
            {
                $note = $note . 'Kota/Kabupaten = ' . $this->Anggota_model->getKotaName($this->input->get('kota')) . '; ';
            }
            if ($this->input->get('nama') != '')
            {
                $note = $note . 'Nama = ' . $this->input->get('nama') . '; ';
            }
            if ($this->input->get('alamat') != '')
            {
                $note = $note . 'Alamat = ' . $this->input->get('alamat') . '; ';
            }
            if ($this->input->get('tipebu') != '')
            {
                $note = $note . '<h4>' . $this->Anggota_model->getTipeBUName($this->input->get('tipebu')) . '</h4>';
            }
            if ($this->input->get('grade') != '')
            {
                $note = $note . 'Grade = ' . $this->Anggota_model->getGradeName($this->input->get('grade')) . '; ';
            }
            if ($this->input->get('subbidang') != '')
            {
                $note = $note . 'Sub Bidang = ' . $this->input->get('subbidang') . '; ';
            }

            echo $note;
        }
    ?>
    </p>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">NRBU</th>
                <th scope="col"></th>
                <th scope="col" >Nama</th>
                <th scope="col">NPWP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kota/Kabupaten</th>
                <th scope="col">Propinsi</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $startno; ?>
            <?php foreach($anggotas as $row) : ?>
                <?php if($i % 2 == 0) { ?>
                <tr class="table-secondary">
                <?php } else { ?>
                <tr>
                <?php } ?>
                    <td><?= $i; ?></td>
                    <td><?= $row['NRBU']; ?></td>
                    <td><?= $row['TipeBUName']; ?></td>
                    <td><?= $row['NamaBU']; ?></td>
                    <td><?= $row['NPWP']; ?></td>
                    <td><?= $row['Alamat']; ?></td>
                    <td><?= $row['KotaName']; ?></td>
                    <td><?= $row['PropinsiName']; ?></td>
                    <td>
                        <a href="<?= base_url('anggota/detailview/').$row['Id']; ?>" data-toggle="modal" data-target="#detailModal" class="a-modal btn btn-success mx-1 my-1">Detail</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?= $this->pagination->create_links(); ?>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>