<?php
// TiketRegular.php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti tambahan khusus Regular
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari abstract class Tiket
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengimplementasikan metode hitungTotalHarga
    public function hitungTotalHarga() {
        // Untuk studio Regular, harga total adalah harga dasar dikali jumlah kursi
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Mengimplementasikan metode tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        return "Fasilitas Studio Regular: Tipe Audio " . $this->tipeAudio . ", Kursi di baris " . $this->lokasiBaris . ".";
    }
}
?>