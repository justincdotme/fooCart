<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
        $this->call('ManufacturersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('TaxesTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('ProductImagesTableSeeder');
        $this->call('MessagesTableSeeder');
        $this->call('SlideshowsTableSeeder');
        $this->call('SlidesTableSeeder');
        $this->call('CustomersTableSeeder');
        $this->call('OrdersTableSeeder');
        $this->call('OrderProductsTableSeeder');
	}
}
