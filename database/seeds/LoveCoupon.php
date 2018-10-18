<?php

use Illuminate\Database\Seeder;

class LoveCoupon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Coupon::class, 100)->create(
            [
                'type' => 'I Love DevFestSS Coupon'
            ]
        );
    }
}
