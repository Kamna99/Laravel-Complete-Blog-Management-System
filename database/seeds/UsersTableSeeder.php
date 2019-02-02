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
       $user=App\User::create([
            'name'=> 'Kamna Agrawal',
            'email'=> 'kamna@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatar/avatar.png',
            'about'=> 'Used as a list of thematically grouped functions/methods. I decided to organize things by     function rather than alphabetically. That’s the same way a handyman organizes his tools in the toolbox. Makes needed things easier to find.',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'
        ]);
        
        
    }
}
