<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'          => $row['name'],
            'title'         => $row['title'],
            'addressline'   => $row['addressline'],
            'town'          => $row['town'],
            'phone'         => $row['phone'],
            'role'          => $row['role'],
            'email'         => $row['email'],
            'password'      => Hash::make($row['password']),
        ]);
    }
}