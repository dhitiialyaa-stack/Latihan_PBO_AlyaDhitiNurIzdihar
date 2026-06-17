<?php
// TiketVelvet.php
require_once 'Tiket.php';
require_once 'koneksi/database.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack; // Properti tambahan Tahap 4
    private $layananButler; // Properti tambahan Tahap 4

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Fungsi Query Select Where
    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Velvet'";
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

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Studio Velvet: Menggunakan " . $this->bantalSelimutPack . ", Didukung oleh " . $this->layananButler . ".";
    }
}
?>