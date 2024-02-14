<script>
import axios from 'axios';

export default {
  data() {
    return {
      btOrders: 'http://127.0.0.1:8000/api/orders',
      token: '',
    };
  },
  components: {},
  methods: {
    fetchAuth() {
      axios
        .get(`${this.btOrders}/generate`)
        .then((res) => {
          this.token = res.data.data.token;
        })
        .catch((error) => {
          console.log('Authorization Key not found!', error.response);
        });
    },

    displayDropIn() {
      var button = document.querySelector('#submit-button');

      braintree.dropin.create(
        {
          authorization: 'sandbox_x6h8xpjh_q547bdcc9wvr47w2',
          selector: '#dropin-container',
        },
        function (err, instance) {
          button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.error(
                  'Errore durante la richiesta del metodo di pagamento:',
                  err
                );
                // Gestire l'errore, ad esempio mostrando un messaggio all'utente
              } else {
                console.log('Payload del metodo di pagamento:', payload);
                // Utilizzare il payload per l'elaborazione del pagamento

                // Esegui una chiamata POST per inviare il token al server
                axios
                  .post(`http://127.0.0.1:8000/api/orders/makePayment`, {
                    token: payload.nonce,
                    product: 3,
                  })
                  .then((response) => {
                    console.log('Risposta dal server:', response.data);
                    // Gestire la risposta dal server
                  });
              }
            });
          });
        }
      );
    },
  },
  mounted() {
    this.fetchAuth();
    this.displayDropIn();
  },
};

// var button = document.querySelector('#submit-button');

// braintree.dropin.create(
//   {
//     authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
//     selector: '#dropin-container',
//   },
//   function (err, instance) {
//     button.addEventListener('click', function () {
//       instance.requestPaymentMethod(function (err, payload) {
//         // Submit payload.nonce to your server
//       });
//     });
//   }
// );
</script>

<template>
  <div class="w-150 container">
    <h1>Pagina pagamento</h1>
    <div></div>
    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">
      Purchase
    </button>
  </div>
</template>

<style lang="scss" scoped>
.w-150 {
  margin-top: 150px;
}
</style>
