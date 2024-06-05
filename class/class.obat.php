<?php
class Obat extends Connection
{
    private $kode = '';
    private $namaobat = '';
    private $kategori = '';
    private $harga = '';
    private $penjelasan = '';
    private $lokasi_file = '';


    public $hasil = false;
    public $message = '';
    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }
    public function __set($atribut, $value)
    {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }
    public function AddObat()
    {
        $sql = "INSERT INTO obat (nama_obat, kategori_obat, harga_obat, penjelasan_obat, gambar_obat)
                VALUES ('$this->namaobat', '$this->kategori', '$this->harga', '$this->penjelasan', '$this->lokasi_file')";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan!';
        else
            $this->message = 'Data gagal ditambahkan!';
    }

    public function DeleteObat()
    {
        $sql = "DELETE FROM obat WHERE namaobat='$this->namaobat'";
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil dihapus!';
        else
            $this->message = 'Data gagal dihapus!';
    }
    public function SelectAllObat()
    {
        $sql = "SELECT * FROM obat";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
                $objObat = new Obat();
                $objObat->kode = $data['kode_obat'];
                $objObat->namaobat = $data['nama_obat'];
                $objObat->kategori = $data['kategori_obat'];
                $objObat->harga = $data['harga_obat'];
                $objObat->penjelasan = $data['penjelasan_obat'];
                $objObat->lokasi_file = $data['gambar_obat'];
                $arrResult[$count] = $objObat;
                $count++;
            }

        }
        return $arrResult;
    }
}





?>