<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Laptops',
                'slug' => 'laptops',
                'description' => 'High-performance laptops for work and play.',
            ],
            [
                'name' => 'Smartphones',
                'slug' => 'smartphones',
                'description' => 'The latest smartphones from top brands.',
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'Essential tech accessories for your devices.',
            ],
            [
                'name' => 'Tablets',
                'slug' => 'tablets',
                'description' => 'Powerful and portable tablets.',
            ],
        ];

        foreach ($categories as $catData) {
            $category = Category::updateOrCreate(
                ['slug' => $catData['slug']],
                $catData
            );

            if ($catData['name'] === 'Laptops') {
                $this->seedLaptops($category->id);
            } elseif ($catData['name'] === 'Smartphones') {
                $this->seedSmartphones($category->id);
            } elseif ($catData['name'] === 'Accessories') {
                $this->seedAccessories($category->id);
            } elseif ($catData['name'] === 'Tablets') {
                $this->seedTablets($category->id);
            }
        }
    }

    private function seedLaptops($categoryId)
    {
        $products = [
            [
                'name' => 'MacBook Pro 14"',
                'description' => 'M2 Pro chip, 16GB RAM, 512GB SSD. Space Gray.',
                'price' => 1999.00,
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1517336714460-45788a04299b?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Dell XPS 13',
                'description' => 'Intel Core i7, 16GB RAM, 512GB SSD. Platinum Silver.',
                'price' => 1299.00,
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1593642632823-8f785bf67e45?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'ASUS ROG Zephyrus G14',
                'description' => 'AMD Ryzen 9, RTX 3060, 16GB RAM, 1TB SSD. Moonlight White.',
                'price' => 1599.00,
                'stock' => 5,
                'image' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?q=80&w=1000&auto=format&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                array_merge($product, [
                    'category_id' => $categoryId,
                ])
            );
        }
    }

    private function seedSmartphones($categoryId)
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'A17 Pro chip, Titanium design, Advanced Pro camera system.',
                'price' => 999.00,
                'stock' => 20,
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Snapdragon 8 Gen 3, S Pen included, AI-powered features.',
                'price' => 1199.00,
                'stock' => 18,
                'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'description' => 'Tensor G3 chip, Best-in-class camera, Pure Android experience.',
                'price' => 899.00,
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1696446701796-da61225697cc?q=80&w=1000&auto=format&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                array_merge($product, [
                    'category_id' => $categoryId,
                ])
            );
        }
    }

    private function seedAccessories($categoryId)
    {
        $products = [
            [
                'name' => 'AirPods Pro (2nd Gen)',
                'description' => 'Active Noise Cancellation, Transparency mode, MagSafe Charging Case.',
                'price' => 249.00,
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1588423770574-91993ca06f17?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Logitech MX Master 3S',
                'description' => 'Ultra-fast scrolling, Quiet clicks, 8K DPI any-surface tracking.',
                'price' => 99.00,
                'stock' => 25,
                'image' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?q=80&w=1000&auto=format&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                array_merge($product, [
                    'category_id' => $categoryId,
                ])
            );
        }
    }

    private function seedTablets($categoryId)
    {
        $products = [
            [
                'name' => 'iPad Air',
                'description' => 'M1 chip, 10.9-inch Liquid Retina display, Fast 5G.',
                'price' => 599.00,
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Samsung Galaxy Tab S9',
                'description' => 'Dynamic AMOLED 2X, S Pen included, IP68 water resistance.',
                'price' => 799.00,
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1589739900243-4b52cd9b104e?q=80&w=1000&auto=format&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                array_merge($product, [
                    'category_id' => $categoryId,
                ])
            );
        }
    }
}
