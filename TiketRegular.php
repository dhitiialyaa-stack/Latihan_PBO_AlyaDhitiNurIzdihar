<?php
// TiketRegular.php
require_once 'Tiket.php';
require_once 'koneksi/database.php';

class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM tabel_tiket WHERE id_tiket = :id AND jenis_studio = 'Regular'";
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
            $row['tipe_audio'],
            $row['lokasi_baris']
        );
    }

    // Overriding Tahap 5: Tarif standar murni
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Studio Regular: Tipe Audio " . $this->tipeAudio . ", Kursi di baris " . $this->lokasiBaris . ".";
    }
}
?>