<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $cat1 = Category::firstOrCreate(['slug' => 'laravel'], ['name' => 'Laravel']);
        $cat2 = Category::firstOrCreate(['slug' => 'ai'], ['name' => 'AI']);
        $cat3 = Category::firstOrCreate(['slug' => 'design'], ['name' => 'Design']);

        // dummy 500+ words content (lorem ipsum style)
        $longContent = str_repeat("
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod 
            bibendum magna, sit amet egestas risus vulputate sit amet. Integer at nibh vel 
            leo scelerisque interdum. Fusce sed purus id lacus pulvinar vulputate. Morbi 
            tempor volutpat eros, non tincidunt justo vestibulum a. Donec eu justo sed 
            lacus porta pharetra. Aliquam erat volutpat. Nulla facilisi. Duis non ex ac 
            nibh porta volutpat in nec odio. Vestibulum ante ipsum primis in faucibus orci 
            luctus et ultrices posuere cubilia curae; Vivamus sed mauris vitae magna tempus 
            cursus. Sed auctor, sapien id convallis sodales, lectus est gravida ligula, a 
            fermentum nisl purus nec lorem. Quisque eget egestas nunc. Suspendisse vel 
            condimentum leo. Proin nec vehicula dui, vel tempor neque. Ut pretium erat sit 
            amet dolor pellentesque, vel hendrerit nunc tristique. Pellentesque habitant 
            morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        ", 8); // repeat 8 times (~520 words)

        $posts = [
            // Laravel
            [
                'title' => 'Mastering Laravel Eloquent',
                'slug' => 'mastering-laravel-eloquent',
                'image' => null,
                'type' => 'Guide',
                'excerpt' => 'Tips and tricks for optimizing Laravel Eloquent queries.',
                'content' => $longContent,
                'category_id' => $cat1->id,
            ],
            [
                'title' => 'Laravel Blade Components Deep Dive',
                'slug' => 'laravel-blade-components-deep-dive',
                'image' => null,
                'type' => 'Tutorial',
                'excerpt' => 'Reusable components in Blade for clean UI.',
                'content' => $longContent,
                'category_id' => $cat1->id,
            ],
            [
                'title' => 'API Authentication in Laravel',
                'slug' => 'api-authentication-in-laravel',
                'image' => null,
                'type' => 'Tutorial',
                'excerpt' => 'Implementing Passport & Sanctum authentication.',
                'content' => $longContent,
                'category_id' => $cat1->id,
            ],

            // AI
            [
                'title' => 'The Future of AI in Web Development',
                'slug' => 'future-of-ai-in-web-development',
                'image' => null,
                'type' => 'AI',
                'excerpt' => 'From code generation to smart testing, see how AI is changing our workflow.',
                'content' => $longContent,
                'category_id' => $cat2->id,
            ],
            [
                'title' => 'AI-Powered Testing Automation',
                'slug' => 'ai-powered-testing-automation',
                'image' => null,
                'type' => 'AI',
                'excerpt' => 'Smarter test coverage with AI tools.',
                'content' => $longContent,
                'category_id' => $cat2->id,
            ],
            [
                'title' => 'Ethics of AI in Coding',
                'slug' => 'ethics-of-ai-in-coding',
                'image' => null,
                'type' => 'AI',
                'excerpt' => 'Should AI own the code it writes?',
                'content' => $longContent,
                'category_id' => $cat2->id,
            ],

            // Design
            [
                'title' => 'Minimal UI Patterns',
                'slug' => 'minimal-ui-patterns',
                'image' => null,
                'type' => 'Design',
                'excerpt' => 'Clean, modern patterns you can reuse.',
                'content' => $longContent,
                'category_id' => $cat3->id,
            ],
            [
                'title' => 'Dark Mode Best Practices',
                'slug' => 'dark-mode-best-practices',
                'image' => null,
                'type' => 'Design',
                'excerpt' => 'Best practices for dark theme UIs.',
                'content' => $longContent,
                'category_id' => $cat3->id,
            ],
            [
                'title' => 'UI Animation Basics',
                'slug' => 'ui-animation-basics',
                'image' => null,
                'type' => 'Design',
                'excerpt' => 'Subtle animations for a premium feel.',
                'content' => $longContent,
                'category_id' => $cat3->id,
            ],
        ];

        foreach ($posts as $p) {
            \App\Models\Post::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
