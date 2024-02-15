<template>
    <div class="container w-150">
        <div class="row">
            <div class="col-12 col-md-6">
                <form @submit.prevent="submitForm" class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" v-model="customer.name" class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text" v-model="customer.last_name" class="form-control" id="last_name">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" v-model="customer.email" class="form-control" id="email">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" v-model="customer.address" class="form-control" id="address"
                            placeholder="via devi paga!">
                    </div>
                    <div class="col-12">
                        <label for="phone_number" class="form-label">Numero di telefono</label>
                        <input type="text" v-model="customer.phone_number" class="form-control" id="phone_number"
                            placeholder="333333333333">
                    </div>


                    <div class="col-12">
                        <!-- Button trigger modal -->
                        <button @click="sendOrder()" type="submit" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Paga!
                        </button>
                    </div>
                </form>

            </div>
            <div class="col-12 col-md-6">
                <ul v-for="c in cart">
                    <li>{{ c.name }}</li>
                    <li>{{ c.price }}</li>
                    <li>{{ c.quantity }}</li>
                </ul>
            </div>
        </div>

        {{ this.currentOrderId }}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            ref="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Completa l'acquisto e termina il tuo ordine.
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div></div>
                        <div id="dropin-container"></div>
                        <!-- Messaggio di successo o di errore -->
                        <div v-if="paymentStatus !== null" class="alert"
                            :class="{ 'alert-success': paymentStatus, 'alert-danger': !paymentStatus }">
                            {{ paymentStatus ? 'Pagamento completato con successo!' : 'Errore durante il pagamento.' }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <!-- Rimuovi l'attributo data-bs-dismiss dal pulsante Paga -->
                        <button id="submit-button" class="button button--small button--green">
                            Paga
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import $ from 'jquery';
export default {

    data() {
        return {
            BASE_URL: 'http://127.0.0.1:8000/api',
            btOrders: 'http://127.0.0.1:8000/api/orders',
            customer: {
                'name': '',
                'last_name': '',
                'email': '',
                'address': '',
                'phone_number': '',
            },
            cart: [],
            currentOrderId: 0,
            token: '',
            paymentStatus: null
        }
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
            axios.post(`${this.BASE_URL}/orders`, {
                customer: this.customer,
                cart: this.cart
            })
                .then(res => {
                    this.currentOrderId = res.data.orderId;
                }).catch(error => {
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
            var button = document.querySelector('#submit-button');
            var self = this;

            braintree.dropin.create(
                {
                    authorization: 'sandbox_x6h8xpjh_q547bdcc9wvr47w2',
                    selector: '#dropin-container',
                },
                (err, instance) => {
                    button.addEventListener('click', () => {
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
                                axios.post(`http://127.0.0.1:8000/api/orders/makePayment`, {
                                    token: payload.nonce,
                                    orderId: self.currentOrderId
                                })
                                    .then((response) => {
                                        console.log('Risposta dal server:', response.data);
                                        localStorage.clear();
                                        if (response.data.success == true) {                                            
                                            // Esegui il redirect dopo 2 secondi
                                            setTimeout(() => {
                                                self.$router.push({ name: 'home' });
                                                // Chiudi il modal dopo aver eseguito il redirect
                                                // Imposta il pagamento su successo
                                                self.paymentStatus = true;
                                            }, 2000);
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
    },
    created() {
        // Leggi i dati del carrello dal localStorage all'avvio del componente
        const cartData = localStorage.getItem('cart');
        if (cartData) {
            this.cart = JSON.parse(cartData);
            console.log(this.cart);
        }
    },
    computed() {

    },
    mounted() {
        this.fetchAuth();
        this.displayDropIn();
    }
}

</script>

<style lang="scss" scoped>
.w-150 {
    margin-top: 150px;
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
</style>