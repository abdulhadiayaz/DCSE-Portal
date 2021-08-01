<?php

use App\Category;
use App\Company;
use App\Job;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Category::truncate();
        Role::truncate();

        factory(User::class, 20)->create();
        factory(Company::class, 20)->create();
        factory(Job::class, 20)->create();
        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];
        foreach ($categories as $category){
            Category::create(['name'=>$category]);
        }

        $adminRole = Role::create(['name'=>'admin']);
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('testX50,'),
            'email_verified_at'=>now(),
        ]);
        $admin->roles()->attach($adminRole->id);

    }
}
