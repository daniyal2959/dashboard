<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = new Department();
        $department->name = 'پشتیبانی فنی';
        $department->save();

        $department = new Department();
        $department->name = 'واحد مالی';
        $department->save();

        $department = new Department();
        $department->name = 'واحد منابع انسانی';
        $department->save();

        $department = new Department();
        $department->name = 'بازاریابی';
        $department->save();
    }
}
