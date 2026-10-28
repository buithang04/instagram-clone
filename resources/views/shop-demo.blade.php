<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BXT Studio — trang demo catalog thời trang trong dự án Instagram Clone.">
    <title>BXT Studio — Fashion Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-zinc-950">
    @php
        $products = [
            ['BXT Essential Tee', 'Áo', '590.000 ₫', 1],
            ['Motion Overshirt', 'Áo', '1.290.000 ₫', 2],
            ['Studio Runner', 'Giày', '2.490.000 ₫', 3],
            ['Everyday Tote', 'Phụ kiện', '890.000 ₫', 4],
            ['Core Knit Polo', 'Áo', '990.000 ₫', 5],
            ['City Low Sneaker', 'Giày', '1.890.000 ₫', 6],
            ['Frame Sunglasses', 'Phụ kiện', '1.190.000 ₫', 7],
            ['Relaxed Hoodie', 'Áo', '1.390.000 ₫', 8],
            ['Trail Crossbody', 'Phụ kiện', '790.000 ₫', 9],
            ['Retro Court', 'Giày', '2.190.000 ₫', 10],
            ['Minimal Watch', 'Phụ kiện', '3.490.000 ₫', 12],
            ['Weekend Jacket', 'Áo', '1.790.000 ₫', 13],
        ];
    @endphp

    <a href="#catalog" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:bg-white focus:px-4 focus:py-2">Bỏ qua đến sản phẩm</a>
    <div class="bg-zinc-950 px-4 py-2 text-center text-[11px] font-semibold tracking-[0.18em] text-white">BXT STUDIO · DEMO THỜI TRANG 2026</div>

    <header class="sticky top-0 z-40 border-b border-zinc-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex min-h-20 max-w-7xl items-center justify-between gap-5 px-4 sm:px-6 lg:px-8">
            <a href="{{ route('shop.demo') }}" class="text-2xl font-black tracking-[-0.08em]" aria-label="BXT Studio home">BXT<span class="font-normal">—studio</span></a>
            <nav aria-label="Shop navigation" class="hidden items-center gap-8 text-xs font-bold uppercase tracking-wider md:flex">
                <a href="#new" class="min-h-11 inline-flex items-center border-b-2 border-zinc-950">New season</a>
                <a href="#catalog" class="min-h-11 inline-flex items-center hover:text-zinc-500">Sản phẩm</a>
                <a href="#story" class="min-h-11 inline-flex items-center hover:text-zinc-500">Câu chuyện</a>
            </nav>
            <div class="flex items-center gap-1">
                <a href="{{ route('home') }}" class="hidden min-h-11 items-center rounded-full px-4 text-sm font-semibold hover:bg-zinc-100 sm:inline-flex">Về Instagram</a>
                <button id="shop-menu-toggle" type="button" aria-label="Mở menu" aria-expanded="false" aria-controls="shop-mobile-nav" class="ig-icon-button md:hidden"><svg aria-hidden="true" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg></button>
            </div>
        </div>
        <nav id="shop-mobile-nav" hidden class="border-t border-zinc-200 px-4 py-3 md:hidden" aria-label="Mobile shop navigation">
            <a href="#new" class="block min-h-11 py-3 font-semibold">New season</a>
            <a href="#catalog" class="block min-h-11 py-3 font-semibold">Sản phẩm</a>
            <a href="#story" class="block min-h-11 py-3 font-semibold">Câu chuyện</a>
        </nav>
    </header>

    <main>
        <section id="new" class="overflow-hidden bg-zinc-950 text-white">
            <div class="mx-auto grid min-h-[600px] max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-24">
                <div class="max-w-2xl">
                    <p class="mb-5 text-xs font-bold uppercase tracking-[0.24em] text-zinc-400">BXT / New season</p>
                    <h1 class="text-5xl font-semibold leading-[0.95] tracking-[-0.07em] sm:text-7xl lg:text-8xl">Phong cách<br>chuyển động.</h1>
                    <p class="mt-7 max-w-xl text-base leading-7 text-zinc-300">Một catalog thời trang tối giản dành cho nhịp sống hiện đại — được dựng từ tinh thần đen–trắng của BXT Shopper và trải nghiệm responsive mới.</p>
                    <a href="#catalog" class="mt-9 inline-flex min-h-12 items-center gap-8 rounded-full bg-white px-6 text-sm font-bold text-zinc-950 transition hover:bg-zinc-200">Khám phá bộ sưu tập <span aria-hidden="true">↗</span></a>
                </div>
                <div class="relative mx-auto aspect-[4/5] w-full max-w-lg overflow-hidden rounded-[2rem] bg-zinc-900">
                    <img src="{{ asset('demo-media/post-10.jpg') }}" alt="Bộ sưu tập thời trang BXT Studio" class="h-full w-full object-cover grayscale transition duration-500 hover:grayscale-0">
                    <div class="absolute inset-x-5 bottom-5 flex items-center justify-between rounded-2xl bg-black/65 p-4 backdrop-blur"><div><p class="text-xs uppercase tracking-widest text-zinc-400">Editorial 01</p><p class="mt-1 font-semibold">Move with confidence</p></div><span class="text-2xl" aria-hidden="true">↗</span></div>
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-7xl gap-10 border-b border-zinc-200 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-24">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500">BXT / Selected</p><h2 class="mt-4 text-4xl font-semibold tracking-[-0.055em] sm:text-6xl">Ít hơn.<br>Chất hơn.</h2></div>
            <div class="self-end"><p class="max-w-xl text-lg leading-8 text-zinc-600">Mỗi món đồ được chọn để phối dễ, dùng lâu và giữ cá tính riêng. Tìm kiếm nhanh hoặc lọc theo nhóm sản phẩm bên dưới.</p></div>
        </section>

        <section id="catalog" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500">BXT Selects</p><h2 class="mt-3 text-4xl font-semibold tracking-[-0.055em] sm:text-5xl">Sản phẩm mới nhất</h2></div>
                <label class="relative block sm:w-80"><span class="sr-only">Tìm sản phẩm</span><input id="shop-search" type="search" placeholder="Tìm sản phẩm…" class="min-h-12 w-full rounded-full border-zinc-300 pl-5 pr-12 text-sm focus:border-zinc-950 focus:ring-zinc-950"><svg aria-hidden="true" class="absolute right-4 top-3 h-6 w-6 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="11" cy="11" r="7"/><path d="m16 16 4 4"/></svg></label>
            </div>
            <div class="my-8 flex gap-2 overflow-x-auto pb-2" role="group" aria-label="Product filters">
                @foreach(['all' => 'Tất cả', 'Áo' => 'Áo', 'Giày' => 'Giày', 'Phụ kiện' => 'Phụ kiện'] as $value => $label)
                    <button type="button" data-shop-category="{{ $value }}" aria-pressed="{{ $value === 'all' ? 'true' : 'false' }}" class="min-h-11 shrink-0 rounded-full border px-5 text-sm font-semibold transition {{ $value === 'all' ? 'border-zinc-950 bg-zinc-950 text-white' : 'border-zinc-300 bg-white text-zinc-800' }}">{{ $label }}</button>
                @endforeach
            </div>
            <div class="grid grid-cols-2 gap-x-3 gap-y-9 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-5">
                @foreach($products as [$name, $type, $price, $image])
                    <article data-shop-product data-category="{{ $type }}" data-search="{{ strtolower($name.' '.$type) }}" class="group min-w-0">
                        <button type="button" class="w-full text-left" aria-label="Xem {{ $name }}">
                            <span class="block aspect-square overflow-hidden rounded-xl bg-zinc-100"><img loading="lazy" src="{{ asset('demo-media/post-'.$image.'.jpg') }}" alt="{{ $name }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.035]"></span>
                            <span class="mt-4 block text-[11px] font-bold uppercase tracking-[0.16em] text-zinc-500">{{ $type }}</span>
                            <strong class="mt-1.5 block truncate text-sm sm:text-base">{{ $name }}</strong>
                            <span class="mt-1 block text-sm font-semibold">{{ $price }}</span>
                        </button>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="story" class="bg-zinc-100">
            <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.1fr_.9fr] lg:px-8 lg:py-24">
                <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500">Demo project</p><h2 class="mt-4 text-4xl font-semibold tracking-[-0.055em] sm:text-6xl">BXT Studio<br>× Instagram.</h2></div>
                <div class="self-end"><p class="leading-7 text-zinc-600">Trang này mô phỏng catalog của dự án Laravel ecommerce tham chiếu, nhưng dùng design system, media và component riêng của Instagram Clone.</p><a class="mt-6 inline-flex min-h-11 items-center font-bold underline decoration-2 underline-offset-8" href="https://github.com/buithang04/bxt-shopper-laravel-ecommerce" target="_blank" rel="noopener noreferrer">Xem repository tham chiếu ↗</a></div>
            </div>
        </section>
    </main>

    <footer class="border-t border-zinc-800 bg-zinc-950 text-white"><div class="mx-auto flex max-w-7xl flex-col gap-5 px-4 py-10 text-sm sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8"><strong class="text-xl tracking-[-0.06em]">BXT—studio</strong><p class="text-zinc-400">Demo giao diện · Laravel + Livewire + Tailwind</p><a href="{{ route('home') }}" class="font-semibold">Instagram Clone ↗</a></div></footer>

    <script>
        (() => {
            const menuButton = document.getElementById('shop-menu-toggle');
            const mobileNav = document.getElementById('shop-mobile-nav');
            const searchInput = document.getElementById('shop-search');
            const filterButtons = [...document.querySelectorAll('[data-shop-category]')];
            const products = [...document.querySelectorAll('[data-shop-product]')];
            let activeCategory = 'all';

            const filterProducts = () => {
                const query = searchInput.value.trim().toLocaleLowerCase('vi');
                products.forEach((product) => {
                    const matchesCategory = activeCategory === 'all' || product.dataset.category === activeCategory;
                    const matchesQuery = product.dataset.search.toLocaleLowerCase('vi').includes(query);
                    product.hidden = !(matchesCategory && matchesQuery);
                });
            };

            menuButton.addEventListener('click', () => {
                const willOpen = mobileNav.hidden;
                mobileNav.hidden = !willOpen;
                menuButton.setAttribute('aria-expanded', String(willOpen));
                menuButton.setAttribute('aria-label', willOpen ? 'Đóng menu' : 'Mở menu');
            });

            mobileNav.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
                mobileNav.hidden = true;
                menuButton.setAttribute('aria-expanded', 'false');
                menuButton.setAttribute('aria-label', 'Mở menu');
            }));

            searchInput.addEventListener('input', filterProducts);
            filterButtons.forEach((button) => button.addEventListener('click', () => {
                activeCategory = button.dataset.shopCategory;
                filterButtons.forEach((item) => {
                    const selected = item === button;
                    item.setAttribute('aria-pressed', String(selected));
                    item.classList.toggle('border-zinc-950', selected);
                    item.classList.toggle('bg-zinc-950', selected);
                    item.classList.toggle('text-white', selected);
                    item.classList.toggle('border-zinc-300', !selected);
                    item.classList.toggle('bg-white', !selected);
                    item.classList.toggle('text-zinc-800', !selected);
                });
                filterProducts();
            }));
        })();
    </script>
</body>
</html>
