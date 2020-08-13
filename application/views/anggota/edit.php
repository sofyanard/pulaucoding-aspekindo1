<div class="container mt-2">
    <p>
        <h3>Edit Anggota</h3>
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

    <form action="<?= base_url('anggota/edit/').$anggota['Id']; ?>" method="POST">
        <div class="form-group row">
            <label for="nrbu" class="col-sm-2 col-form-label">NRBU</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nrbu" name="nrbu" value="<?= $anggota['NRBU'] ?>">
                <?= form_error('nrbu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="tipebu" class="col-sm-2 col-form-label">Tipe BU</label>
            <div class="col-sm-10">
                <select class="form-control" id="tipebu" name="tipebu">
                    <?php foreach ($tipebu as $row) : ?>
                        <?php if ($row['TipeBUCode'] == $anggota['TipeBU']) { ?>
                            <option value="<?= $row['TipeBUCode'] ?>" selected><?= $row['TipeBUName'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['TipeBUCode'] ?>"><?= $row['TipeBUName'] ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <?= form_error('tipebu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="namabu" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namabu" name="namabu" value="<?= $anggota['NamaBU'] ?>">
                <?= form_error('namabu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $anggota['NPWP'] ?>">
                <?= form_error('npwp', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota['Alamat'] ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="propinsi" class="col-sm-2 col-form-label">Propinsi</label>
            <div class="col-sm-10">
                <select class="form-control" id="propinsi" name="propinsi">
                    <?php foreach ($propinsi as $row) : ?>
                        <?php if ($row['PropinsiId'] == $anggota['KodePropinsi']) { ?>
                            <option value="<?= $row['PropinsiId'] ?>" selected><?= $row['PropinsiName'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['PropinsiId'] ?>"><?= $row['PropinsiName'] ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <?= form_error('propinsi', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
            <div class="col-sm-10">
                <select class="form-control" id="kota" name="kota">
                    <?php foreach ($kota as $row) : ?>
                        <?php if ($row['KotaId'] == $anggota['KodeKota']) { ?>
                            <option value="<?= $row['KotaId'] ?>" selected><?= $row['KotaName'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['KotaId'] ?>"><?= $row['KotaName'] ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kodepos" name="kodepos" value="<?= $anggota['KodePos'] ?>">
                <?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="notelp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $anggota['NoTelp'] ?>">
                <?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $anggota['Email'] ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="pemilik" class="col-sm-2 col-form-label">Pemilik</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= $anggota['Pemilik'] ?>">
                <?= form_error('pemilik', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="jenisbu" class="col-sm-2 col-form-label">Jenis BU</label>
            <div class="col-sm-10">
                <select class="form-control" id="jenisbu" name="jenisbu">
                    <option value=""></option>
                    <?php foreach ($jenisbu as $row) : ?>
                        <?php if ($row['JenisBUCode'] == $anggota['JenisBU']) { ?>
                            <option value="<?= $row['JenisBUCode'] ?>" selected><?= $row['JenisBUName'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['JenisBUCode'] ?>"><?= $row['JenisBUName'] ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <?= form_error('jenisbu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="bentukbu" class="col-sm-2 col-form-label">Bentuk BU</label>
            <div class="col-sm-10">
                <select class="form-control" id="bentukbu" name="bentukbu">
                    <option value=""></option>
                    <?php foreach ($bentukbu as $row) : ?>
                        <?php if ($row['BentukBUCode'] == $anggota['BentukBU']) { ?>
                            <option value="<?= $row['BentukBUCode'] ?>" selected><?= $row['BentukBUName'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['BentukBUCode'] ?>"><?= $row['BentukBUName'] ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <?= form_error('bentukbu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="grade" class="col-sm-2 col-form-label">Grade</label>
            <div class="col-sm-10">
                <select class="form-control" id="grade" name="grade">
                    <option value=""></option>
                    <?php foreach ($grade as $row) : ?>
                        <?php if ($row['GradeCode'] == $anggota['Grade']) { ?>
                            <option value="<?= $row['GradeCode'] ?>" selected><?= $row['GradeName'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['GradeCode'] ?>"><?= $row['GradeName'] ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <?= form_error('grade', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="kekayaan" class="col-sm-2 col-form-label">Kekayaan</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kekayaan" name="kekayaan" value="<?= $anggota['Kekayaan'] ?>">
                <?= form_error('kekayaan', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <input type="submit" class="btn btn-success mx-1 my-1" name="submit" value="Save">
            <a href="<?= base_url('anggota'); ?>" class="btn btn-danger mx-1 my-1">Back to List</a>
        </div>
    </form>

    <p>
        <h4>Sub Bidang</h4>
    </p>

    <form action="<?= base_url('anggota/insertsubbidang/').$anggota['Id']; ?>" method="POST">
        <div class="form-group row">
            <div class="col-sm-11">
                <select class="form-control" id="subbidang" name="subbidang">
                    <?php foreach ($listsubbidang as $row) : ?>
                        <option value="<?= $row['SubBidangCode'] ?>"><?= $row['SubBidangName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-1">
                <input type="submit" class="btn btn-success mx-1 my-1" name="submit" value="Add">
            </div>
        </div>
    </form>

    <p>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Kode</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($subbidang as $row) : ?>
                    <?php if($i % 2 == 0) { ?>
                    <tr class="table-secondary">
                    <?php } else { ?>
                    <tr>
                    <?php } ?>
                        <td><?= $i; ?></td>
                        <td><?= $row['SubBidangCode']; ?></td>
                        <td><?= $row['SubBidangName']; ?></td>
                        <td>
                            <a href="<?= base_url('anggota/deleteSubBidang/').$anggota['Id'].'/'.$row['Id']; ?>" class="btn btn-danger mx-1 my-1" onclick="return confirm('Are You sure?');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </p>
</div>