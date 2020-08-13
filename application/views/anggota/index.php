<div class="container mt-2">
    <p>
        <h3>Anggota</h3>
    </p>

    <!-- Flash Message Alert -->
    <?php if ($this->session->flashdata('message') != null) { ?>
    <div class="<?= $this->session->flashdata('msgclass'); ?>" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <p>
    <?php
        $searchprop = null;
        $note = null;
        if ($this->session->userdata('searchprop') != null)
        {
            $searchprop = $this->session->userdata('searchprop');
            //var_dump($searchprop);

            $note = 'Result for : ';
                if ($searchprop['nrbu'] != '')
                {
                    $note = $note . 'NRBU = ' . $searchprop['nrbu'] . '; ';
                }
                if ($searchprop['npwp'] != '')
                {
                    $note = $note . 'NPWP = ' . $searchprop['npwp'] . '; ';
                }
                if ($searchprop['propinsi'] != '')
                {
                    $note = $note . 'Propinsi = ' . $this->Anggota_model->getPropinsiName($searchprop['propinsi']) . '; ';
                }
                if ($searchprop['kota'] != '')
                {
                    $note = $note . 'Kota/Kabupaten = ' . $this->Anggota_model->getKotaName($searchprop['kota']) . '; ';
                }
                if ($searchprop['nama'] != '')
                {
                    $note = $note . 'Nama = ' . $searchprop['nama'] . '; ';
                }
                if ($searchprop['alamat'] != '')
                {
                    $note = $note . 'Alamat = ' . $searchprop['alamat'] . '; ';
                }
                if ($searchprop['tipebu'] != '')
                {
                    $note = $note . 'Tipe BU = ' . $this->Anggota_model->getTipeBUName($searchprop['tipebu']) . '; ';
                }
                if ($searchprop['grade'] != '')
                {
                    $note = $note . 'Kota/Kabupaten = ' . $this->Anggota_model->getGradeName($searchprop['grade']) . '; ';
                }
                
            //echo $note;
        }
    ?>
    </p>

    <!-- <p>
        <a class="btn btn-primary" href="<?= base_url('anggota/create'); ?>">Create New</a>
    </p> -->

    <p>
        <form action="<?= base_url('anggota/search'); ?>" method="POST">
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="nrbu" class="col-sm-3 col-form-label">NRBU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nrbu" name="nrbu" value="<?php if ($searchprop != null) { echo $searchprop['nrbu']; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="propinsi" class="col-sm-3 col-form-label">Propinsi</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="propinsi" name="propinsi">
                                <option value=""></option>
                                <?php foreach ($propinsi as $row) : ?>
                                <?php if (($searchprop != null) && ($row['PropinsiId'] == $searchprop['propinsi'])) { ?>
                                <option value="<?= $row['PropinsiId'] ?>" selected><?= $row['PropinsiName'] ?></option>
                                <?php } else { ?>
                                <option value="<?= $row['PropinsiId'] ?>"><?= $row['PropinsiName'] ?></option>
                                <?php } ?>
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
                            <input type="text" class="form-control" id="npwp" name="npwp" value="<?php if ($searchprop != null) { echo $searchprop['npwp']; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php if ($searchprop != null) { echo $searchprop['nama']; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php if ($searchprop != null) { echo $searchprop['alamat']; } ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary mx-1" name="submit" value="Search">
                <a href="<?= base_url('anggota'); ?>" class="btn btn-danger  mx-1">Clear</a>
            </div>
        </form>
    </p>

    <p>
        <?php
            if ($note != NULL)
            {
                if ($note != '')
                {
                    echo $note;
                }
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
                        <a href="<?= base_url('anggota/detail/').$row['Id']; ?>" class="btn btn-success mx-1 my-1">Detail</a>
                        <a href="<?= base_url('anggota/delete/').$row['Id']; ?>" class="btn btn-danger mx-1 my-1" onclick="return confirm('Are You sure?');">Delete</a>
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