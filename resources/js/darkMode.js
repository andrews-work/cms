import moonIcon from '../svg/moon.svg';
import sunIcon from '../svg/sun.svg';

console.log('darkMode.js - c');

// Set the image sources
document.getElementById('moonIcon').src = moonIcon;
document.getElementById('sunIcon').src = sunIcon;

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
