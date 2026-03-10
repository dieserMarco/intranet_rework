(function () {
  const key = 'ffwn-theme';
  const body = document.body;
  const btn = document.getElementById('themeToggle');

  const apply = (theme) => {
    body.classList.toggle('theme-light', theme === 'light');
    body.classList.toggle('theme-dark', theme !== 'light');
    if (btn) btn.textContent = theme === 'light' ? 'Dark' : 'Light';
  };

  const current = localStorage.getItem(key) || 'dark';
  apply(current);

  if (btn) {
    btn.addEventListener('click', () => {
      const next = body.classList.contains('theme-light') ? 'dark' : 'light';
      localStorage.setItem(key, next);
      apply(next);
    });
  }
})();
