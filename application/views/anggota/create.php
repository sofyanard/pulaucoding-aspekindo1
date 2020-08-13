<div class="container mt-2">
    <p>
        <h3>Create New Anggota</h3>
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

    <form action="<?= base_url('anggota/create'); ?>" method="POST">
        <div class="form-group row">
            <label for="nrbu" class="col-sm-2 col-form-label">NRBU</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nrbu" name="nrbu" value="<?= set_value('nrbu'); ?>">
                <?= form_error('nrbu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="tipebu" class="col-sm-2 col-form-label">Tipe BU</label>
            <div class="col-sm-10">
                <select class="form-control" id="tipebu" name="tipebu">
                    <?php foreach ($tipebu as $row) : ?>
                        <option value="<?= $row['TipeBUCode'] ?>"><?= $row['TipeBUName'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('tipebu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="namabu" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namabu" name="namabu" value="<?= set_value('namabu'); ?>">
                <?= form_error('namabu', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="npwp" name="npwp" value="<?= set_value('npwp'); ?>">
                <?= form_error('npwp', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="propinsi" class="col-sm-2 col-form-label">Propinsi</label>
            <div class="col-sm-10">
                <select class="form-control" id="propinsi" name="propinsi">
                    <?php foreach ($propinsi as $row) : ?>
                        <option value="<?= $row['PropinsiId'] ?>"><?= $row['PropinsiName'] ?></option>
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
                        <option value="<?= $row['KotaId'] ?>"><?= $row['KotaName'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kodepos" name="kodepos" value="<?= set_value('kodepos'); ?>">
                <?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="notelp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= set_value('notelp'); ?>">
                <?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="pemilik" class="col-sm-2 col-form-label">Pemilik</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= set_value('pemilik'); ?>">
                <?= form_error('pemilik', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="jenisbu" class="col-sm-2 col-form-label">Jenis BU</label>
            <div class="col-sm-10">
                <select class="form-control" id="jenisbu" name="jenisbu">
                    <option value=""></option>
                    <?php foreach ($jenisbu as $row) : ?>
                        <option value="<?= $row['JenisBUCode'] ?>"><?= $row['JenisBUName'] ?></option>
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
                        <option value="<?= $row['BentukBUCode'] ?>"><?= $row['BentukBUName'] ?></option>
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
                        <option value="<?= $row['GradeCode'] ?>"><?= $row['GradeName'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('grade', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="kekayaan" class="col-sm-2 col-form-label">Kekayaan</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kekayaan" name="kekayaan" value="<?= set_value('kekayaan'); ?>">
                <?= form_error('kekayaan', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <input type="submit" class="btn btn-success mx-1 my-1" name="submit" value="Create">
            <a href="<?= base_url('anggota'); ?>" class="btn btn-danger mx-1 my-1">Back to List</a>
        </div>
    </form>
</div>