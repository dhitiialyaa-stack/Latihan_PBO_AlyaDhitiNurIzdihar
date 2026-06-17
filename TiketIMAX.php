<?php
// TiketIMAX.php
require_once 'Tiket.php';
require_once 'koneksi/database.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId; // Properti tambahan Tahap 4
    private $efekGerakFitur; // Properti tambahan Tahap 4

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Fungsi Query Select Where
    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'IMAX'";
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
            $row['kacamata_3d_id'],
            $row['efek_gerak_fitur']
        );
    }

    public function tampilkanInfoFasilitas() {
        $infoKacamata = $this->kacamata3dId ? "Kacamata 3D ID: " . $this->kacamata3dId : "Tanpa Kacamata 3D";
        return "Fasilitas Studio IMAX: " . $infoKacamata . ", Efek Gerak: " . $this->efekGerakFitur . ".";
    }
}
?>