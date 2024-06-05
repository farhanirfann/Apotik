<?php
require_once ('./class/class.obat.php');
$objObat = new Obat();
if (isset($_POST['btnSubmit'])) {
    $objObat->namaobat = $_POST['nama_obat'];
    $objObat->kategori = $_POST['kategori_obat'];
    $objObat->harga = $_POST['harga_obat'];
    $objObat->penjelasan = $_POST['penjelasan_obat'];

    // Upload Foto
    $tipe_file = $_FILES['uploadfoto']['type'];
    $lokasi_file = $_FILES['uploadfoto']['tmp_name'];
    $nama_file = $_FILES['uploadfoto']['name'];
    $ukuran_file = $_FILES['uploadfoto']['size'];
    $folder = './upload/';

    if (
        $tipe_file != "image/jpeg" and
        $tipe_file != "image/png"
    ) {
        echo "<script>alert('Hanya Boleh Mengupload gambar. Pilih file yang lain');</script>";
        echo "<script>window.location = 'index.php?p=tambahobat';</script>";
    } else {
        $isSuccessUpload = move_uploaded_file($lokasi_file, $folder . $nama_file);
        if ($isSuccessUpload) {
            echo "<script>alert('Foto Berhasil Di Upload');</script>";
        }
    }
    $objObat->lokasi_file = $folder . $nama_file;

    $objObat->AddObat();

    echo "<script> alert('$objObat->message'); </script>";
} else {
    $data_obat = $objObat->SelectAllObat();
}
?>

<form enctype="multipart/form-data" method="post" action="index.php?p=tambahobat">
    <table class="table">
        <tr>
            <td>Nama Obat</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="nama_obat" value="<?php echo $objObat->nama_obat; ?>">
            </td>
        </tr>
        <tr>
            <td>Kategori Obat</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="kategori_obat"
                    value="<?php echo $objObat->kategori_obat; ?>">
            </td>
        </tr>
        <tr>
            <td>Harga Obat</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="harga_obat" value="<?php echo $objObat->harga_obat; ?>">
            </td>

        </tr>
        <tr>
            <td>Penjelasan Obat</td>
            <td>:</td>
            <td><textarea class="form-control" name="penjelasan_obat" rows="3" cols="19">
        <?php echo $objObat->penjelasan_obat; ?></textarea></td>
        </tr>
        <tr>
            <td>Upload Foto Obat</td>
            <td>:</td>
            <td>
                <input class="form-control" type="file" id="formFile" name="uploadfoto">
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btn-success" value="Tambahkan" name="btnSubmit">
                <a href="index.php?p=listobat"></a>
            </td>
        </tr>

    </table>
</form>
