<?php

namespace Database\Seeders;

use App\Models\ItemReport;
use Illuminate\Database\Seeder;

class ItemReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemReport::create([
            'problem' => 'Fake Collection or possible scam',
        ]);
        ItemReport::create([
            'problem' => 'Explicit and sensitive content',
        ]);
        ItemReport::create([
            'problem' => 'Spam',
        ]);
        ItemReport::create([
            'problem' => 'In the wrong category',
        ]);
    }
}
