<template>
  <main class="w-150">
    <div class="bg-img"></div>
    <div class="container btn-back">
      <router-link
        :to="{
          name: 'restaurants.show',
          params: { id: cart[0].restaurant_id },
        }"
        class="btn btn-light"
      >
        <span><i class="fa-solid fa-arrow-left color-main"></i></span>
        <span>Indietro</span>
      </router-link>
    </div>
    <div class="container">
      <div class="row flex-md-nowrap gap-2">
        <div class="col-12 col-md-6 customer-form">
          <h2 class="border_btm pb-2">Dati di spedizione</h2>
          <form @submit.prevent="submitForm" class="row g-3">
            <div class="col-md-6 space">
              <label for="name" class="form-label fw-bold">Nome</label>
              <input
                type="text"
                v-model="customer.nome"
                class="form-control"
                id="nome"
                placeholder="Mario"
                ref="nome"
                @input="inputValidation('nome')"
                @blur="inputValidation('nome')"
                autofocus
              />
              <!-- Error message from validation -->
              <div class="mb-1 mt-2 row">
                <div
                  ref="nomeConfirmMessage"
                  class="confirm-message col-md-6"
                ></div>
              </div>
            </div>
            <div class="col-md-6 space">
              <label for="last_name" class="form-label fw-bold">Cognome</label>
              <input
                type="text"
                v-model="customer.cognome"
                class="form-control"
                id="cognome"
                placeholder="Rossi"
                ref="cognome"
                @input="inputValidation('cognome')"
                @blur="inputValidation('cognome')"
              />
              <!-- Error message from validation -->
              <div class="mb-1 mt-2 row">
                <div
                  ref="cognomeConfirmMessage"
                  class="confirm-message col-md-6"
                ></div>
              </div>
            </div>
            <div class="col-12 space">
              <label for="email" class="form-label fw-bold">Email</label>
              <input
                type="email"
                v-model="customer.email"
                class="form-control"
                id="email"
                placeholder="mario.rossi@deliveboo.it"
                ref="email"
                @input="inputValidation('email')"
                @blur="inputValidation('email')"
              />
              <!-- Error message from validation -->
              <div class="mb-1 mt-2 row">
                <div
                  ref="emailConfirmMessage"
                  class="confirm-message col-md-6"
                ></div>
              </div>
            </div>
            <div class="col-12 space">
              <label for="address" class="form-label fw-bold">Indirizzo</label>
              <input
                type="text"
                v-model="customer.indirizzo"
                class="form-control"
                id="indirizzo"
                placeholder="Viale Cappuccini 87"
                ref="indirizzo"
                @input="inputValidation('indirizzo')"
                @blur="inputValidation('indirizzo')"
              />
              <!-- Error message from validation -->
              <div class="mb-1 mt-2 row">
                <div
                  ref="indirizzoConfirmMessage"
                  class="confirm-message col-md-6"
                ></div>
              </div>
            </div>
            <div class="col-12 space">
              <label for="phone_number" class="form-label fw-bold"
                >Numero di telefono</label
              >
              <input
                type="text"
                v-model="customer.numero_di_telefono"
                class="form-control"
                id="telefono"
                placeholder="320 6745938"
                ref="numero_di_telefono"
                @input="inputValidation('numero_di_telefono')"
                @blur="inputValidation('numero_di_telefono')"
              />
              <!-- Error message from validation -->
              <div class="mb-1 mt-2 row">
                <div
                  ref="numero_di_telefonoConfirmMessage"
                  class="confirm-message col-md-6"
                ></div>
              </div>
            </div>

            <div class="col-12">
              <!-- Button trigger modal -->
              <button
                @click="sendOrder()"
                type="submit"
                ref="submit"
                class="btn btn-light btn-form fw-bold"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                Procedi al pagamento
              </button>
            </div>
          </form>
        </div>
        <div class="col-12 col-md-6 summary">
          <h2 class="border_btm pb-2">Riepilogo Ordine</h2>
          <div class="summary_list_container">
            <ul class="border_btm summary_list" v-for="c in cart">
              <li class="col-6 col_name">{{ c.name }}</li>
              <li class="col-3 col_quantity">x{{ c.quantity }}</li>
              <li class="col-3 col_price">{{ c.price }} €</li>
            </ul>
          </div>
          <h4 class="border_top pt-2">Totale: {{ this.currentTotal }} €</h4>
        </div>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ref="exampleModal"
        data-bs-backdrop="static"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Completa l'acquisto e termina il tuo ordine.
              </h1>
              <!-- <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button> -->
            </div>
            <div class="modal-body">
              <div></div>
              <div id="dropin-container"></div>
              <!-- Messaggio di successo o di errore -->
              <div
                v-if="paymentStatus !== null"
                class="alert mt-2"
                :class="{
                  'alert-success': paymentStatus,
                  'alert-danger': !paymentStatus,
                }"
              >
                {{
                  paymentStatus
                    ? 'Pagamento completato con successo!'
                    : 'Errore durante il pagamento.'
                }}
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                id="close-button"
                class="button button--small button--gray"
                data-bs-dismiss="modal"
              >
                Chiudi
              </button>
              <!-- Rimuovi l'attributo data-bs-dismiss dal pulsante Paga -->
              <button
                id="submit-button"
                class="button button--small button--green"
              >
                Paga
              </button>
            </div>
            <!-- Loader per il pagamento -->
            <div v-if="isLoading" class="loading">
              <span class="loader"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      BASE_URL: 'http://127.0.0.1:8000/api',
      btOrders: 'http://127.0.0.1:8000/api/orders',
      customer: {
        nome: '',
        cognome: '',
        email: '',
        indirizzo: '',
        telefono: '',
      },

      cart: [],
      currentOrderId: 0,
      currentTotal: 0,
      token: '',
      isLoading: false,
      paymentStatus: null,
    };
  },
  methods: {
    closeModal() {
      // Chiudi il modal utilizzando il riferimento
      var modal = document.getElementById('exampleModal');
      modal.classList.remove('show');
    },
    openModal() {
      this.$refs.exampleModal.classList.add('show');
    },
    sendOrder() {
      let customerToSend = {
        name: this.customer.nome,
        last_name: this.customer.cognome,
        email: this.customer.email,
        address: this.customer.indirizzo,
        phone_number: this.customer.numero_di_telefono,
      };
      axios
        .post(`${this.BASE_URL}/orders`, {
          customer: customerToSend,
          cart: this.cart,
        })
        .then((res) => {
          this.currentOrderId = res.data.orderId;
        })
        .catch((error) => {
          console.log(error);
        });
    },
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
      var closeButton = document.querySelector('#close-button');
      var button = document.querySelector('#submit-button');
      var self = this;

      braintree.dropin.create(
        {
          authorization: 'sandbox_bnfr9j56_q547bdcc9wvr47w2',
          selector: '#dropin-container',
        },
        (err, instance) => {
          button.addEventListener('click', () => {
            button.disabled = true;
            closeButton.disabled = true;
            instance.requestPaymentMethod((err, payload) => {
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
                    orderId: self.currentOrderId,
                  })
                  .then((response) => {
                    console.log('Risposta dal server:', response.data);
                    localStorage.clear();

                    if (response.data.success == true) {
                      // Mostra il loader
                      self.isLoading = true;

                      // Timeout per nascondere il loader dopo 3 secondi
                      setTimeout(() => {
                        self.isLoading = false;

                        // Timeout per impostare il pagamento su successo dopo altri 1 secondo
                        setTimeout(() => {
                          self.paymentStatus = true;
                        }, 1000);
                      }, 3000);

                      // Esegui il redirect dopo 6 secondi
                      setTimeout(() => {
                        self.$router.push({ name: 'home' }).then(() => {
                          // Dopo il redirect, esegui il reload della pagina
                          window.location.reload();
                        });
                      }, 6000);
                    } else {
                      // Imposta il pagamento su errore
                      self.paymentStatus = false;
                    }
                  });
              }
            });
          });
        }
      );
    },

    // Input validation
    inputValidation(inputName) {
      // get the input values
      let inputValue = this.customer[inputName];

      // reformat the message input name
      let formattedName = inputName.includes('_')
        ? inputName
            .split('_')
            .map((word, index) =>
              index === 0 ? word.charAt(0).toUpperCase() + word.slice(1) : word
            )
            .join(' ')
        : inputName
            .split('_')
            .map((word, index) =>
              index === 0 ? word.charAt(0).toUpperCase() + word.slice(1) : word
            )
            .join(' ');

      // only allows for number for a given name input
      if (
        inputName &&
        inputName === 'numero_di_telefono' &&
        this.customer[inputName]
      ) {
        inputValue = this.customer[inputName].replace(/\D/g, '');
      }

      if (!inputValue) {
        // Display an error message
        this.$refs[
          `${inputName}ConfirmMessage`
        ].innerHTML = `Per favore inserisci ${
          inputName == 'email' || inputName == 'indirizzo' ? "l'" : 'il'
        } ${formattedName}!`;
        // Add a class to style the error
        this.$refs[inputName].classList.add('confirm-error');
        // Disable submit button
        this.$refs['submit'].disabled = true;
      } else {
        // Clear error message
        this.$refs[`${inputName}ConfirmMessage`].innerHTML = '';
        // Remove error styling
        this.$refs[inputName].classList.remove('confirm-error');
        // Enable submit button
        this.$refs['submit'].disabled = false;
      }
    },
  },
  created() {
    // Leggi i dati del carrello dal localStorage all'avvio del componente
    const cartData = localStorage.getItem('cart');
    const priceData = localStorage.getItem('price');
    if (cartData) {
      this.cart = JSON.parse(cartData);
      // console.log(this.cart);
    }
    if (priceData) {
      this.currentTotal = JSON.parse(priceData);
    }
  },
  computed() {},
  mounted() {
    this.fetchAuth();
    this.displayDropIn();
  },
};
</script>

