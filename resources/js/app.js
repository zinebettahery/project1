import './bootstrap';
window.$ = window.jQuery = require('jquery');

import { Dropdown } from 'bootstrap';

// Initialize dropdowns
document.addEventListener('DOMContentLoaded', function () {
    new Dropdown(document.getElementById('navbarDropdown'));
});
