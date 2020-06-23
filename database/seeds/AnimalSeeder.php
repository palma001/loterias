<?php

use App\Animal;
use App\Sort;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creando el sorteo
        $sort = new Sort();
        $sort->description = 'Lotto Activo';
        $sort->pay_per_100 = 3000;
        $sort->slug = Str::slug('Lotto Activo');
        $sort->folder = 'lottoActivo';
        $sort->daily_limit = 10000;
        $sort->save();

        // Cargando los animales
        $animal = new Animal();
        $animal->name = 'Nro0';
        $animal->number = '0';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro1';
        $animal->number = '1';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro2';
        $animal->number = '2';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro3';
        $animal->number = '3';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro4';
        $animal->number = '4';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro5';
        $animal->number = '5';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro6';
        $animal->number = '6';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro7';
        $animal->number = '7';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro8';
        $animal->number = '8';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro9';
        $animal->number = '9';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro10';
        $animal->number = '10';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro11';
        $animal->number = '11';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro12';
        $animal->number = '12';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro13';
        $animal->number = '13';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro14';
        $animal->number = '14';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro15';
        $animal->number = '15';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro16';
        $animal->number = '16';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro17';
        $animal->number = '17';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro18';
        $animal->number = '18';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro19';
        $animal->number = '19';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro20';
        $animal->number = '20';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro21';
        $animal->number = '21';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro22';
        $animal->number = '22';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro23';
        $animal->number = '23';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro24';
        $animal->number = '24';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro25';
        $animal->number = '25';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro26';
        $animal->number = '26';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro27';
        $animal->number = '27';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro28';
        $animal->number = '28';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro29';
        $animal->number = '29';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro30';
        $animal->number = '30';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro31';
        $animal->number = '31';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro32';
        $animal->number = '32';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro33';
        $animal->number = '33';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro34';
        $animal->number = '34';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro35';
        $animal->number = '35';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro36';
        $animal->number = '36';
        $animal->sort_id = $sort->id;
        $animal->save();

        // Creando el sorteo
        $sort = new Sort();
        $sort->description = 'La granjita';
        $sort->slug = Str::slug('La granjita');
        $sort->pay_per_100 = 3000;
        $sort->folder = 'lottoActivo';
        $sort->daily_limit = 10000;
        $sort->save();

        // Cargando los animales
        $animal = new Animal();
        $animal->name = 'Nro0';
        $animal->number = '0';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro1';
        $animal->number = '1';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro2';
        $animal->number = '2';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro3';
        $animal->number = '3';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro4';
        $animal->number = '4';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro5';
        $animal->number = '5';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro6';
        $animal->number = '6';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro7';
        $animal->number = '7';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro8';
        $animal->number = '8';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro9';
        $animal->number = '9';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro10';
        $animal->number = '10';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro11';
        $animal->number = '11';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro12';
        $animal->number = '12';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro13';
        $animal->number = '13';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro14';
        $animal->number = '14';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro15';
        $animal->number = '15';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro16';
        $animal->number = '16';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro17';
        $animal->number = '17';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro18';
        $animal->number = '18';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro19';
        $animal->number = '19';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro20';
        $animal->number = '20';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro21';
        $animal->number = '21';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro22';
        $animal->number = '22';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro23';
        $animal->number = '23';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro24';
        $animal->number = '24';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro25';
        $animal->number = '25';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro26';
        $animal->number = '26';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro27';
        $animal->number = '27';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro28';
        $animal->number = '28';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro29';
        $animal->number = '29';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro30';
        $animal->number = '30';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro31';
        $animal->number = '31';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro32';
        $animal->number = '32';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro33';
        $animal->number = '33';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro34';
        $animal->number = '34';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro35';
        $animal->number = '35';
        $animal->sort_id = $sort->id;
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Nro36';
        $animal->number = '36';
        $animal->sort_id = $sort->id;
        $animal->save();
    }
}
