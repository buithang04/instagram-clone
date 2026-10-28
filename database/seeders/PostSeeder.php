<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::orderBy('user_id')->take(8)->get();
        if ($users->isEmpty()) {
            $this->command?->warn('Create a user before seeding sample posts.');
            return;
        }

        $photos = [
            ['Buổi sáng thật chậm bên ly cà phê và một cuốn sách hay ☕', 'Hà Nội', 'photo-1442512595331-e89e73853f31'],
            ['Một góc phố nhỏ khiến mình muốn dừng lại lâu hơn.', 'Hội An', 'photo-1477587458883-47145ed94245'],
            ['Chuyến đi bắt đầu từ khoảnh khắc này ✈️', 'Đà Nẵng', 'photo-1500534623283-312aade485b7'],
            ['Nắng chiều trên biển, chỉ cần thế thôi 🌊', 'Phú Quốc', 'photo-1507525428034-b723cf961d3e'],
            ['Cuối tuần dành cho những con đường mới.', 'Đà Lạt', 'photo-1464822759023-fed622ff2c3b'],
            ['Đi giữa màu xanh và hít một hơi thật sâu 🌿', 'Sa Pa', 'photo-1441974231531-c6227db76b6e'],
            ['Bữa brunch đơn giản mà vui cả ngày.', 'Sài Gòn', 'photo-1547592180-85f173990554'],
            ['Những ô cửa và câu chuyện ở phía sau.', 'Hà Nội', 'photo-1487958449943-2429e8be8625'],
            ['Mỗi hoàng hôn đều có một màu riêng.', 'Nha Trang', 'photo-1472120435266-53107fd0c44a'],
            ['Một ngày đẹp để chụp thật nhiều ảnh 📷', 'Đà Lạt', 'photo-1490730141103-6cac27aaab94'],
            ['Màu của mùa hè ở khắp mọi nơi.', 'Phú Yên', 'photo-1497436072909-60f362e1d4b1'],
            ['Đi thật xa để thấy những điều rất gần.', 'Ninh Bình', 'photo-1469854523086-cc02fe5d8800'],
            ['Thành phố lên đèn, mình vẫn còn muốn đi tiếp.', 'Sài Gòn', 'photo-1519608487953-e999c86e7455'],
            ['Một chút bình yên giữa ngày bận rộn.', 'Huế', 'photo-1470252649378-9c29740c9fa8'],
            ['Nhìn lên bầu trời và nhớ mỉm cười.', 'Đà Nẵng', 'photo-1500534314209-a25ddb2bd429'],
            ['Mang máy ảnh theo và để hành trình tự kể chuyện.', 'Hội An', 'photo-1516483638261-f4dbaf036963'],
            ['Món ngon luôn tuyệt hơn khi ăn cùng bạn bè.', 'Hà Nội', 'photo-1504674900247-0877df9cc836'],
            ['Biển xanh, trời xanh và một ngày không vội.', 'Quy Nhơn', 'photo-1501785888041-af3ef285b470'],
            ['Góc làm việc hôm nay đầy cảm hứng ✨', 'Sài Gòn', 'photo-1497366811353-6870744d04b2'],
            ['Hẹn gặp lại nơi này vào một ngày gần nhất.', 'Đà Lạt', 'photo-1470770841072-f978cf4d019e'],
        ];

        foreach ($photos as $index => [$caption, $location, $photo]) {
            $post = Post::firstOrCreate(
                ['description' => '[Demo] '.$caption],
                ['user_id' => $users[$index % $users->count()]->user_id, 'location' => $location,
                    'type' => 'post', 'allow_commenting' => true, 'hide_like_view' => false]
            );
            if ($post->media()->doesntExist()) {
                $post->media()->create(['mime' => 'image', 'url' => '/demo-media/post-'.($index + 1).'.jpg']);
                if ($index % 5 === 0) {
                    $next = (($index + 1) % count($photos)) + 1;
                    $post->media()->create(['mime' => 'image', 'url' => '/demo-media/post-'.$next.'.jpg']);
                }
            }
        }

        $videos = [
            ['Một chút thiên nhiên cho ngày mới 🌼', '/demo-media/reel-1.mp4'],
            ['Chuyện phiêu lưu qua vài khung hình 🎬', '/demo-media/reel-2.mp4'],
            ['Khoảnh khắc vui nhộn cuối tuần.', '/demo-media/reel-3.mp4'],
            ['Cùng xem một đoạn phim thật ngắn.', '/demo-media/reel-1.mp4'],
            ['Dừng lại và ngắm những cánh hoa.', '/demo-media/reel-1.mp4'],
            ['Những cảnh quay làm mình muốn đi xa.', '/demo-media/reel-2.mp4'],
            ['Một chút hoạt hình để mỉm cười.', '/demo-media/reel-3.mp4'],
            ['Lưu lại kỷ niệm qua ống kính ✨', '/demo-media/reel-1.mp4'],
            ['Màu xanh và ánh nắng trong vài giây.', '/demo-media/reel-1.mp4'],
            ['Thêm một thước phim cho ngày dài.', '/demo-media/reel-2.mp4'],
        ];
        foreach ($videos as $index => [$caption, $file]) {
            $post = Post::firstOrCreate(
                ['description' => '[Demo Reel] '.$caption],
                ['user_id' => $users[$index % $users->count()]->user_id, 'location' => 'Việt Nam',
                    'type' => 'reel', 'allow_commenting' => true, 'hide_like_view' => false]
            );
            if ($post->media()->doesntExist()) {
                $post->media()->create(['mime' => 'video', 'url' => $file]);
            }
        }
    }
}
