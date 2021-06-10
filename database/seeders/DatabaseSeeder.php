<?php
/**
 *  database/seeders/DatabaseSeeder.php
 *
 * Date-Time: 10.06.21
 * Time: 13:59
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class DatabaseSeeder
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test test',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);

    }
}
