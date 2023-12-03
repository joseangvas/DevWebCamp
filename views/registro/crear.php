<main class="registro">
  <h2 class="registro__heading"><?php echo $titulo; ?></h2>
  <p class="registro__descripcion">Elige tu Plan</p>

  <div <?php aos_animacion(); ?> class="paquetes__grid">
    <div class="paquete">
      <h3 class="paquete__nombre">Pase Gratis</h3>

      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
      </ul>

      <p class="paquete__precio">$0</p>

      <form method="POST" action="/finalizar-registro/gratis">
        <input type="submit" class="paquetes__submit" value="Inscripción Gratis">

      </form>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Pase Presencial</h3>

      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
        <li class="paquete__elemento">Pase por 2 días</li>
        <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
        <li class="paquete__elemento">Acceso a las Grabaciones</li>
        <li class="paquete__elemento">Camisa del Evento</li>
        <li class="paquete__elemento">Comida y Bebida</li>
      </ul>

      <p class="paquete__precio">$199</p>
      
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container"></div>
        </div>  
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Pase Virtual</h3>

      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
        <li class="paquete__elemento">Pase por 2 días</li>
        <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
        <li class="paquete__elemento">Acceso a las Grabaciones</li>
      </ul>

      <p class="paquete__precio">$49</p>
    </div>
  </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AR02EFdH1jPdaVL34tntP0ggHiTDRB_Qvr1-sskRMKaRlnCAgi4xmdPAzmBqajMiRoXbadilMDpzmlei" data-sdk-integration-source="button-factory"></script>

<script src="paypal.js"></script>