<main class="devwebcamp">
  <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
  <p class="devwebcamp__descripcion">Conoce la Conferencia más Importante de Latinoamérica</p>

  <div class="devwebcamp__grid">
    <div <?php aos_animacion(); ?> class="devwebcamp__imagen">
      <picture>
        <source srcset = "build/img/sobre_devwebcamp.avif" type="image/avif">
        <source srcset = "build/img/sobre_devwebcamp.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp">
      </picture>
    </div>

    <div class="devwebcamp__contenido">
      <p <?php aos_animacion(); ?> class="devwebcamp__texto">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque accumsan velit id maximus hendrerit. Integer augue nisi, lacinia eget mauris quis, ullamcorper rhoncus leo. Curabitur sodales, mauris id elementum gravida, nibh risus scelerisque est, sed sagittis mauris nunc a massa. Mauris tempus lacus vitae nibh escamprs, sed auctor nisl lacinia. Pellenque eu justo sem. Nulla metus nulla, efficitur et maximus in, laoreet in nulla. Phasellus egestas tincidunt elit, vitae pellentesque metus aliquet et. Ut ligula lacus, aliquet vel massa et, auctor ornare enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

      <p <?php aos_animacion(); ?> class="devwebcamp__texto">Nunc viverra est enim, at vehicula eros ultrices ut. Mauris posuere, lectus vitae lobortis efficitur, eros felis tincidunt erat, nec faucibus mi orci nec elit. Duis congue porttitor risus, eu maximus dui malesuada id. Quisque maximus lacinia magna, sed mattis mi ullamcorper non. Donec euismod metus id mi volutpat, quis dignissim velit sollicitudin.</p>
    </div>
  </div>
</main>