<div class="container mt-2">
    <div>
        <a href="<?= base_url('summary'); ?>">Summary Home</a>
    </div>
    <p>
        <h5><a href="<?= base_url('summary/summary4'); ?>">Jumlah Anggota Berdasarkan Grade</a></h5>
    </p>

    <form action="<?= base_url('summary/summary4z'); ?>" method="POST">
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
                <select class="form-control" id="kota" name="kota">
                </select>
            </div>
        </div>
        <div class="row">
            <input type="submit" class="btn btn-primary mx-1" name="submit" value="Submit">
        </div>
    </form>

    <p>
        <div id="chart_div"></div>
    </p>

    <p>
        <h5>
        <?php
            if (($propinsiname != NULL) && ($propinsiname != '')) { echo 'Propinsi : '.$propinsiname; }
            if (($kotaname != NULL) && ($kotaname != '')) { echo ' - Kota/Kabupaten : '.$kotaname; }
        ?>
        </h5>
    </p>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Grade</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; $total = 0; ?>
            <?php foreach($result as $row) : ?>
                <?php if($i % 2 == 0) { ?>
                <tr class="table-secondary">
                <?php } else { ?>
                <tr>
                <?php } ?>
                    <td><?= $i; ?></td>
                    <td><?= $row['GradeName']; ?></td>
                    <td><a href="<?= base_url('anggota/display?grade=').$row['GradeCode']; ?><?= ($this->uri->segment(3) != '') ? '&propinsi='.$this->uri->segment(3) : '' ?><?= ($this->uri->segment(4) != '') ? '&kota='.$this->uri->segment(4) : '' ?>&from=<?= current_url(); ?>"><?= $row['Jumlah']; ?></a></td>
                </tr>
                <?php $i++; $total = $total + (int)$row['Jumlah']; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td><b>TOTAL</b></td>
                <td><b><?= $total; ?></b></td>
            </tr>
        </tfoot>
    </table>
</div>