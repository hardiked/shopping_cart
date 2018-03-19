<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new \App\Product([
        		'imagePath'=>'https://upload.wikimedia.org/wikipedia/en/4/44/HarryPotter5poster.jpg',
        		'title'=>'Harry Potter',
        		'description'=>'Super book',
        		'price'=>10
        	]);
        $product->save();

        $product=new \App\Product([
        		'imagePath'=>'https://assetscdn.paytm.com/images/catalog/product/W/WO/WOF01_273217/0x1920/70/0.jpg',
        		'title'=>'Wings Of Fire',
        		'description'=>'biography of greta scientist Dr. APJ abdul Kalam',
        		'price'=>15
        	]);
        $product->save();

        $product=new \App\Product([
        		'imagePath'=>'http://ecx.images-amazon.com/images/I/51sA11byavL.jpg',
        		'title'=>'Chandrakanta',
        		'description'=>'All time greta book in Hindi',
        		'price'=>10
        	]);
        $product->save();

        $product=new \App\Product([
        		'imagePath'=>'https://pbs.twimg.com/profile_images/751078072795820032/tC97fYE_.jpg',
        		'title'=>'Rudyard Kipling',
        		'description'=>'must read book as a child',
        		'price'=>10
        	]);
        $product->save();

        $product=new \App\Product([
        		'imagePath'=>'https://s-media-cache-ak0.pinimg.com/736x/c2/2c/04/c22c04eed56bdab0f07584a1f4efdfdf--paulo-coelho-fiction-novels.jpg',
        		'title'=>'Polo Kaolo',
        		'description'=>'great book',
        		'price'=>10
        	]);
        $product->save();
    }
}
