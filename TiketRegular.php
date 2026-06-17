<?php
// TiketRegular.php
require_once 'Tiket.php';
require_once 'koneksi/database.php';

class TiketRegular extends Tiket {
    private $tipeAudio; // Properti tambahan Tahap 4
    private $lokasiBaris; // Properti tambahan Tahap 4

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Fungsi Query Select Where
    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Regular'";
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

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Studio Regular: Tipe Audio " . $this->tipeAudio . ", Kursi di baris " . $this->lokasiBaris . ".";
    }
}
?>