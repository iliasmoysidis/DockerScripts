<?php

namespace Database\Seeders;

use App\Models\ProjectLocation;
use Illuminate\Database\Seeder;

class ProjectLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = ProjectLocation::count();
        if($total > 0){
            dd('Data already loaded');
        }
        else{
            ProjectLocation::insert([
                ['name' => 'Austria'],
                ['name' => 'Belgium'],
                ['name' => 'Bulgaria'],
                ['name' => 'Croatia'],
                ['name' => 'Cyprus'],
                ['name' => 'Czech Republic'],
                ['name' => 'Denmark'],
                ['name' => 'Estonia'],
                ['name' => 'Finland'],
                ['name' => 'France'],
                ['name' => 'Germany'],
                ['name' => 'Greece'],
                ['name' => 'Hungary'],
                ['name' => 'Iceland'],
                ['name' => 'Ireland'],
                ['name' => 'Italy'],
                ['name' => 'Lithuania'],
                ['name' => 'Luxemburg'],
                ['name' => 'Malta'],
                ['name' => 'Netherlands'],
                ['name' => 'Norway'],
                ['name' => 'Poland'],
                ['name' => 'Portugal'],
                ['name' => 'Romania'],
                ['name' => 'Serbia'],
                ['name' => 'Slovakia'],
                ['name' => 'Slovenia'],
                ['name' => 'Spain'],
                ['name' => 'Sweden'],
                ['name' => 'Switzerland'],
                ['name' => 'United Kingdom']
            ]);
        }
    }
}
