<?php
// TiketIMAX.php
require_once 'Tiket.php';
require_once 'koneksi/database.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM tabel_tiket WHERE id_tiket = :id AND jenis_studio = 'IMAX'";
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

    // Overriding Tahap 5: Ditambah biaya teknologi layar & audio Rp35.000
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        $infoKacamata = $this->kacamata3dId ? "Kacamata 3D ID: " . $this->kacamata3dId : "Tanpa Kacamata 3D";
        return "Fasilitas Studio IMAX: " . $infoKacamata . ", Efek Gerak: " . $this->efekGerakFitur . ".";
    }
}
?>