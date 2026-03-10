const root = document.documentElement;
const themeLabel = document.getElementById("themeLabel");
const themeToggle = document.getElementById("themeToggle");
const form = document.getElementById("memberForm");
const msgOk = document.getElementById("msgOk");
const msgErr = document.getElementById("msgErr");

function setTheme(theme) {
  root.setAttribute("data-theme", theme);
  themeLabel.textContent = theme === "dark" ? "Dark" : "Light";
  localStorage.setItem("theme", theme);
}

setTheme(localStorage.getItem("theme") || "dark");

themeToggle?.addEventListener("click", () => {
  const next = root.getAttribute("data-theme") === "dark" ? "light" : "dark";
  setTheme(next);
});

form?.addEventListener("submit", async (event) => {
  event.preventDefault();
  msgOk.style.display = "none";
  msgErr.style.display = "none";

  const payload = Object.fromEntries(new FormData(form).entries());

  try {
    const response = await fetch("api/save-member.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });

    const result = await response.json();
    if (!response.ok) throw new Error(result.message || "Fehler beim Speichern.");

    msgOk.textContent = result.message;
    msgOk.style.display = "block";
    form.reset();
  } catch (error) {
    msgErr.textContent = error.message;
    msgErr.style.display = "block";
  }
});
