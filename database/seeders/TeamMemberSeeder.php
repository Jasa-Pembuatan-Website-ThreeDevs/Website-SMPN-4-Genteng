<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            // UKS Team
            [
                'name' => 'Dr. Citra Lestari',
                'role' => 'Dokter Pembina UKS',
                'category' => 'UKS',
                'image' => 'https://images.unsplash.com/photo-1621252033503-4c9c1b1c3e3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80',
                'description' => 'Bertanggung jawab atas program kesehatan dan penanganan kasus darurat.',
                'order' => 1,
            ],
            [
                'name' => 'Suster Ana Wijaya',
                'role' => 'Perawat UKS',
                'category' => 'UKS',
                'image' => 'https://images.unsplash.com/photo-1579684385127-be080d9c8659?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80',
                'description' => 'Pelayanan P3K, pemeriksaan rutin, dan penyuluhan kesehatan.',
                'order' => 2,
            ],
            [
                'name' => 'Pak Surya, S.Pd.',
                'role' => 'Guru Pembina UKS',
                'category' => 'UKS',
                'image' => 'https://images.unsplash.com/photo-1559839734-2b71d9120257?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80',
                'description' => 'Koordinasi program UKS dengan pihak sekolah dan orang tua.',
                'order' => 3,
            ],
            // BK Team
            [
                'name' => 'Budi Santoso, S.Pd.',
                'role' => 'Koordinator BK',
                'category' => 'BK',
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734b0a4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80',
                'description' => 'Berpengalaman 15 tahun dalam konseling karir.',
                'order' => 1,
            ],
            [
                'name' => 'Dewi Anggraini, M.Psi.',
                'role' => 'Konselor Akademik',
                'category' => 'BK',
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80',
                'description' => 'Spesialis dalam membantu motivasi belajar siswa.',
                'order' => 2,
            ],
            [
                'name' => 'Cahyo Wibowo, S.Pd.',
                'role' => 'Konselor Sosial',
                'category' => 'BK',
                'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80',
                'description' => 'Fokus pada pengembangan keterampilan sosial siswa.',
                'order' => 3,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
