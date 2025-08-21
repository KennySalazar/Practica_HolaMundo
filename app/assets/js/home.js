(function () {
  const root = document.getElementById('home-carousel');
  if (!root) return;

  const images = JSON.parse(root.getAttribute('data-images') || '[]');
  const img = document.getElementById('carousel-image');
  const prev = document.getElementById('prev');
  const next = document.getElementById('next');

  let i = 0;
  const show = (idx) => {
    i = (idx + images.length) % images.length;
    img.src = images[i];
  };

  prev.addEventListener('click', () => show(i - 1));
  next.addEventListener('click', () => show(i + 1));

  // Auto-rotación cada 5s
  let timer = setInterval(() => show(i + 1), 5000);
  root.addEventListener('mouseenter', () => clearInterval(timer));
  root.addEventListener('mouseleave', () => (timer = setInterval(() => show(i + 1), 5000)));
})();
