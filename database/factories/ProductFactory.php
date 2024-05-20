<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $urls = [
            "https://image.goat.com/attachments/product_template_pictures/images/021/321/847/original/473391_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/018/552/901/original/404758_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/016/152/710/original/402491_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/018/783/111/original/488879_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/020/270/533/original/CD6578_507.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/009/559/594/original/144690_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/016/867/969/original/478648_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/016/596/414/original/376931_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/021/219/116/original/CD6846_002.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/021/147/976/original/497870_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/020/095/762/original/411931_00.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/021/317/617/original/SP_AJ1_LOW_BP.png.png",
            "https://image.goat.com/attachments/product_template_pictures/images/015/392/851/original/429772_00.png.png"
        ];




        return [
            'name' => fake('en')->text(30) ,
            'category_id' => 1 ,
            'description' => fake('en')->paragraph(1) ,
            'price' => random_int(100 , 2000) ,
            'quantity' => random_int(50 , 200) ,
            'image' =>$urls[array_rand($urls)],
        ];
    }
}
