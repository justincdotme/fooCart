<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(CategoryTableSeeder::class);
        $this->call(ManufacturerTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BankcardTableSeeder::class);
        $this->call(InvoiceStatusTableSeeder::class);
        $this->call(PromoCodeTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(ShippingOptionTableSeeder::class);
        $this->call(ShipmentTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(ProductShippingOptionTableSeeder::class);
        $this->call(InvoiceItemTypeTableSeeder::class);
        $this->call(TaxRateTableSeeder::class);
        $this->call(InvoiceItemTableSeeder::class);
    }
}
