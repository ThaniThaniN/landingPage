<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Section;
use Illuminate\Database\Seeder;

class DefaultSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // An array of the main sections
        $sections = [
            ['name' => 'benefits', 'cards' => [1 ,2 ,3], 'title' => 'Thani Benefits'],
            ['name' => 'video', 'title' => 'Video Section', 'link' => 'https://www.youtube.com/watch?v=rWCCsJ4x1ls'],
            ['name' => 'features', 'title' => 'Features Benefits',  'cards' => [1, 2, 3, 4, 5, 6]],
            ['name' => 'business-plan', 'title' => 'How to Start With Us Section', 'link' => 'https://www.youtube.com/embed/CdtqrZwPDVw?si=36-PXA54W7_zyz2n'],
            ['name' => 'services', 'title' => 'Services Section', 'cards' => [1, 2, 3]],
            ['name' => 'future-plans', 'title' =>' Future Plans', 'cards' => [1, 2, 3, 4]],
            ['name' => 'faq', 'title' => 'FAQ Section', 'cards' => [1, 2, 3, 4, 5, 6]],
            ['name' => 'getInTouchForm'],
            ['name' => 'footer'],
        ];

        // Loop through each section and create it
        foreach ($sections as $section) {
            Section::create($section);
        }

        // An array of the demo cards
        $cards = [
            ['section_id' => 1, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-package"></i>' ],
            ['section_id' => 1, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-star"></i>' ],
            ['section_id' => 1, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-drop"></i>' ],
            ['section_id' => 3, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="fa-solid fa-users"></i>' ],
            ['section_id' => 3, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="fa-solid fa-boxes-packing"></i>' ],
            ['section_id' => 3, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="fa-solid fa-calculator"></i>' ],
            ['section_id' => 3, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="fa-solid fa-building-user"></i>' ],
            ['section_id' => 3, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="fa-solid fa-building-circle-arrow-right"></i>' ],
            ['section_id' => 3, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="fa-solid fa-chart-line"></i>' ],
            ['section_id' => 4, 'title' => 'Step 1', 'text' => 'Step 2'],
            ['section_id' => 4, 'title' => 'Step 3',  'text' => '', 'icon' => '' ],
            ['section_id' => 5, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-cog"></i>' ],
            ['section_id' => 5, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-brush"></i>' ],
            ['section_id' => 5, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-heart"></i>' ],
//            Don't add any new cards before this line
            ['section_id' => 6, 'title' => 'The Second Title', 'text' => 'Demo Text' ],
            ['section_id' => 6, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-cog"></i>' ],
            ['section_id' => 6, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-brush"></i>' ],
            ['section_id' => 6, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-heart"></i>' ],
            ['section_id' => 7, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-package"></i>' ],
            ['section_id' => 7, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-package"></i>' ],
            ['section_id' => 7, 'title' => 'Demo Title', 'text' => 'Demo Text', 'icon' => '<i class="lni-package"></i>' ]
        ];


        // Loop through each card and create it
        foreach ($cards as $card) {
            Card::create($card);
        }
    }
}
