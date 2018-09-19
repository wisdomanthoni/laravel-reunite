<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 3)->create()->each(function($u) {
           $f = $u->films()->save(factory(App\Film::class)->make());
           $c =  factory(App\Comment::class)->create([
                'user_id' => $u->id,
                'film_id' => $f->id,
            ]);

        });
    }
}
