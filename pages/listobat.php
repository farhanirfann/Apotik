<h4 class="title">
    <span class="text">
        <strong>List Obat</strong>
    </span>
</h4>
<a class="btn btn-primary" href="index.php?p=tambahobat">Add</a>
<table class="table table-bordered">
    <tr>
        <th>Kode Obat</th>
        <th>Nama Obat</th>
        <th>Kategori Obat</th>
        <th>Harga Obat</th>
        <th>Penjelasan Obat</th>
    </tr>
    <?php
    require_once ('./class/class.obat.php');
    $objObat = new Obat();
    $arrayResult = $objObat->SelectAllObat();
    if (count($arrayResult) == 0) {
        echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
    } else {
        $no = 1;
        foreach ($arrayResult as $dataObat) {
            echo '<tr>';
            echo '<td>' . $dataObat->kode_obat . $no .'</td>';
            echo '<td>' . $dataObat->namaobat . '</td>';
            echo '<td>' . $dataObat->kategori . '</td>';
            echo '<td>' . $dataObat->harga . '</td>';
            echo '<td>' . $dataObat->penjelasan . '</td>';
            echo '<td><a class="btn btn-warning" href="index.php' . $dataObat->kode_obat . '"> Edit </a> | <a class="btn btn-danger" href="index.php' . $dataObat->kode_obat . '"onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete </a> </td>';
            echo '</tr>';
            $no++;
        }
    }
    ?>
</table>