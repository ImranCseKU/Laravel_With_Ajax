<?php

use Illuminate\Database\Seeder;

class ThanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TblThana::class, 50)->create();
    }
}
