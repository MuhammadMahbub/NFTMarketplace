<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::create([
            'question' => 'How do I create an NFT?',
            'answer' => 'Learn how to create your very first NFT and how to create your NFT collections. Unique, fully 3D and
            built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        FAQ::create([
            'question' => 'How can I stay safe and protect my NFTs ?',
            'answer' => 'Learn how to create your very first NFT and how to create your NFT collections. Unique, fully 3D and
            built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        FAQ::create([
            'question' => 'What are the key terms to know in NFTs and Web3 ?',
            'answer' => 'Learn how to create your very first NFT and how to create your NFT collections. Unique, fully 3D and
            built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        FAQ::create([
            'question' => 'How do I sell an NFT ?',
            'answer' => 'Learn how to create your very first NFT and how to create your NFT collections. Unique, fully 3D and
            built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        FAQ::create([
            'question' => 'Smart Contract Upgrade: What You Need to Know',
            'answer' => 'Learn how to create your very first NFT and how to create your NFT collections. Unique, fully 3D and
            built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
    }
}
