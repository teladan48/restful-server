<?php

use App\Entities\User;
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

        User::create([
            'api_token' => '123456',
            'name'      => 'Test User',
            'email'     => 'test@teladan07.org',
        ]);

        factory(App\Entities\User::class, 50)->create()->each(function ($user) {
            $user->events()->save(factory(App\Entities\Event::class)->make());
            $user->events()->save(factory(App\Entities\Event::class)->make());
        });
    }
}
