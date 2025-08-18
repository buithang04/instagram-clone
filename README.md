<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Instagram Clone – Laravel & Tailwind CSS (VI)</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-slate-50 text-slate-800">
    <main class="mx-auto max-w-3xl p-6">
      <header class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight">Instagram Clone – Laravel & Tailwind CSS</h1>
        <p class="mt-2 text-slate-600">Ứng dụng mạng xã hội mô phỏng <strong>Instagram</strong> với tính năng: <em>đăng bài (image/video), like, comment, save, follow, reels, message và thông báo thời gian thực</em>.</p>
      </header>

      <section class="mb-8">
        <h2 class="text-xl font-semibold">🚀 Tính năng</h2>
        <ul class="mt-3 list-disc space-y-1 pl-6">
          <li>Trang chủ: Like, Comment, Save</li>
          <li>Tìm kiếm: Tìm người dùng & theo dõi trực tiếp</li>
          <li>Khám phá: Hover Preview, tương tác nhanh</li>
          <li>Reels: Video ngắn, Like/Save, cuộn dọc</li>
          <li>Hồ sơ: post, saved, reels, Followers/Followings</li>
          <li>Đăng bài: Image/Video</li>
          <li>Tin nhắn: Chat realtime, đã xem</li>
          <li>Thông báo: Like, Comment, Follow (realtime)</li>
        </ul>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold"> Công nghệ</h2>
        <ul class="mt-3 list-disc space-y-1 pl-6">
          <li><strong>Laravel 10</strong>, <strong>Livewire v3</strong>, <strong>Alpine.js</strong></li>
          <li><strong>Tailwind CSS v3</strong> + DaisyUI</li>
          <li><strong>Pusher &amp; Broadcasting</strong> (realtime)</li>
          <li><strong>MySQL</strong></li>
        </ul>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold"> Cài đặt</h2>
        <pre class="mt-3 overflow-auto rounded-xl bg-slate-900 p-4 text-slate-100"><code># Clone
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
</code></pre>
      </section>

  </body>
</html>
