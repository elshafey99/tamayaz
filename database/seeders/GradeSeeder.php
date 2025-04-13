<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Stage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            'Primary'      => 'ابتدائي',
            'Preparatory'  => 'اعدادي',
            'Secondary'    => 'ثانوي',
        ];

        foreach ($stages as $name_en => $name_ar) {
            $stage = Stage::firstOrCreate(
                ['name_en' => $name_en],
                ['name_ar' => $name_ar]
            );

            for ($i = 1; $i <= 3; $i++) {
                Grade::create([
                    'stage_id' => $stage->id,
                    'name_en'  => "Grade $i - $name_en Stage",
                    'name_ar'  => "الصف $i - مرحلة $name_ar",
                ]);
            }
        }
    }
}
