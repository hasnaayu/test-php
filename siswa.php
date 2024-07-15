<?php
class Nilai
{
    public $mapel;
    public $nilai;
    public function __construct($mapel, $nilai)
    {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

class Siswa
{
    public $nrp;
    public $nama;
    public $daftarNilai = array();
    public function __construct($nrp, $nama)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
    }

    public function addNilai($mapel, $nilai)
    {
        if (count($this->daftarNilai) < 3) {
            $this->daftarNilai[] = new Nilai($mapel, $nilai);
        }
    }
}

$siswaNew = new Siswa("001", "Nama Siswa");
$siswaNew->addNilai("Inggris", 100);

echo "NRP: " . $siswaNew->nrp . "\n";
echo "Nama: " . $siswaNew->nama . "\n";

foreach ($siswaNew->daftarNilai as $nilai) {
    echo "Mapel: " . $nilai->mapel . ", Nilai: " . $nilai->nilai . "\n";
}

echo "\n";

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomSiswa()
{
    $nrp = rand(100, 999);
    $nama = generateRandomString();
    $siswa = new Siswa($nrp, $nama);
    $listMapel = ["Inggris", "Indonesia", "Jepang"];

    for ($i = 0; $i < 3; $i++) {
        $mapel = $listMapel[array_rand($listMapel)];
        $nilai = rand(0, 100);
        $siswa->addNilai($mapel, $nilai);
    }

    return $siswa;
}

$siswaArray = array();
for ($i = 0; $i < 10; $i++) {
    $siswaArray[] = generateRandomSiswa();
}

foreach ($siswaArray as $siswa) {
    echo "NRP: " . $siswa->nrp . "\n";
    echo "Nama: " . $siswa->nama . "\n";

    foreach ($siswa->daftarNilai as $nilai) {
        echo "Mapel: " . $nilai->mapel . ", Nilai: " . $nilai->nilai . "\n";
    }

    echo "\n";
}