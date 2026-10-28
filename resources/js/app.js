import './bootstrap';

import { livewire_hot_reload } from 'virtual:livewire-hot-reload'
livewire_hot_reload();


import intersect from '@alpinejs/intersect'

// Livewire 3 ships and starts Alpine. Register plugins on its lifecycle event
// instead of starting a second Alpine instance, which breaks x-data scopes
// after Livewire navigation.
document.addEventListener('alpine:init', () => {
    window.Alpine?.plugin(intersect);
}, { once: true });


// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

// import Swiper and modules styles
import 'swiper/css';
//import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Swiper=Swiper;
window.Navigation=Navigation;
window.Pagination=Pagination;
