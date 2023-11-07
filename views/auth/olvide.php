<main class="auth">
  <h2 class="auth__heading"><?php echo $titulo; ?></h2>
  <p class="auth__texto">Recupera tu Acceso a DevWebCamp</p>

  <form action="" class="formulario" method="">
    <div class="formulario__campo">
      <label for="email" class="formulario__label">Email</label>
      <input
        type="email"
        class="formulario__input"
        placeholder="Tu Email"
        id="email"
        name="email"
      />
    </div>
    <input type="submit" class="formulario__submit" value="Enviar Instrucciones">
  </form>

  <div class="acciones">
    <a href="/login" class="acciones__enlace">¿Ya Tienes una Cuenta? Iniciar Sesión</a>
    <a href="/registro" class="acciones__enlace">¿Aún No Tienes Cuenta? Obtener Una</a>
  </div>
</main>