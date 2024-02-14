<script>
import axios from 'axios';

export default {
  data() {
    return {
      btOrders: 'http://127.0.0.1:8000/api/orders',
      token: null,
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
              console.log(payload);
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
    <div>
      <!-- <v-braintree
        :authorization="this.token"
        locale="it_IT"
        @success="onSuccess"
        @error="onError"
        >
      </v-braintree> -->
    </div>
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

.button {
  cursor: pointer;
  font-weight: 500;
  left: 3px;
  line-height: inherit;
  position: relative;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  -webkit-appearance: none;
  -moz-appearance: none;
  display: inline-block;
}

.button--small {
  padding: 10px 20px;
  font-size: 0.875rem;
}

.button--green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}

.button--green:hover {
  background-color: #8bdda8;
  color: white;
}
</style>
