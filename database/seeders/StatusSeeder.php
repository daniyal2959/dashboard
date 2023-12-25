<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = new Status();
        $status->name = 'بررسی نشده';
        $status->back_color = '#f1f5f9';
        $status->text_color = '#94a3b8';
        $status->save();

        $status = new Status();
        $status->name = 'باز';
        $status->back_color = '#ffedd5';
        $status->text_color = '#fb923c';
        $status->save();

        $status = new Status();
        $status->name = 'در حال انجام';
        $status->back_color = '#f3e8ff';
        $status->text_color = '#c084fc';
        $status->save();

        $status = new Status();
        $status->name = 'پاسخ داده شده';
        $status->back_color = '#e0f2fe';
        $status->text_color = '#38bdf8';
        $status->save();

        $status = new Status();
        $status->name = 'انجام شده';
        $status->back_color = '#d1fae5';
        $status->text_color = '#34d399';
        $status->save();

        $status = new Status();
        $status->name = 'غیر قابل انجام';
        $status->back_color = '#fee2e2';
        $status->text_color = '#f87171';
        $status->save();
    }
}
