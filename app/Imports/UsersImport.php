<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Department;
use App\Designation;
use App\UserProfile;
use Carbon\Carbon;
use DateTime;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (Department::where('name', '=', $row['department'])->count() > 0) {
            $department = Department::where('name', '=', $row['department'])->first();
        }
        else
        {
            $department = new Department;
            $department->name = $row['department'];
            $department->save();
        }

        if (Designation::where('name', '=', $row['designation'])->count() > 0) {
            $designation = Designation::where('name', '=', $row['designation'])->first();
        }
        else
        {
            $designation = new Designation;
            $designation->name = $row['designation'];
            $designation->save();
        }

        $user = new User;
        $user->department_id = $department->id;
        $user->designation_id = $designation->id;
        $user->name = $row['name'];
        $user->last_name = $row['lastname'];
        $user->middle_name = $row['middlename'];
        $user->email = $row['email'];
        $user->password = Hash::make(123);
        $user->role = $row['role'];
        $user->status = $row['status'];
        $user->save();

        $user_profile  = new UserProfile;
        $user_profile->user_id = $user->id;
        $user_profile->phone =  $row['phone'];
        $user_profile->address_1 =  $row['address1'];
        $user_profile->address_2 =  $row['address2'];
        $user_profile->city =  $row['city'];
        $user_profile->state =  $row['state'];
        $user_profile->country =  $row['country'];
        $user_profile->gender =  $row['gender'];
        $user_profile->management_level =  $row['managementlevel'];
        $user_profile->save();
    }
}
