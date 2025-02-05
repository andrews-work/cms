
console.log('darkMode.js - c')

// Function to toggle dark mode
const toggleDarkMode = () => {
    const htmlElement = document.documentElement;
    const isDark = htmlElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
  };

  // Function to initialize theme based on localStorage or system preference
  const initializeTheme = () => {
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  };

  // Initialize theme on page load
  initializeTheme();

  // Add event listener to a toggle button
  document.getElementById('darkModeToggle').addEventListener('click', toggleDarkMode);
