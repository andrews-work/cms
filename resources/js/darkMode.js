console.log('darkMode.js - c');

import moonIcon from '../svg/moon.svg';
import sunIcon from '../svg/sun.svg';
import userDarkIcon from '../svg/user-d.svg';
import userLightIcon from '../svg/user.svg';

// Set the image sources
document.getElementById('moonIcon').src = moonIcon;
document.getElementById('sunIcon').src = sunIcon;
document.getElementById('userDarkIcon').src = userDarkIcon;
document.getElementById('userLightIcon').src = userLightIcon;

// toggle
const toggleDarkMode = () => {
    const htmlElement = document.documentElement;
    const isDark = htmlElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
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
};

initializeTheme();

document.getElementById('darkModeToggle').addEventListener('click', toggleDarkMode);
