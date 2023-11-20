<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
  <a class="dashboard__boton" href="/admin/eventos/crear">
    <i class="fa-solid fa-circle-plus"></i>
    Añadir Evento
  </a>
</div>

<div class="dashboard__contenedor">
  <?php if(!empty($eventos)) { ?>
    <table class="table">
      <thead class="table__thead">
        <tr>
          <th scope="col" class="table__th">Foto</th>
          <th scope="col" class="table__th">Nombre</th>
          <th scope="col" class="table__th">Tecnologías</th>
          <th scope="col" class="table__th">Ubicación</th>
          <th scope="col" class="table__th"></th>
        </tr>
      </thead>

      <tbody class="table__tbody">
        <?php foreach ($eventos as $evento) { ?>
          <tr class="table__tr">
            <td class="table__td">
              <?php echo $evento->nombre . " " . $evento->apellido; ?>
            </td>

            <td class="table__td">
              <?php echo $evento->tags; ?>
            </td>

            <td class="table__td">
              <?php echo $evento->ciudad . ", " . $evento->pais; ?>
            </td>

            <td class="table__td--acciones">
              <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $evento->id; ?>">
                <i class="fa-solid fa-user-pen"></i>
                Editar
              </a>

              <form method="POST" action="/admin/ponentes/eliminar" class="table__formulario">
                <input type="hidden" name="id" value="<?php echo $evento->id; ?>">
                <button class="table__accion table__accion--eliminar" type="submit">
                  <i class="fa-solid fa-circle-xmark"></i>
                  Eliminar
                </button>
              </form>
            </td>
          </tr>

        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <p class="text-center">No Hay Ponentes Aún</p>
  <?php } ?>
</div>

<?php
  echo $paginacion;
?>