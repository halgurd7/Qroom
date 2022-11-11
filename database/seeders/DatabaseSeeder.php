<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()->create([
        //     'name'=>'Rovar Kamil',
        //     'address'=>'Ashty 16',
        //     'contact_1'=>'07731554024',
        //     'contact_2'=>'07701576682',
        //     'free_trail'=>'bronze',
        //     'note'=>'',
        //     'username'=>'Rovar2000',
        // ]);

        Invoice::factory(12)->create();
    }
}