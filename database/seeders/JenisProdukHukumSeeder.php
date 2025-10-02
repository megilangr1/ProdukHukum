<?php

namespace Database\Seeders;

use App\Models\JenisProdukHukum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisProdukHukumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_jenis_ph' => 'PERDA',
                'nama_jenis_ph' => 'Peraturan Daerah (Perda)',
                'keterangan' => 'Peraturan yang ditetapkan bersama DPRD & Kepala Daerah.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'PERGUB',
                'nama_jenis_ph' => 'Peraturan Gubernur (Pergub)',
                'keterangan' => 'Aturan pelaksanaan Perda di tingkat provinsi.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'PERBUP',
                'nama_jenis_ph' => 'Peraturan Bupati (Perbup)',
                'keterangan' => 'Aturan pelaksanaan Perda di tingkat kabupaten.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'PERWAL',
                'nama_jenis_ph' => 'Peraturan Walikota (Perwali)',
                'keterangan' => 'Aturan pelaksanaan Perda di tingkat kota.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'KEPGUB',
                'nama_jenis_ph' => 'Keputusan Gubernur',
                'keterangan' => 'Keputusan administratif yang dikeluarkan oleh Gubernur.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'KEPBUP',
                'nama_jenis_ph' => 'Keputusan Bupati',
                'keterangan' => 'Keputusan administratif yang dikeluarkan oleh Bupati.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'KEPWAL',
                'nama_jenis_ph' => 'Keputusan Walikota',
                'keterangan' => 'Keputusan administratif yang dikeluarkan oleh Walikota.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'SE',
                'nama_jenis_ph' => 'Surat Edaran (SE)',
                'keterangan' => 'Arahan/imbauan resmi dari Kepala Daerah.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'INSTR',
                'nama_jenis_ph' => 'Instruksi Kepala Daerah',
                'keterangan' => 'Instruksi langsung dari Kepala Daerah kepada perangkat.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'SK',
                'nama_jenis_ph' => 'Surat Keputusan (SK)',
                'keterangan' => 'Penetapan resmi, biasanya bersifat individual/khusus.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'MOU',
                'nama_jenis_ph' => 'Nota Kesepakatan / MoU',
                'keterangan' => 'Perjanjian atau kesepahaman dengan pihak lain.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'PKS',
                'nama_jenis_ph' => 'Perjanjian Kerja Sama (PKS)',
                'keterangan' => 'Dokumen kerja sama operasional antar pihak/instansi.',
                'nama_creator' => 'Generated'
            ],
            [
                'kode_jenis_ph' => 'PERJ',
                'nama_jenis_ph' => 'Perjanjian (lain-lain)',
                'keterangan' => 'Perjanjian hukum selain PKS/MoU.',
                'nama_creator' => 'Generated'
            ],
        ];

        try {
            foreach ($data as $key => $value) {
                JenisProdukHukum::firstOrCreate($value);
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
    }
}
