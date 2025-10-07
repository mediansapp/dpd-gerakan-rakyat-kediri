// assets/js/script.js

// Animasi navbar: menempel di atas saat scroll
window.addEventListener("scroll", function() {
  const nav = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    nav.classList.add("shadow");
  } else {
    nav.classList.remove("shadow");
  }
});

// Smooth scroll ke elemen dalam halaman
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

// Notifikasi sementara (alert sukses pendaftaran)
function showAlert(message, type = "success") {
  const alertBox = document.createElement("div");
  alertBox.className = `alert alert-${type} fixed-top text-center`;
  alertBox.style.zIndex = "9999";
  alertBox.innerText = message;
  document.body.appendChild(alertBox);
  setTimeout(() => alertBox.remove(), 4000);
}
