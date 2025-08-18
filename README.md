# Instagram Clone – Laravel & Tailwind CSS

Ứng dụng mạng xã hội mô phỏng **Instagram** với đầy đủ tính năng:  
*Đăng bài (ảnh/video), Like, Comment, Save, Follow, Explore, Reels, nhắn tin và thông báo thời gian thực.*

---

## Tính năng

- Trang chủ: Like, Comment, Save  
- Tìm kiếm: Tìm người dùng & theo dõi trực tiếp  
- Khám phá: Hover Preview, tương tác nhanh  
- Reels: Video ngắn, Like/Save, cuộn dọc  
- Hồ sơ: Bài viết, Saved, Reels, Followers/Followings  
- Đăng bài: Image/Video  
- Tin nhắn: Chat realtime, trạng thái đã xem
- Thông báo: Like, Comment, Follow (Realtime)  

---

## Công nghệ

- **Laravel 10**, **Livewire v3**, **Alpine.js**  
- **Tailwind CSS v3 + DaisyUI**  
- **Pusher & Broadcasting** (Realtime Chat & Notifications)  
- **MySQL**  

---

## Cài đặt

```bash
# Clone
git clone https://github.com/buithang04/instagram-clone.git
cd instagram-clone

# Backend
composer install
cp .env.example .env
php artisan migrate --seed
php artisan key:generate

# Frontend
npm install && npm run dev

# Storage & Serve
php artisan storage:link
php artisan serve
