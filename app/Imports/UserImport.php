<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new User([
            'name' => $row['cust_name'],
            'email' => uniqid() . str_replace(" ", "", $row['cust_name']) . "@mail.com",
            'password' => Hash::make("12341234"),
        ]);

        $user->save();

        if (!Role::where('name', 'distributor')->exists()) {
            Role::create(['name' => 'distributor']);
        }

        // Tetapkan role ke pengguna
        $user->assignRole('distributor');

        return $user;
    }
}