<style lang="scss" scoped>
@import url(../../../style/partials/_variables.scss);

.bg-img {
  width: 100%;
  height: 100%;
  background-image: url(../../../public/wave-haikei-2.svg);
  background-size: cover;
  background-repeat: no-repeat;
  top: 0;
  right: 0;
  position: absolute;
  z-index: -10;
}

.w-150 {
  margin-top: 130px;
}

/* RIEPILOGO ORDINE */

.summary {
  padding: 20px;
  border: 1px solid gray;
  border-radius: 10px;
  background: rgba(134, 134, 134, 0.5);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(134, 134, 134, 0.25);
  display: flex;
  flex-direction: column;
}

.summary_list {
  display: flex;
  margin: 0;
  padding: 15px 0px;
  justify-content: space-between;
  font-weight: 600;

  &:last-child {
    border: none;
  }
}

.summary_list_container {
  flex-grow: 1;
  overflow: auto;
}

/* Personalizza la scrollbar per i browser WebKit */
.summary_list_container::-webkit-scrollbar {
  width: 10px;
  /* Larghezza della scrollbar */
}

.summary_list_container::-webkit-scrollbar-track {
  background: transparent;
  /* Colore dello sfondo della traccia */
}

.summary_list_container::-webkit-scrollbar-thumb {
  background: #888;
  /* Colore del pulsante */
  border-radius: 5px;
  /* Bordo arrotondato */
}

