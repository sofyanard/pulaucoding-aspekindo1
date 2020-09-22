<div class="container mt-2">
    <div>
        <a href="<?= base_url('summary'); ?>">Summary Home</a>
    </div>
    <p>
        <h5><a href="<?= base_url('summary/summary2'); ?>">Jumlah Anggota Berdasarkan Kota/Kabupaten</a></h5>
    </p>

    <form action="<?= base_url('summary/summary2z'); ?>" method="POST">
        <div class="form-group row">
            <label for="propinsi" class="col-form-label">Propinsi</label>
            <div class="col">
                <select class="form-control" id="propinsi" name="propinsi">
                    <option value=""></option>
                    <?php foreach ($propinsi as $row) : ?>
                        <option value="<?= $row['PropinsiId'] ?>"><?= $row['PropinsiName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
        </div>
    </form>

    <p>
        <div id="chart_div"></div>
    </p>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Propinsi</th>
                <th scope="col"><a href="<?= base_url('summary/summary2/').$this->uri->segment(3).'?orderby='.$orderbykota; ?>">Kota/Kabupaten</a></th>
                <th scope="col"><a href="<?= base_url('summary/summary2/').$this->uri->segment(3).'?orderby='.$orderbyjumlah; ?>">Jumlah</a></th>
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
                    <td><?= $row['PropinsiName']; ?></td>
                    <td><?= $row['KotaName']; ?></td>
                    <td><a href="<?= base_url('anggota/display?propinsi=').$row['PropinsiId'].'&kota='.$row['KotaId'].'&from='.current_url(); ?>"><?= $row['Jumlah']; ?></a></td>
                </tr>
                <?php $i++; $total = $total + (int)$row['Jumlah']; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td><b>TOTAL</b></td>
                <td><b><?= $total; ?></b></td>
            </tr>
        </tfoot>
    </table>
</div>