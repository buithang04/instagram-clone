# Instagram Clone

Ứng dụng mạng xã hội lấy cảm hứng từ Instagram, xây dựng bằng Laravel, Livewire và Tailwind CSS. Dự án cung cấp bảng tin ảnh/video, Stories, Reels, hồ sơ người dùng, tương tác xã hội, chat và thông báo thời gian thực trong một giao diện responsive cho desktop lẫn mobile.

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3-FB70A9?logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![Tests](https://img.shields.io/badge/tests-27%20passed-16a34a)](#kiểm-thử)

## Liên kết

- **Demo giao diện:** [buithang04.github.io/instagram-clone/docs](https://buithang04.github.io/instagram-clone/docs/)
- **Mã nguồn:** [github.com/buithang04/instagram-clone](https://github.com/buithang04/instagram-clone)
- **Route demo trong ứng dụng:** `/demo` — chuyển đến bản GitHub Pages.

> Bản GitHub Pages là demo giao diện tĩnh, không kết nối database và không thực hiện xác thực hay realtime. Để sử dụng đầy đủ tính năng, hãy chạy ứng dụng Laravel theo hướng dẫn bên dưới.

## Tính năng chính

| Nhóm | Chức năng |
| --- | --- |
| Xác thực | Đăng ký, đăng nhập, đăng xuất, quên/đặt lại mật khẩu, xác nhận mật khẩu và xác minh email |
| Bảng tin | Stories, danh sách bài viết, tải thêm nội dung, ảnh nhiều slide và video |
| Bài viết | Đăng ảnh hoặc video, mô tả, vị trí, tùy chọn bình luận và ẩn lượt thích |
| Tương tác | Like, bình luận, trả lời bình luận, lưu bài viết và theo dõi người dùng |
| Khám phá | Lưới nội dung responsive và xem chi tiết bài viết trong modal |
| Reels | Danh sách video ngắn, điều khiển phát video và tương tác |
| Hồ sơ | Thông tin cá nhân, số bài viết/follower/following, tab bài viết, Reels và nội dung đã lưu |
| Chat | Danh sách hội thoại, gửi tin nhắn, trạng thái đã đọc và cập nhật realtime |
| Thông báo | Thông báo khi có lượt thích, bình luận, theo dõi và tin nhắn mới |
| Responsive | Sidebar desktop, điều hướng đáy mobile, media giữ đúng tỉ lệ và hỗ trợ bàn phím/focus |

## Công nghệ sử dụng

### Backend

- PHP `^8.2`
- Laravel `^12.0`
- Livewire `^3.6`
- Laravel Breeze cho luồng xác thực
- Laravel Sanctum cho API token
- Wire Elements Modal cho modal Livewire
- Overtrue Laravel Like, Favorite và Follow
- Pusher PHP Server cho broadcasting
- Pest 3 cho kiểm thử

### Frontend

- Tailwind CSS 3 và DaisyUI 5
- Alpine.js 3
- Vite 7
- Laravel Echo và Pusher JS
- Swiper 11 cho media carousel
- Axios

### Dữ liệu và lưu trữ

- SQLite mặc định trong môi trường local; có thể chuyển sang MySQL qua `.env`
- Database queue, cache và session
- Laravel public disk cho ảnh/video người dùng tải lên

## Yêu cầu hệ thống

- PHP 8.2 trở lên cùng các extension Laravel yêu cầu
- Composer 2
- Node.js 20.19+ hoặc 22.12+ và npm
- SQLite hoặc MySQL
- Tài khoản Pusher nếu cần chat/thông báo realtime ngoài chế độ fallback

## Cài đặt nhanh

### 1. Clone và cài dependency

```bash
git clone https://github.com/buithang04/instagram-clone.git
cd instagram-clone
composer install
npm install
```

### 2. Tạo file môi trường

macOS/Linux:

```bash
cp .env.example .env
```

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Sau đó tạo application key:

```bash
php artisan key:generate
```

### 3. Cấu hình database

Mặc định dự án dùng SQLite. Tạo file database nếu chưa có:

macOS/Linux:

```bash
touch database/database.sqlite
```

Windows PowerShell:

```powershell
New-Item database/database.sqlite -ItemType File -Force
```

Giữ cấu hình sau trong `.env`:

```dotenv
DB_CONNECTION=sqlite
```

Nếu dùng MySQL, thay bằng:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=instagram_clone
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migration, dữ liệu mẫu và storage link

```bash
php artisan migrate --seed
php artisan storage:link
```

Seeder mặc định tạo bài viết và chuỗi bình luận lồng nhau phục vụ kiểm thử. Để thêm bộ ảnh và Reels demo sau khi database đã có người dùng:

```bash
php artisan db:seed --class=PostSeeder
```

### 5. Chạy ứng dụng

Cách gọn nhất để chạy server, queue, log và Vite cùng lúc:

```bash
composer run dev
```

Hoặc chạy riêng từng tiến trình:

```bash
php artisan serve
php artisan queue:listen --tries=1
npm run dev
```

Mở [http://127.0.0.1:8000](http://127.0.0.1:8000), đăng ký tài khoản mới rồi đăng nhập.

## Cấu hình realtime với Pusher

Ứng dụng vẫn khởi động khi chưa có Pusher key; frontend sẽ dùng fallback không kết nối. Để bật chat và thông báo realtime, thêm vào `.env`:

```dotenv
BROADCAST_CONNECTION=pusher

PUSHER_APP_ID=your-app-id
PUSHER_APP_KEY=your-app-key
PUSHER_APP_SECRET=your-app-secret
PUSHER_APP_CLUSTER=ap1
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
```

Sau khi đổi biến `VITE_*`, khởi động lại Vite bằng `npm run dev`. Các private channel được cấp quyền trong `routes/channels.php`; queue worker cần chạy để xử lý notification được đưa vào hàng đợi.

## Upload media

- Định dạng hỗ trợ: `jpeg`, `jpg`, `png`, `gif`, `mp4`, `mov`, `webm`.
- Kích thước tối đa hiện tại: 200 MB mỗi file.
- File được lưu trên disk `public` tại `storage/app/public/media`.
- URL public yêu cầu `php artisan storage:link`.
- Một video duy nhất được phân loại là Reel; ảnh hoặc nhiều media được phân loại là bài viết.

## Các route chính

| URL | Mô tả | Yêu cầu đăng nhập |
| --- | --- | :---: |
| `/login`, `/register` | Xác thực người dùng | Không |
| `/` | Bảng tin chính | Có |
| `/explore` | Khám phá bài viết | Có |
| `/reels` | Reels video | Có |
| `/post/{post}` | Chi tiết bài viết | Có |
| `/chat` | Danh sách hội thoại | Có |
| `/chat/{chat}` | Nội dung hội thoại | Có |
| `/profile/{user}` | Hồ sơ và bài viết | Có |
| `/profile/{user}/reels` | Reels của người dùng | Có |
| `/profile/{user}/saved` | Bài viết đã lưu | Có |
| `/profile` | Chỉnh sửa tài khoản | Có |
| `/demo` | Chuyển đến demo GitHub Pages | Không |

## Cấu trúc dự án

```text
app/
├── Livewire/              # Home, Explore, Reels, Profile, Post, Chat
├── Models/                # User, Post, Media, Comment, Conversation, Message
├── Notifications/         # Like, comment, follow và message notifications
└── Http/Controllers/      # Authentication và profile
database/
├── factories/             # Dữ liệu factory cho test/seed
├── migrations/            # Cấu trúc database
└── seeders/               # Dữ liệu mẫu
docs/                      # Demo giao diện tĩnh cho GitHub Pages
public/demo-media/         # Ảnh và video mẫu cục bộ
resources/
├── css/app.css            # Tailwind và design tokens
├── js/                    # Vite, Echo, Pusher, Alpine và Swiper
└── views/                 # Blade views và Livewire templates
routes/                    # Web, auth, console và broadcast channels
tests/                     # Pest unit/feature tests
```

## Kiểm thử

Chạy toàn bộ test backend:

```bash
composer test
```

Hoặc dùng trực tiếp `php artisan test`. Kiểm tra production bundle bằng:

```bash
npm run build
```

Trạng thái gần nhất: **27 tests, 65 assertions — passed**.

## Khắc phục lỗi thường gặp

### Ảnh hoặc video không hiển thị

```bash
php artisan storage:link
php artisan optimize:clear
```

Kiểm tra `APP_URL` trong `.env` phải trùng với địa chỉ đang chạy ứng dụng.

### Giao diện không cập nhật

```bash
npm install
npm run dev
```

Với môi trường production, dùng `npm run build` và bảo đảm web server phục vụ thư mục `public`.

### Chat hoặc notification không realtime

- Kiểm tra các biến Pusher và `BROADCAST_CONNECTION=pusher`.
- Khởi động lại Vite sau khi sửa biến `VITE_*`.
- Chạy `php artisan queue:listen --tries=1`.
- Kiểm tra quyền private channel trong `routes/channels.php`.

### Lỗi database, cache hoặc session table

```bash
php artisan migrate
php artisan optimize:clear
```

## Ghi chú triển khai

- Document root của web server phải trỏ đến thư mục `public`.
- Đặt `APP_ENV=production` và `APP_DEBUG=false` trên production.
- Cấu hình queue worker chạy lâu dài bằng Supervisor, systemd hoặc dịch vụ tương đương.
- Không commit `.env`, khóa Pusher, mật khẩu database hoặc thông tin bí mật.
- Chạy `php artisan config:cache`, `route:cache` và `view:cache` sau khi cấu hình production ổn định.

## Đóng góp

1. Fork repository.
2. Tạo branch cho thay đổi.
3. Chạy test và production build.
4. Tạo Pull Request kèm mô tả và ảnh chụp giao diện nếu có thay đổi UI.

## Giấy phép

Dự án khai báo giấy phép MIT trong `composer.json`.
