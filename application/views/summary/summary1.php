<div class="container mt-2">
    <div>
        <a href="<?= base_url('summary'); ?>">Summary Home</a>
    </div>
    <p>
        <h5><a href="<?= base_url('summary/summary1'); ?>">Jumlah Anggota Berdasarkan Propinsi</a></h5>
    </p>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col"><a href="<?= base_url('summary/summary1').'?orderby='.$orderbypropinsi; ?>">Propinsi</a></th>
                <th scope="col"><a href="<?= base_url('summary/summary1').'?orderby='.$orderbyjumlah; ?>">Jumlah</a></th>
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
                    <td><a href="<?= base_url('summary/summary2/').$row['PropinsiId']; ?>"><?= $row['Propinsi']; ?></a></td>
                    <td><a href="<?= base_url('anggota/display?propinsi=').$row['PropinsiId'].'&from='.current_url(); ?>"><?= $row['Jumlah']; ?></a></td>
                </tr>
                <?php $i++; $total = $total + (int)$row['Jumlah']; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></th>
                <th><b>TOTAL</b></th>
                <td><b><?= $total; ?></b></th>
            </tr>
        </tfoot>
    </table>
</div>