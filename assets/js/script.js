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
/* =========================================================
   GALERI SLIDER STYLE
   ========================================================= */
.slider-container {
  position: relative;
  width: 100%;
  max-width: 900px;
  margin: 40px auto;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.slide {
  display: none;
  animation: fadeSlide 1s ease-in-out;
}

.slide img {
  width: 100%;
  height: 450px;
  object-fit: cover;
}

@keyframes fadeSlide {
  from { opacity: 0.4; }
  to { opacity: 1; }
}

/* Tombol navigasi */
.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(255, 122, 0, 0.8);
  color: white;
  border: none;
  padding: 10px 16px;
  font-size: 1.5rem;
  cursor: pointer;
  border-radius: 50%;
  transition: background 0.3s;
}
.slider-btn:hover {
  background-color: #e56a00;
}
.prev {
  left: 15px;
}
.next {
  right: 15px;
}

/* Indikator titik */
.dots {
  text-align: center;
  margin-top: 15px;
}
.dot {
  height: 12px;
  width: 12px;
  margin: 0 5px;
  display: inline-block;
  border-radius: 50%;
  background-color: #ccc;
  transition: background-color 0.3s;
}
.dot.active {
  background-color: #ff7a00;
}

// ===========================================================
// GALERI SLIDER OTOMATIS DPD GERAKAN RAKYAT KOTA KEDIRI
// ===========================================================

let currentSlide = 0;

function showSlide(index) {
  const slides = document.querySelectorAll(".slide");
  if (slides.length === 0) return;

  if (index >= slides.length) currentSlide = 0;
  if (index < 0) currentSlide = slides.length - 1;

  slides.forEach((slide, i) => {
    slide.style.display = i === currentSlide ? "block" : "none";
    slide.classList.toggle("active", i === currentSlide);
  });
}

function nextSlide() {
  currentSlide++;
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide--;
  showSlide(currentSlide);
}

// Auto-slide setiap 5 detik
setInterval(() => {
  nextSlide();
}, 5000);

// Jalankan saat halaman siap
document.addEventListener("DOMContentLoaded", () => {
  showSlide(currentSlide);
});
