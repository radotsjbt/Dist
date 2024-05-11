<?php
namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class UserImportPetani implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $faker = Faker::create();
        $email = $row['farmer_email'] ?? $faker->unique()->safeEmail;

        $user = User::create([
            'name' => $row['farmer_name'],
            'email' => $email,
            'password' => Hash::make('12341234'),
        ]);

        // Menetapkan role petani
        if (!Role::where('name', 'petani')->exists()) {
            Role::create(['name' => 'petani']);
        }

        $user->assignRole('petani');

        return $user;
    }
}
