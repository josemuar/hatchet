<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MOffice;

class MOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        MOffice::create([
        'name' => 'St Georges Terrace',
        'price' => '1900',
        'offices' => '4',
        'tables' => '8',
        'sqm' => '300',
    	]);

    	MOffice::create([
        'name' => 'Murray Street',
        'price' => '1700',
        'offices' => '3',
        'tables' => '6',
        'sqm' => '320',
    	]);

    	

    	MOffice::create([
        'name' => 'Barrack Street',
        'price' => '1500',
        'offices' => '3',
        'tables' => '6',
        'sqm' => '300',
    	]);
    	MOffice::create([
        'name' => 'Hay Street',
        'price' => '1300',
        'offices' => '4',
        'tables' => '8',
        'sqm' => '180',
    	]);
    	MOffice::create([
        'name' => 'Willian Street',
        'price' => '1300',
        'offices' => '2',
        'tables' => '4',
        'sqm' => '180',
    	]);

    	MOffice::create([
        'name' => 'Wellington Street',
        'price' => '1200',
        'offices' => '2',
        'tables' => '3',
        'sqm' => '160',
    	]);


    	MOffice::create([
        'name' => 'Adelaide Terrace',
        'price' => '980',
        'offices' => '2',
        'tables' => '3',
        'sqm' => '180',
    	]);

    	MOffice::create([
        'name' => 'Kings Park Road',
        'price' => '850',
        'offices' => '1',
        'tables' => '2',
        'sqm' => '120',
    	]);

    	MOffice::create([
        'name' => 'Roe Street',
        'price' => '690',
        'offices' => '1',
        'tables' => '1',
        'sqm' => '70',
    	]);

    }
}
