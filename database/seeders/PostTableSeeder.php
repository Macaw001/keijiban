<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    	$param = [
		'content' => 'article one',
	];
	DB::table('post')->insert($param);
    	$param = [
		'content' => 'article two',
	];
	DB::table('post')->insert($param);
    	$param = [
		'content' => 'article three',
	];
	DB::table('post')->insert($param);
    	$param = [
		'content' => 'article four',
	];
	DB::table('post')->insert($param);
    	$param = [
		'content' => 'article five',
	];
	DB::table('post')->insert($param);
    	$param = [
		'content' => 'article six',
	];
	DB::table('post')->insert($param);
    }
}