.summary_list_container::-webkit-scrollbar-thumb:hover {
  background: #555;
  /* Cambia il colore al passaggio del mouse */
}

.customer-form {
  padding: 20px;
  border: 1px solid gray;
  border-radius: 10px;
  background: rgba(134, 134, 134, 0.5);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(134, 134, 134, 0.25);
}

.show {
  display: block !important;
  opacity: 1 !important;
  visibility: visible !important;
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

.button--gray {
  outline: none;
  background-color: #949695;
  border-color: #949695;
  color: white;
  transition: all 200ms ease;
}

.button--gray:hover {
  background-color: #838383;
  color: white;
}

.btn-form {
  background-color: #01ccbc;
  border: none;

  &:hover {
    background-color: #05ddcb;
  }
}

.color-main {
  color: #05ddcb;
}

.btn-back {
  a {
    display: flex;
    gap: 10px;
    align-items: center;
    border: 1px solid lightgray;
  }

  display: flex;
  justify-content: flex-start;
  padding: 12px 0px;
}

.border_btm {
  border-bottom: 0.5px solid rgba(150, 150, 150, 0.5);
}

.border_top {
  border-top: 0.5px solid rgba(150, 150, 150, 0.5);
  text-align: end;
}

.col_quantity {
  display: flex;
  justify-content: flex-start;
  padding-right: 20px;
}

.col_price {
  text-align: end;
}

.space {
  height: 100px;
}

/* LOADER */

.modal-content {
  background: rgba(61, 254, 214, 0.4);
  backdrop-filter: blur(30px);
  border: 1px solid rgba(61, 254, 214, 0.25);
  position: relative;

  .modal-header {
    border: none;
    justify-content: center;
  }

  .modal-footer {
    border: none;
  }
}

.loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 99999;
}

.loader {
  transform: translateZ(1px);
}

.loader:after {
  content: '$';
  display: inline-block;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  text-align: center;
  line-height: 62px;
  font-size: 32px;
  font-weight: bold;
  background: #ffd700;
  color: #daa520;
  border: 4px double;
  box-sizing: border-box;
  box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.1);
  animation: coin-flip 4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}

@keyframes coin-flip {
  0%,
  100% {
    animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
  }

  0% {
    transform: rotateY(0deg);
  }

  50% {
    transform: rotateY(1800deg);
    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
  }

  100% {
    transform: rotateY(3600deg);
  }
}
//Form Validation
.confirm-message {
  color: red;
  font-weight: 500;
  width: 100%;
}

.confirm-error {
  border-color: red !important;
  box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25) !important;
}
</style>
