<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrioridadTareas;

class prioridad extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $priotareas = new PrioridadTareas();
       $priotareas->nombre = 'Alta';
       $priotareas->save();

       $priotareas = new PrioridadTareas();
       $priotareas->nombre = 'Media';
       $priotareas->save();

       $priotareas = new PrioridadTareas();
       $priotareas->nombre = 'Baja';
       $priotareas->save();
    }
}
