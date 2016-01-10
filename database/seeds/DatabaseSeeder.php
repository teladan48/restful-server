<?php

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
        DB::table('events')->delete();
        DB::table('users')->delete();

        factory(App\Entities\User::class, 20)->create()->each(function ($user) {
            $user->events()->save(factory(App\Entities\Event::class)->make());
            $user->events()->save(factory(App\Entities\Event::class)->make());
        });
    }
}
