<?php
// TiketVelvet.php
require_once 'Tiket.php';
require_once 'koneksi/database.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM tabel_tiket WHERE id_tiket = :id AND jenis_studio = 'Velvet'";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new self(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['bantal_selimut_pack'],
            $row['layanan_butler']
        );
    }

    // Overriding Tahap 5: Surcharge premium 50% (* 1.50)
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Studio Velvet: Menggunakan " . $this->bantalSelimutPack . ", Didukung oleh " . $this->layananButler . ".";
    }
}
?>