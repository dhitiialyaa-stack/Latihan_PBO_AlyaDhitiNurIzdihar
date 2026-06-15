<?php
// TiketVelvet.php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan khusus Velvet
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga() {
        // Misalnya Studio Velvet ada tambahan biaya premium/luxury sebesar 50.000 per kursi
        $biayaPremium = 50000;
        return ($this->hargaDasarTiket + $biayaPremium) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Studio Velvet: Menggunakan " . $this->bantalSelimutPack . ", Didukung oleh " . $this->layananButler . ".";
    }
}
?>