<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CopyStatusSeeder');
        $this->call('BiblioSeeder');
	}

}

class CopyStatusSeeder extends Seeder {
    public function run()
    {
        DB::table('copy_status')->delete();

        DB::table('copy_status')->insert(array(
            array('id'=>1,'name'=>'in'),
            array('id'=>2,'name'=>'out'),
            array('id'=>3,'name'=>'hold'),
        ));
    }
}

class BiblioSeeder extends Seeder {

    public function run(){

        DB::table('biblios')->delete();

        DB::table('biblios')->insert(array(

            array('title'=>'To Kill a Mockingbird','author'=>'Harper Lee','thumbnail'=>'http://books.google.com/books/content?id=0NEbHGREK7cC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
            array('title'=>'The Hobbit, Or, There and Back Again','author'=>'J.R.R. Tolkien','thumbnail'=>'http://books.google.com/books/content?id=hFfhrCWiLSMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api')
        ));

        DB::table('copies')->delete();

        DB::table('copies')->insert(array(

            array('biblio_id'=>1,'barcode'=>'100'),
            array('biblio_id'=>1,'barcode'=>'101'),
            array('biblio_id'=>2,'barcode'=>'200'),
            array('biblio_id'=>2,'barcode'=>'201'),

        ));
    }
}
