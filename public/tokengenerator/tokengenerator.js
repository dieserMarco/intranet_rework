(function () {
  const tokenInput = document.getElementById('token');
  const generateBtn = document.getElementById('generateToken');
  const form = document.getElementById('tokenForm');
  const resultMessage = document.getElementById('resultMessage');

  function randomChunk(length) {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let out = '';
    for (let i = 0; i < length; i += 1) {
      out += chars[Math.floor(Math.random() * chars.length)];
    }
    return out;
  }

  function generateToken() {
    return `FFWN-${randomChunk(4)}-${randomChunk(2)}`;
  }

  generateBtn.addEventListener('click', function () {
    tokenInput.value = generateToken();
  });

  form.addEventListener('submit', async function (event) {
    event.preventDefault();

    if (!tokenInput.value) {
      tokenInput.value = generateToken();
    }

    const formData = new FormData(form);

    try {
      const response = await fetch('./api/save_token.php', {
        method: 'POST',
        body: formData,
      });
      const data = await response.json();

      if (!response.ok || !data.success) {
        throw new Error(data.message || 'Speichern fehlgeschlagen.');
      }

      resultMessage.className = 'notice notice-info';
      resultMessage.textContent = `Token gespeichert. ID: ${data.id}`;
    } catch (error) {
      resultMessage.className = 'notice notice-danger';
      resultMessage.textContent = error.message;
    }
  });
})();
