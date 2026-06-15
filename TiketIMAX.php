<?php
// TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan khusus IMAX
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga() {
        // Misalnya Studio IMAX ada biaya tambahan teknologi sebesar 25.000 per kursi
        $biayaTambahanIMAX = 25000;
        return ($this->hargaDasarTiket + $biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        $infoKacamata = $this->kacamata3dId ? "Kacamata 3D ID: " . $this->kacamata3dId : "Tanpa Kacamata 3D";
        return "Fasilitas Studio IMAX: " . $infoKacamata . ", Efek Gerak: " . $this->efekGerakFitur . ".";
    }
}
?>