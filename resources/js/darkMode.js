console.log('darkMode.js - c');

import moonIcon from '../svg/moon.svg';
import sunIcon from '../svg/sun.svg';
import userDarkIcon from '../svg/user-d.svg';
import userLightIcon from '../svg/user.svg';

// Wait for the DOM to load before initializing icons
document.addEventListener('DOMContentLoaded', () => {
    // Set the image sources (only if elements exist)
    const moonIconElement = document.getElementById('moonIcon');
    const sunIconElement = document.getElementById('sunIcon');
    const userDarkIconElement = document.getElementById('userDarkIcon');
    const userLightIconElement = document.getElementById('userLightIcon');

    if (moonIconElement) moonIconElement.src = moonIcon;
    if (sunIconElement) sunIconElement.src = sunIcon;
    if (userDarkIconElement) userDarkIconElement.src = userDarkIcon;
    if (userLightIconElement) userLightIconElement.src = userLightIcon;

    // Initialize dark mode toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', toggleDarkMode);
    }

    // Initialize icons based on the current theme
    updateIcons();
});

// Function to update icons based on current theme
const updateIcons = () => {
    const htmlElement = document.documentElement;
    const moonIconElement = document.getElementById('moonIcon');
    const sunIconElement = document.getElementById('sunIcon');
    const userDarkIconElement = document.getElementById('userDarkIcon');
    const userLightIconElement = document.getElementById('userLightIcon');

    const isDarkMode = htmlElement.classList.contains('dark');

    // Update icon visibility based on the theme
    if (isDarkMode) {
        if (moonIconElement) moonIconElement.style.display = 'none';
        if (sunIconElement) sunIconElement.style.display = 'inline';
        if (userDarkIconElement) userDarkIconElement.style.display = 'inline';
        if (userLightIconElement) userLightIconElement.style.display = 'none';
    } else {
        if (moonIconElement) moonIconElement.style.display = 'inline';
        if (sunIconElement) sunIconElement.style.display = 'none';
        if (userDarkIconElement) userDarkIconElement.style.display = 'none';
        if (userLightIconElement) userLightIconElement.style.display = 'inline';
    }
};

// toggle
const toggleDarkMode = () => {
    const htmlElement = document.documentElement;
    const isDark = htmlElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');

    // Update icons after toggling theme
    updateIcons();
};

// local storage
const initializeTheme = () => {
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Update icons after initializing theme
    updateIcons();
};

// Run initializeTheme as soon as the script loads
initializeTheme();
