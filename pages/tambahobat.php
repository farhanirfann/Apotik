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
}
?>
<div class="container">
    <div class="text-center pt-4">
        <img src="./img/logo.png" class="img-fluid" style="width:20%" alt="">
    </div>
    <div class="text-center pt-1 mb-4 ">
        <h1>Masukkan Obat</h1>
    </div>


    <form enctype="multipart/form-data" method="post" action="index.php?p=tambahobat">
        <table class="table">
            <div class="mb-3">
                <label class="form-label">Nama Obat</label>
                <input type="text" class="form-control border border-2 border-black" id="exampleFormControlInput1"
                    name="nama_obat" value="<?php echo $objObat->nama_obat; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Obat</label>
                <input type="text" class="form-control border border-2 border-black" id="exampleFormControlInput1"
                    name="kategori_obat" value="<?php echo $objObat->kategori_obat; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Obat</label>
                <input type="text" class="form-control border border-2 border-black" id="exampleFormControlInput1"
                    name="harga_obat" value="<?php echo $objObat->harga_obat; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Penjelasan Obat</label>
                <textarea type="text" class="form-control border border-2 border-black" id="exampleFormControlInput1"
                    rows="3" name="penjelasan_obat" value="<?php echo $objObat->penjelasan_obat; ?>">
            </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Foto Obat</label>
                <input class="form-control border border-2 border-black" type="file" id="formFile" name="uploadfoto">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-success" value="Tambahkan" name="btnSubmit">
                <a href="index.php?p=listobat"></a>
            </div>
        </table>
    </form>
</div>