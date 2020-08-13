<div class="container mt-2">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p>
        <h3><?= $anggota['TipeBUName']; ?> <?= $anggota['NamaBU']; ?></h3>
    </p>

    <p>
        <div class="card"><div class="card-body">
            <table class="table">
                <tr>
                    <td><b>NRBU</b></td>
                    <td><?= $anggota['NRBU']; ?></td>
                </tr>
                <!--
                <tr class="table-info">
                    <td><b>Tipe BU</b></td>
                    <td><?= $anggota['TipeBUName']; ?></td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td><?= $anggota['NamaBU']; ?></td>
                </tr>
                -->
                <tr class="table-info">
                    <td><b>NPWP</b></td>
                    <td><?= $anggota['NPWP']; ?></td>
                </tr>
                <tr>
                    <td><b>Alamat</b></td>
                    <td><?= $anggota['Alamat']; ?></td>
                </tr>
                <tr class="table-info">
                    <td><b>Kota/Kabupaten</b></td>
                    <td><?= $anggota['KotaName']; ?></td>
                </tr>
                <tr>
                    <td><b>Propinsi</b></td>
                    <td><?= $anggota['PropinsiName']; ?></td>
                </tr>
                <tr class="table-info">
                    <td><b>Kode Pos</b></td>
                    <td><?= $anggota['KodePos']; ?></td>
                </tr>
                <tr>
                    <td><b>No Telp</b></td>
                    <td><?= $anggota['NoTelp']; ?></td>
                </tr>
                <tr class="table-info">
                    <td><b>Email</b></td>
                    <td><?= $anggota['Email']; ?></td>
                </tr>
                <tr>
                    <td><b>Pemilik</b></td>
                    <td><?= $anggota['Pemilik']; ?></td>
                </tr>
                <tr class="table-info">
                    <td><b>Jenis BU</b></td>
                    <td><?= $anggota['JenisBUName']; ?></td>
                </tr>
                <tr>
                    <td><b>Bentuk BU</b></td>
                    <td><?= $anggota['BentukBUName']; ?></td>
                </tr>
                <tr class="table-info">
                    <td><b>Grade</b></td>
                    <td><?= $anggota['GradeName']; ?></td>
                </tr>
                <tr>
                    <td><b>Kekayaan</b></td>
                    <td><?= number_format($anggota['Kekayaan'], 2); ?></td>
                </tr>
            </table>
        </div></div>
    </p>

    <p>
        <h4>Sub Bidang</h4>
    </p>

    <p>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Kode</th>
                    <th scope="col">Deskripsi</th>
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
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </p>
</div>