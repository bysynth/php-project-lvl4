<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            'Bug' => 'Указывает на непредвиденную проблему или непреднамеренное поведение',
            'Documentation' => 'Указывает на необходимость улучшения или дополнения документации',
            'Enhancement' => 'Указывает на новые запросы функций',
            'Question' => 'Указывает, что для задачи требуется дополнительная информация'
        ];

        foreach ($labels as $name => $desc) {
            Label::create([
                'name' => $name,
                'description' => $desc
            ]);
        }
    }
}
