<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TriggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'database/seeds/disparadores.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Triggers ejecutados correctamente.');
    }
}
