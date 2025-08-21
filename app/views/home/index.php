<?php require __DIR__ . '/../layouts/header.php'; ?>

<main>
  <h1>Laboratorio Clínico Químico-Biólogo</h1>
  <p>Usa el menú para navegar.</p>


  <section class="hero">
    <!-- Carrusel -->
    <div class="carousel" id="home-carousel" data-images='[
      "../app/assets/img/lab1.jpg",
      "../app/assets/img/lab2.jpg",
      "../app/assets/img/lab3.jpg"
    ]'>
      <img id="carousel-image" src="../app/assets/img/lab1.jpg" alt="Laboratorio - portada">
      <div class="controls">
        <button type="button" class="btn btn-sm" id="prev">⟵ Anterior</button>
        <button type="button" class="btn btn-sm" id="next">Siguiente ⟶</button>
      </div>
    </div>

    <!-- Video -->
    <div class="video-card">
      <video controls poster="../app/assets/img/fondo1.jpg">
        <source src="../app/assets/video/playback.mp4" type="video/mp4">
        Tu navegador no soporta video HTML5.
      </video>
    </div>
  </section>
</main>

<!-- JS solo para la portada -->
<script src="../app/assets/js/home.js" defer></script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
