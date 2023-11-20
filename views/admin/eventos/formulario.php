<fieldset class="formulario__fieldset">
  <legend class="formulario__legend">Información del Evento</legend>

  <div class="formulario__campo">
    <label for="nombre" class="formulario__label">Nombre Evento</label>
    <input 
      type="text" 
      class="formulario__input"
      id="nombre"
      name="nombre"
      placeholder="Nombre del Evento"
    />
  </div>

  <div class="formulario__campo">
    <label for="descripcion" class="formulario__label">Descripción:</label>
    <textarea 
      class="formulario__input"
      id="descripcion"
      name="descripcion"
      placeholder="Descripción del Evento"
      rows="8"
    ></textarea>
  </div>

  <div class="formulario__campo">
    <label for="descripcion" class="formulario__label">Tipo de Evento:</label>
    <select class="formulario__select" name="categoria_id" id="categoria">
      <option value="">-- Seleccione una opción --</option>
      <?php foreach($categorias as $categoria) { ?>
        <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
      <?php } ?>
    </select>

  </div>
</fieldset>

