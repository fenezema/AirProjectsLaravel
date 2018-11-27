<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$jenis = ["Web Dev","Mobile App Dev","Desktop App Dev","Graphic Design","Photography","3D Modelling"];
    	$skills = ["C/C++","C#","Objective-C","Visual Basic","VBA","Python","PHP","Java","Javascript","R","Swift","Matlab","TypeScript","Ruby","Scala","Kotlin","Go","Perl","Lua","Rust","Haskell","Julia","Delphi","HTML","CSS","SASS","SCSS","Django","Flask","Cake","Ruby on Rails","ExpressJS","NodeJS","Angular","ReactJS","CodeIgniter","Laravel","Symfony","Sinatra","ASP.NET","Yii","jQuery","Bootstrap","Drupal","Phalcon","Photoshop","Wordpress","Blogger","CMS","Microsoft SQL Server","MySQL","PostgreSQL","SQLite","PostreSQL"];
    	for ($i=0; $i < count($jenis); $i++) { 
    		DB::table('project_types')->insert([
            	'type_name' => $jenis[$i],
        	]);
    	}

    	for ($i=0; $i < count($skills); $i++) { 
    		DB::table('tags')->insert([
            	'tags_name' => $skills[$i],
        	]);
    	}
    }
}
