<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultHeaderSeeder extends Seeder
{
    public function run()
    {
        DB::table('website_data')->insert([
            [
                'name' => 'Default Header',
                'description' => 'This is the default header',
                'header_links' => json_encode(['Home', 'About', 'Press Release', 'Contact']),
                'created_at' => now(), 
                'updated_at' => now()],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@newswirenetworks.com',
                'password' => bcrypt('password'),
                'created_at' => now(),  
                'updated_at' => now()
            ],
        ]);

        DB::table('categories')->insert([
            ["name" => "Agriculture, Farming & Forestry Industry"],
            ["name" => "Amusement, Gaming & Casino"],
            ["name" => "Automotive Industry"],
            ["name" => "Aviation & Aerospace Industry"],
            ["name" => "Banking, Finance & Investment Industry"],
            ["name" => "Beauty & Hair Care"],
            ["name" => "Book Publishing Industry"],
            ["name" => "Building & Construction Industry"],
            ["name" => "Business & Economy"],
            ["name" => "Chemical Industry"],
            ["name" => "Companies"],
            ["name" => "Conferences & Trade Fairs"],
            ["name" => "Consumer Goods"],
            ["name" => "Culture, Society & Lifestyle"],
            ["name" => "Education"],
            ["name" => "Electronics Industry"],
            ["name" => "Emergency Services"],
            ["name" => "Energy Industry"],
            ["name" => "Environment"],
            ["name" => "Food & Beverage Industry"],
            ["name" => "Furniture & Woodworking Industry"],
            ["name" => "Gifts, Games & Hobbies"],
            ["name" => "Healthcare & Pharmaceuticals Industry"],
            ["name" => "Human Rights"],
            ["name" => "Insurance Industry"],
            ["name" => "International Organizations"],
            ["name" => "IT Industry"],
            ["name" => "Law"],
            ["name" => "Manufacturing"],
            ["name" => "Media, Advertising & PR"],
            ["name" => "Military Industry"],
            ["name" => "Mining Industry"],
            ["name" => "Movie Industry"],
            ["name" => "Music Industry"],
            ["name" => "Natural Disasters"],
            ["name" => "Politics"],
            ["name" => "Real Estate & Property Management"],
            ["name" => "Religion"],
            ["name" => "Retail"],
            ["name" => "Science"],
            ["name" => "Shipping, Storage & Logistics"],
            ["name" => "Social Media"],
            ["name" => "Sports, Fitness & Recreation"],
            ["name" => "Technology"],
            ["name" => "Telecommunications"],
            ["name" => "Textiles & Fabric Industry"],
            ["name" => "Travel & Tourism Industry"],
            ["name" => "U.S. Politics"],
            ["name" => "Waste Management"],
            ["name" => "World & Regional"],
            ["name" => "Oil & Gas"],
            ["name" => "Transportation"],
            ["name" => "Metal"],
            ["name" => "Machinery"],
            ["name" => "Plastics & Rubber"],
            ["name" => "Printing"],
            ["name" => "E-commerce & Online Marketplaces"],
            ["name" => "Restaurant"],
            ["name" => "Training"],
            ["name" => "Legal"],
            ["name" => "Professional Services"],
            ["name" => "Scientific Research & Development"],
            ["name" => "Data Analytics"],
            ["name" => "Artificial Intelligence"],
            ["name" => "Environmental & Sustainability Services"],
            ["name" => "Public Administration & Government Services"],
            ["name" => "Nonprofit Organizations & Social Services"],
            ["name" => "Executive Management & Policy Making"],
            ["name" => "International Relations & Diplomacy"],
            ["name" => "Crypto & Blockchain"],
            ["name" => "Schools, Colleges & Institutes"],
            ["name" => "Digital Marketing"],
            ["name" => "Startups"],
            ["name" => "Stock market"],
            ["name" => "Venture capital"],
            ["name" => "SaaS"],
            ["name" => "Charted Accountants"]
        ]);
    }
}




  