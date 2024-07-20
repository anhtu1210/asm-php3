<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();

        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();
        
        Tag::factory(15)->create();

        foreach(['S', 'M', 'L'] as $item){
            ProductSize::query()->create([
                'name' => $item,
            ]);
        }

        foreach(['#000000', '#FFFFFF', '#FF0000', '#00FFFF'] as $item){
            ProductColor::query()->create([
                'name' => $item,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $name = fake()->text(100);
            Product::query()->create([
                'catalogue_id' => rand(1, 5),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg',
                'price_regular' => 600000,
                'price_sale' => 499000,
            ]);
        }

        for ($i = 1; $i < 11; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg',
                ],
            ]);
        }

        for ($i = 1; $i < 11; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' => rand(1, 8)
                ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15)
                ]
            ]);
        }

        for ($productID = 1; $productID < 11; $productID++) {
            $data = [];
            for ($sizeID = 1; $sizeID < 4; $sizeID++) {
                for ($colorID = 1; $colorID < 5; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quatity' => 100,
                        'image' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp',
                    ];
                }
            }

            DB::table('product_variants')->insert($data);
        }
    
    }
}
