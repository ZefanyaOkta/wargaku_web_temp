import './bootstrap';

import Alpine from 'alpinejs';
import persist from "@alpinejs/persist";
import flatpickr from "flatpickr";
import { startWindToast } from "@mariojgt/wind-notify/packages/index.js";


Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

// If you use Tailwind
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'

// If you use Bootstrap 5
