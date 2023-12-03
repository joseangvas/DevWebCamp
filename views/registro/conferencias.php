<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">Eliga hasta 5 eventos para asistir de forma presencial</p>

<div class="eventos-registro">
  <main class="eventos-registro__listado">
    <h3 class="eventos__heading--conferencias">&lt;Conferencias /></h3>
    <p class="eventos__fecha">Viernes 5 de Octubre</p>

    <div class="eventos-registro__grid">
      <?php foreach($eventos['conferencias_s'] as $evento) { ?>
        <?php include __DIR__ . '/evento.php'; ?>
      <?php } ?>
    </div>

  </main>

  <aside class="registro">
        <h2 class="registro__heading">Tu Registro</h2>
  </aside>
</div>