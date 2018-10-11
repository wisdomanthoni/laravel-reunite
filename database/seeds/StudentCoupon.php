<?php

use Illuminate\Database\Seeder;

class StudentCoupon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Coupon::class, 5)->create(
            [
                'type' => 'Student Coupon'
            ]
        );
    }
}
