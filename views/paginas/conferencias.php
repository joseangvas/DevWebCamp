<main class="agenda">
  <h2 class="agenda__heading">workshops y Conferencias</h2>
  <p class="agenda__descripcion">Talleres y Conferencias dictados por Expertos en Desarrollo Web</p>

  <!-- Mostrar Conferencias en la Página -->
  <div class="eventos">
    <h3 class="eventos__heading">&lt;Conferencias /></h3>
    <p class="eventos__fecha">Viernes 5 de Octubre</p>

    <div class="eventos__listado">
      <?php foreach($eventos['conferencias_v'] as $evento) { ?>
        <div class="evento">
          <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>

          <div class="evento__informacion">
            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

            <div>
              <p class="evento__informacion"><?php echo $evento->descripcion; ?></p>
            </div>

            <div class="evento__autor-info">
              <picture>
                <source srcset="img/speakers/<?php echo $evento->ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="img/speakers/<?php echo $evento->ponente->imagen; ?>.png" type="image/png">
                <img src="img/speakers/<?php echo $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
              </picture>

              <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre . " " . $evento->ponente->apellido; ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <p class="eventos__fecha">Sábado 6 de Octubre</p>

    <div class="eventos__listado">

    </div>

  </div>

  <div class="eventos eventos--workshops">
    <h3 class="eventos__heading">&lt;Workshops /></h3>
    <p class="eventos__fecha">Viernes 5 de Octubre</p>

    <div class="eventos__listado">

    </div>

    <p class="eventos__fecha">Sábado 6 de Octubre</p>

    <div class="eventos__listado">

    </div>

  </div>
</main>