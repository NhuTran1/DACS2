<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     
    public function run()
    {
        //làm mới csdl
        DB::table('users')->truncate();

        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Quang Như',
                'email' => 'quangnhu112005@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 2,
                'description' => null,

                'country' => 'Viet Nam',
                'street_address' => '440 Trần Địa Nghĩa, Ngũ hành Sơn',
                'postcode_zip' => '20000',
                'town_city' => 'Đà Nẵng',
                'phone' => '0364287702',
            ],
        ]);

        DB::table('users')->insert([

            [
                'id' => 2,
                'name' => 'Nhudz',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ],
            [
                'id' => 3,
                'name' => 'Nhật',
                'email' => 'nhat@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 4,
                'name' => 'Quang Thức',
                'email' => 'thuc@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 5,
                'name' => 'Roy Banks',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'description' => null,
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'title' => 'Xu hướng giày thịnh hành nhất mùa thu năm 2024',
                'subtitle' => 'Hãy nói về giày dép mùa thu. Mỗi năm, nhiệt độ thay đổi thúc đẩy sự quay trở lại của những đường cắt ngắn kín chân,
                màu đất và các loại vải cách nhiệt. Tuy nhiên, những gì thay đổi theo mùa này qua mùa khác, các nhà thiết kế có quyền tự do để biến
                 việc va chạm trên vỉa hè trở thành một việc thiết thực và thời trang. Xếp hàng theo xu hướng giày mùa Thu 2024 giờ đây chứa đầy những
                 bất ngờ và bóng chưa từng có trước đây, và các biên tập viên của chúng tôi có đầy đủ 411 chiếc ngay từ hàng trước.
                Cho dù bạn đang tìm cách cập nhật dòng sản phẩm khởi động mùa thu của mình? Hay bạn đang theo đuổi thứ gì đó khan hiếm hơn một chút
                (bao gồm cả giày mules và nền tảng)? Mọi thứ đều nằm ở bài review dưới đây. Khám phá những chiếc máy bơm được đánh bóng bắt kịp xu hướng
                "Librariancore", những đôi giày ống gợi cảm của Saint Laurent và Fendi. Và những đôi giày đế bằng được đóng gói kỹ lưỡng sẽ không thể bỏ qua.',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '1. Boots Stovepipe
                Nói lời "tạm biệt" với giày cao cổ và "xin chào" với giày ống. Được xác định bởi phần cổ chân phồng và bắp chân rộng, chiếc bốt hình ống hướng đến tất cả những
                thứ trang nhã và tinh tế. Đối với phần gót, mọi thứ đều phù hợp. Hãy mua các lựa chọn hình nón từ Fendi và Saint Laurent hoặc thử giày cao gót mèo con dốc của
                Totême nếu bạn đang muốn một đôi bốt thấp hơn. Từ đó, hãy tạo phong cách cho chúng với quần jean skinny đẹp nhất của bạn và một chiếc áo blazer ngoại cỡ.
                2. Sporty Sneakers
                 Được yêu thích từ các mùa trước bao gồm giày thể thao Chanel chunky và giày chạy bộ của Loewe. Nhưng những
                người mới tham gia xu hướng (Maison Margiela, The Row) cũng đang gây chú ý. Những chiếc giày để mua sắm ngay bây giờ? Giày thể thao Gazelle của Adidas x Gucci, mà các thương hiệu đã hợp tác tạo ra cho mùa thu.',
                'writer' => 'JoddenLyy',
            ],
            [
                'title' => 'This was one of our first days in Hawaii last week.',
                'subtitle' => '',
                'image' => 'blog-2.jpg',
                'category' => 'Style',
                'content' => '',
                'writer' => '',
            ],
            [
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'subtitle' => '',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
                'writer' => '',
            ],
            [
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'subtitle' => '',
                'image' => 'blog-4.jpg',
                'category' => 'Style',
                'content' => '',
                'writer' => '',
            ],
            [
                'title' => 'Absolue collection. The Lancome team has been one…',
                'subtitle' => '',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
                'writer' => '',
            ],
            [
                'title' => 'Writing has always been kind of therapeutic for me',
                'subtitle' => '',
                'image' => 'blog-6.jpg',
                'category' => 'Style',
                'content' => '',
                'writer' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Nike',
            ],
            [
                'name' => 'Bitis',
            ],
            [
                'name' => 'Adidas',
            ],
            [
                'name' => 'Boot',
            ],
            [
                'name' => 'Vento',
            ],
            [
                'name' => 'Crocs',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Men',
            ],
            [
                'name' => 'Women',
            ],
            [
                'name' => 'Kids',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Nike Air Jordan',
                'description' => 'Nike Air Jordan 1 với lịch sử hơn 30 năm luôn được nhìn nhận như một trong những dòng sản phẩm thành công nhất của Nike. Nike Jordan 1 luôn bán hết một cách nhanh chóng ngay từ khi ra mắt đến nay, luôn là sản phẩm được các tín đồ thời trang chú ý hàng đầu. Air Jordan được đặt dựa theo ngôi sao bóng rổ lừng danh Michael Jordan – huyền thoại của NBA.',
                'content' => '',
                'price' => 4490000,
                'qty' => 20,
                'discount' => 4290000,
                'weight' => 1.3,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Giày Nike Dunk Low Disrupt 2',
                'description' => null,
                'content' => null,
                'price' => 3000000,
                'qty' => 20,
                'discount' => 2850000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'Giày Adidas Supernova',
                'description' => null,
                'content' => null,
                'price' => 1300000,
                'qty' => 20,
                'discount' => 1250000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 4,
                'brand_id' => 6,
                'product_category_id' => 2,
                'name' => 'Crocs nữ',
                'description' => null,
                'content' => null,
                'price' => 450000,
                'qty' => 20,
                'discount' =>420000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 5,
                'brand_id' => 6,
                'product_category_id' => 3,
                'name' => "Crocs Kids",
                'description' => null,
                'content' => null,
                'price' => 355000,
                'qty' => 20,
                'discount' => 335000,
                'weight' => null,
                'featured' => false,
                'tag' => 'Sandal',
            ],
            [
                'id' => 6,
                'brand_id' => 5,
                'product_category_id' => 2,
                'name' => 'Giày Sandal Nữ SD01',
                'description' => null,
                'content' => null,
                'price' => 370000,
                'qty' => 20,
                'discount' => 355000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sandal',
            ],
            [
                'id' => 7,
                'brand_id' => 5,
                'product_category_id' => 1,
                'name' => 'Sandal Nam SD01',
                'description' => null,
                'content' => null,
                'price' => 380000,
                'qty' => 20,
                'discount' => 375000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sandal',
            ],
            [
                'id' => 8,
                'brand_id' => 5,
                'product_category_id' => 1,
                'name' => 'Sandal Nam SD02',
                'description' => null,
                'content' => null,
                'price' => 390000,
                'qty' => 20,
                'discount' => 385000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sandal',
            ],
            [
                'id' => 9,
                'brand_id' => 5,
                'product_category_id' => 3,
                'name' => 'Sandal Kids SD01',
                'description' => null,
                'content' => null,
                'price' => 290000,
                'qty' => 20,
                'discount' => 275000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sandal',
            ],
            [
                'id' => 10,
                'brand_id' => 5,
                'product_category_id' => 3,
                'name' => 'Sandal Kids SD02',
                'description' => null,
                'content' => null,
                'price' => 280000,
                'qty' => 20,
                'discount' => 255000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sandal',
            ],
            [
                'id' => 11,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'Giày Adidas Ultraboost 22',
                'description' => null,
                'content' => null,
                'price' => 2900000,
                'qty' => 20,
                'discount' => 2850000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 12,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'Giày Adidas Adizero Boston 10',
                'description' => null,
                'content' => null,
                'price' => 2250000,
                'qty' => 20,
                'discount' => null,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 13,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'Giày Bóng rổ D.O.N Issue',
                'description' => null,
                'content' => null,
                'price' => 2220000,
                'qty' => 20,
                'discount' => null,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 14,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'Giày Ultraboost 22 "Blue Rush"',
                'description' => null,
                'content' => null,
                'price' => 2900000,
                'qty' => 20,
                'discount' => 2750000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 15,
                'brand_id' => 4,
                'product_category_id' => 2,
                'name' => 'Giày Boot Nữ',
                'description' => null,
                'content' => null,
                'price' => 490000,
                'qty' => 20,
                'discount' => 475000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Boot',
            ],
            [
                'id' => 16,
                'brand_id' => 4,
                'product_category_id' => 1,
                'name' => 'Giày Boot Nam',
                'description' => null,
                'content' => null,
                'price' => 530000,
                'qty' => 20,
                'discount' => 509000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Boot',
            ],
            [
                'id' => 17,
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => 'Giày Bitis Nữ Hunter',
                'description' => null,
                'content' => null,
                'price' => 902000,
                'qty' => 20,
                'discount' => 856000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 18,
                'brand_id' => 2,
                'product_category_id' => 1,
                'name' => 'Giày Bitis Nam Hunter',
                'description' => null,
                'content' => null,
                'price' => 972000,
                'qty' => 20,
                'discount' => 923000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 19,
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => 'Giày Bitis Nữ Hunter Pink',
                'description' => null,
                'content' => null,
                'price' => 999000,
                'qty' => 20,
                'discount' => 879000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Sneaker',
            ],
            [
                'id' => 20,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Phụ kiện dây giày',
                'description' => null,
                'content' => null,
                'price' => 70000,
                'qty' => 20,
                'discount' => 39000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' => 21,
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => 'Sticker giày',
                'description' => null,
                'content' => null,
                'price' => 50000,
                'qty' => 20,
                'discount' => 39000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' => 22,
                'brand_id' => 2,
                'product_category_id' => 3,
                'name' => 'Sticker độc lạ',
                'description' => null,
                'content' => null,
                'price' => 60000,
                'qty' => 20,
                'discount' => 35000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' => 23,
                'brand_id' => 2,
                'product_category_id' => 1,
                'name' => 'Sticker mới',
                'description' => null,
                'content' => null,
                'price' => 40000,
                'qty' => 20,
                'discount' => 25000,
                'weight' => null,
                'featured' => true,
                'tag' => 'Accessories',
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-2.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-3.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-1.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-3.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-1.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-2.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-3.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-1.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-2.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-3.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-1.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-2.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-1.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-2.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-1.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-2.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-1.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-2.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-1.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-2.jpg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10.jpg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-1.jpg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-2.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11-1.jpg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12.jpg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-1.jpg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-2.jpg',
            ],
            [
                'product_id' => 13,
                'path' => 'product-13.jpg',
            ],
            [
                'product_id' => 13,
                'path' => 'product-13-1.jpg',
            ],
            [
                'product_id' => 13,
                'path' => 'product-13-2.jpg',
            ],
            [
                'product_id' => 14,
                'path' => 'product-14.jpg',
            ],
            [
                'product_id' => 14,
                'path' => 'product-14-1.jpg',
            ],
            [
                'product_id' => 15,
                'path' => 'product-15.jpg',
            ],
            [
                'product_id' => 16,
                'path' => 'product-16.jpg',
            ],
            [
                'product_id' => 16,
                'path' => 'product-16-1.jpg',
            ],
            [
                'product_id' => 16,
                'path' => 'product-16-2.jpg',
            ],
            [
                'product_id' => 17,
                'path' => 'product-17.jpg',
            ],
            [
                'product_id' => 17,
                'path' => 'product-17-1.jpg',
            ],
            [
                'product_id' => 18,
                'path' => 'product-18.jpg',
            ],
            [
                'product_id' => 18,
                'path' => 'product-18-1.jpg',
            ],
            [
                'product_id' => 18,
                'path' => 'product-18-2.jpg',
            ],
            [
                'product_id' => 19,
                'path' => 'product-19.jpg',
            ],
            [
                'product_id' => 19,
                'path' => 'product-19-1.jpg',
            ],
            [
                'product_id' => 20,
                'path' => 'product-20.jpg',
            ],
            [
                'product_id' => 21,
                'path' => 'product-21.jpg',
            ],
            [
                'product_id' => 22,
                'path' => 'product-22.jpg',
            ],
            [
                'product_id' => 23,
                'path' => 'product-23.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'black',
                'size' => '40',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'black',
                'size' => '41',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => '39',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => '42',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'red',
                'size' => '38',
                'qty' => 0,
            ],
            [
                'product_id' => 1,
                'color' => 'green',
                'size' => '43',
                'qty' => 0,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'XuanHuynh@gmail.com',
                'name' => 'Xuan Huỳnh',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'Quangy@gmail.com',
                'name' => 'Quang Ý',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
        ]);
    }
}

