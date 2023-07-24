import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Swal from 'sweetalert2';
import Chart from 'chart.js/auto';
window.Alpine = Alpine;



window.Swal =Swal;
window.Chart=Chart;


Alpine.plugin(focus);

Alpine.start();
