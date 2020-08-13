<div class="container mt-2">
    <p>
        <h3>Anggota</h3>
    </p>

    <p>
        <form action="<?= base_url('anggota/view'); ?>" method="GET">
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="nrbu" class="col-sm-3 col-form-label">NRBU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nrbu" name="nrbu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="propinsi" class="col-sm-3 col-form-label">Propinsi</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="propinsi" name="propinsi">
                                <option value=""></option>
                                <?php foreach ($propinsi as $row) : ?>
                                <option value="<?= $row['PropinsiId'] ?>"><?= $row['PropinsiName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kota" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="kota" name="kota"></select>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="border-left: 1px solid #c7c7c7;">
                    <div class="form-group row">
                        <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npwp" name="npwp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary mx-1" name="submit" value="Search">
                <a href="<?= base_url('anggota/view'); ?>" class="btn btn-danger  mx-1">Clear</a>
            </div>
        </form>
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
            ($this->input->get('grade') != '')
        )
        {
            $note = 'Result for : ';

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
                $note = $note . 'Tipe BU = ' . $this->Anggota_model->getTipeBUName($this->input->get('tipebu')) . '; ';
            }
            if ($this->input->get('grade') != '')
            {
                $note = $note . 'Grade = ' . $this->Anggota_model->getGradeName($this->input->get('grade')) . '; ';
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