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

    <div class="formulario__campo">
      <label for="dia" class="formulario__label">Seleccione el Día:</label>

      <div class="formulario__radio">
        <?php foreach($dias as $dia) { ?>
          <div>
            <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>

            <input
              type="radio"
              id="<?php echo strtolower($dia->nombre); ?>"
              name="dia"
              value="<?php echo $dia->id; ?>"
            />
          </div>
        <?php } ?>
      </div>

    </div>
  </div>

  <div class="formulario__campo" id="horas">
    <label for="" class="formulario__label">Seleccione la Hora:</label>

    <ul class="horas">
      <?php foreach($horas as $hora) { ?>
        <li class="horas__hora"><?php echo $hora->hora; ?></li>
      <?php } ?>
    </ul>
  </div>
</fieldset>

<fieldset class="formulario__fieldset">
  <legend class="formulario__legend">Información Extra:</legend>

  <div class="formulario__campo">
    <label for="ponentes" class="formulario__label">Ponentes:</label>
    <input 
      type="text"
      class="formulario__input"
      id="ponentes"
      placeholder="Buscar Ponente"
    />
  </div>

  <div class="formulario__campo">
    <label for="disponibles" class="formulario__label">Cupos Disponibles:</label>
    <input 
      type="number"
      min="1"
      class="formulario__input"
      id="disponibles"
      name="disponibles"
      placeholder="Cupos Disponibles"
    />
  </div>
</fieldset>