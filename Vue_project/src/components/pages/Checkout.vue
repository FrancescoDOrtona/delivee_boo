<template>
    <main>
        <div class="bg-img"></div>
        <div class="container w-150">
            <div class="row flex-md-nowrap gap-2">
                <div class="col-12 col-md-6 customer-form">
                    <h2 class="border_btm pb-2">Dati di spedizione</h2>
                    <form @submit.prevent="submitForm" class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-bold">Nome</label>
                            <input type="text" v-model="customer.name" class="form-control" id="name" placeholder="Mario">
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label fw-bold">Cognome</label>
                            <input type="text" v-model="customer.last_name" class="form-control" id="last_name" placeholder="Rossi">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" v-model="customer.email" class="form-control" id="email" placeholder="mario.rossi@deliveboo.it">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label fw-bold">Indirizzo</label>
                            <input type="text" v-model="customer.address" class="form-control" id="address"
                                placeholder="Viale Cappuccini 87">
                        </div>
                        <div class="col-12">
                            <label for="phone_number" class="form-label fw-bold">Numero di telefono</label>
                            <input type="text" v-model="customer.phone_number" class="form-control" id="phone_number"
                                placeholder="320 6745938">
                        </div>


                        <div class="col-12">
                            <!-- Button trigger modal -->
                            <button @click="sendOrder()" type="submit" class="btn btn-light btn-form fw-bold" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Procedi al pagamento
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-12 col-md-6 summary">
                    <h2 class="border_btm pb-2">Riepilogo Ordine</h2>
                    <div class="summary_list_container">
                        <ul class="border_btm summary_list" v-for="c in cart">
                            <li>{{ c.name }}</li>
                            <li>{{ c.price }} €</li>
                            <li>x{{ c.quantity }}</li>
                        </ul>
                    </div>
                    <h4 class="border_top pt-2">Totale: {{ this.currentTotal }}</h4>
                </div>
            </div>

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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button button--small button--gray"
                                data-bs-dismiss="modal">Chiudi</button>
                            <!-- Rimuovi l'attributo data-bs-dismiss dal pulsante Paga -->
                            <button id="submit-button" class="button button--small button--green">
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
                'name': '',
                'last_name': '',
                'email': '',
                'address': '',
                'phone_number': '',
            },
            cart: [],
            currentOrderId: 0,
            currentTotal: 0,
            token: '',
            isLoading: false
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
                                            // Mostra il loader
                                            self.isLoading = true;
                                            // Nasconde il loader dopo 1.5 sec
                                            setTimeout(() => {
                                                setTimeout(() => {
                                                    self.isLoading = false;
                                                }, 2500);
                                                // Esegui il redirect dopo 2 secondi
                                                self.$router.push({ name: 'home' })
                                                    .then(() => {
                                                        // Dopo il redirect, esegui il reload della pagina
                                                        window.location.reload();
                                                    });
                                            }, 3000);
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
        const priceData = localStorage.getItem('price')
        if (cartData) {
            this.cart = JSON.parse(cartData);
            console.log(this.cart);
        }
        if (priceData){
            this.currentTotal = JSON.parse(priceData);
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
@import url(../../../style/partials/_variables.scss);
.bg-img {
    width: 100%;
    height: 100%;
    background-image: url(../../../public/wave-haikei-2.svg);
    top: 0;
    position: absolute;
    z-index: -10;
}

.w-150 {
    margin-top: 150px;
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

.summary_list{
    display: flex;
    margin: 0;
    padding: 15px 0px;
    justify-content: space-between;
    font-weight: 600;
}

.summary_list_container{
    flex-grow: 1;
    overflow: hidden;
}

.customer-form{
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

.btn-form{
    background-color: #01ccbc;
    border: none;
    &:hover{
        background-color: #05ddcb;
    }
}

.border_btm{
    border-bottom: 0.5px solid rgba(150, 150, 150, 0.5);
}

.border_top{
    border-top: 0.5px solid rgba(150, 150, 150, 0.5);
}

/* LOADER */

.modal-content {
    background: rgba(61, 254, 214, 0.4);
    backdrop-filter: blur(30px);
    border: 1px solid rgba(61, 254, 214, 0.25);
    position: relative;

    .modal-header {
        border: none;
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
    background: #FFD700;
    color: #DAA520;
    border: 4px double;
    box-sizing: border-box;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, .1);
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
}</style>