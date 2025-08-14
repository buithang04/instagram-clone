# 📸 Instagram Clone - Laravel & Tailwind CSS

Một ứng dụng mạng xã hội mô phỏng Instagram, xây dựng bằng **Laravel**, **Tailwind CSS** và các công nghệ hiện đại.  
Dự án bao gồm đầy đủ các tính năng như **đăng bài, thích, bình luận, lưu bài, theo dõi, tin, nhắn tin và thông báo thời gian thực**.

---

## 🚀 Tính năng nổi bật

### 🏠 Home Page
- **Swipe & Like** bài viết trực tiếp trên trang chủ  
- **Stories** dạng tròn giống Instagram  
- **Follow/Unfollow** người dùng  
- **Comment**, **Save Post**, và **Infinite Scroll** (cuộn vô tận)

### 🔍 Search Page
- Tìm kiếm người dùng  
- Xem hồ sơ và theo dõi trực tiếp từ kết quả tìm kiếm

### 🌎 Explore Page
- **Hover Preview** hình ảnh  
- Xem bài viết và tương tác ngay trên giao diện khám phá

### 🎥 Reel Page
- Xem video ngắn dạng Reels  
- **Like**, **Save**, và cuộn để xem các video tiếp theo


### 📝 Post Creation
- Đăng bài viết dạng hình ảnh hoặc video  
- Hỗ trợ **Mixed Media Posts** (nhiều ảnh/video)  
- Giới hạn dung lượng file để tối ưu trải nghiệm

### 👤 Profile Page
- Tabs cho **Posts**, **Saved**, và **Tagged**  
- Thống kê **followers**, **followings**, **số bài viết**  

---

## 🛠️ Công nghệ & kỹ năng sử dụng
- **Laravel 10** – Framework PHP mạnh mẽ
- **Livewire** – Xây dựng giao diện động mà không cần nhiều JavaScript thuần
- **Tailwind CSS** – CSS framework tiện lợi, tối ưu responsive
- **DaisyUI** – Thư viện component UI cho Tailwind
- **Alpine.js** – Thư viện JS nhẹ cho tương tác frontend
- **Eloquent ORM** – Làm việc với database theo hướng đối tượng
- **RESTful API** – Giao tiếp frontend-backend theo chuẩn REST
- **Pusher** – Thời gian thực cho chat và thông báo
- **MySQL** – Hệ quản trị cơ sở dữ liệu
- **JavaScript (ES6+)** – Tương tác client-side

---

## 📦 Cài đặt & chạy dự án

```bash
# Clone project
git clone https://github.com/your-username/instagram-clone.git
cd instagram-clone

# Cài đặt backend
composer install

# Copy file môi trường
cp .env.example .env

# Tạo database và cấu hình trong .env
# DB_DATABASE=instagram_clone
# DB_USERNAME=root
# DB_PASSWORD=

# Chạy migration & seed
php artisan migrate --seed

# Tạo key ứng dụng
php artisan key:generate

# Build giao diện Tailwind + DaisyUI
npm install
npm run dev

# Tạo symbolic link cho storage
php artisan storage:link

# Chạy server
php artisan serve
