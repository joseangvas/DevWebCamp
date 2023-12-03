// <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            const datos = new FormData();
            datos.append('paquete_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
            
            fetch('/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            })
            .then(respuesta => respuesta.json())
            .then(resultado => {
              if(resultado.resultado) {
                actions.redirect('http:localhost:3000/finalizar-registro/conferencias');
              }
            });
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
 
  initPayPalButton();
// </script>