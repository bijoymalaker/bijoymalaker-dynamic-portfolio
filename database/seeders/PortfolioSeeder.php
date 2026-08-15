<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an Admin User
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Seed Profile
        Profile::create([
            'name' => 'Bijoy',
            'title' => 'Web Developer',
            'bio1' => 'I am a Computer Engineering graduate and a skilled web developer, web designer, and graphic designer based in Dhaka, Bangladesh. With a solid academic foundation and a passion for frontend and backend technologies, I enjoy turning complex problems into simple, beautiful, and intuitive designs.',
            'bio2' => 'My goal is to build highly functional, user-friendly, and visually striking websites. By blending technical expertise with creative flair, I ensure every product has a unique personal touch, making it eye-catching and easy to navigate. I aim to bring across your message and identity in the most impactful and creative way possible.',
        ]);

        // Seed Services
        $services = [
            [
                'name' => 'Web design',
                'description' => 'The most modern and high-quality design made at a professional level.',
                'icon_path' => 'icondesign.svg',
            ],
            [
                'name' => 'Web development',
                'description' => 'High-quality development of sites at the professional level using PHP, Laravel.',
                'icon_path' => 'icondev.svg',
            ],
            [
                'name' => 'Frontend development',
                'description' => 'Professional development of applications for Website using ReactJs, Vue3js.',
                'icon_path' => 'iconapp.svg',
            ],
            [
                'name' => 'CMS development',
                'description' => 'Custom content management systems built with modern technologies like WordPress, Shopify, and more.',
                'icon_path' => 'iconphoto.svg',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Seed Projects
        $projects = json_decode(file_get_contents(resource_path('js/assets/json/Porfolio.json')), true);
        if ($projects) {
            foreach ($projects as $project) {
                Project::create([
                    'title' => $project['title'] ?? ($project['name'] ?? 'Untitled'),
                    'category' => $project['category'] ?? 'General',
                    'description' => $project['des'] ?? null,
                    'link' => $project['link'] ?? '#',
                    'image_path' => $project['img'] ?? null,
                ]);
            }
        }

        // Seed Education
        $education = [
            [
                'degree' => 'B.Sc in Computer Science and Engineering',
                'years' => '2019 — 2023',
                'institution' => 'Dhaka City College, Dhaka (Under National University)'
            ],
            [
                'degree' => 'Higher Secondary School Certificate (HSC)',
                'years' => '2016-2019',
                'institution' => 'Notra Dame College, Mymensingh'
            ],
            [
                'degree' => 'Secondary School Certificate (SSC)',
                'years' => '2011 — 2016',
                'institution' => "Bindubasini Govt. Boys' High School, Tangail"
            ]
        ];

        foreach ($education as $edu) {
            Education::create($edu);
        }

        // Seed Experience
        $experience = [
            [
                'title' => 'Junior Web Developer',
                'years' => 'April 2025 - Continuous',
                'company' => 'SM Technology',
                'expertise' => 'HTML5 & CSS3, Shopify Theme Development, Liquid',
                'description' => 'Designed and maintained Shopify stores using custom Liquid templates and theme modifications.'
            ],
            [
                'title' => 'Junior Front-end Developer',
                'years' => '2024',
                'company' => 'DevsStation',
                'expertise' => 'HTML5 & CSS3 (0.2 yr), Vue JS (0.2 yr)',
                'description' => 'I was working here as a remote part-time junior front-end developer.'
            ],
            [
                'title' => 'Graphics Designer',
                'years' => '2021-2022',
                'company' => 'Fiverr',
                'expertise' => 'Adobe Photoshop, Adobe Illustrator, Canva',
                'description' => ''
            ]
        ];

        foreach ($experience as $exp) {
            Experience::create($exp);
        }

        // Seed Skills
        $skills = json_decode(file_get_contents(resource_path('js/assets/json/Skills.json')), true);
        if ($skills) {
            foreach ($skills as $skill) {
                Skill::create([
                    'name' => $skill['name'],
                    'percentage' => $skill['value'],
                ]);
            }
        }
    }
}
