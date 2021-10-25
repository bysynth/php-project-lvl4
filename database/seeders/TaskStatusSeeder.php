<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Новый',
            'В работе',
            'На тестировании',
            'Завершен'
        ];

        foreach ($statuses as $status) {
            TaskStatus::create(['name' => $status]);
        }
    }
}
