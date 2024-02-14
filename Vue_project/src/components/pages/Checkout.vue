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
                        <button type="submit" @click="sendOrder()" class="btn btn-primary">Procedi al pagamento</button>
                    </div>
                </form>
                <!-- <router-link :to="{ name: Payment}">
                 pagamento 
                </router-link> -->
            </div>
            <div class="col-12 col-md-6">
               <ul v-for="c in cart">
                <li>{{ c.name }}</li>
                <li>{{ c.price }}</li>
                <li>{{ c.quantity }}</li>
               </ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {

    data() {
        return {
            BASE_URL: 'http://127.0.0.1:8000/api',
            customer: {
                'name': '',
                'last_name': '',
                'email': '',
                'address': '',
                'phone_number': '',
            },
            cart: [],
            
        }
    },
    methods: {
        submitForm() {
            // Invia i dati del cliente al backend o esegui altre operazioni
            console.log('Dati del modulo:', this.customer);
            this.customer.name = '';
            this.customer.last_name = '';
            this.customer.email = '';
            this.customer.address = '';
            this.customer.phone_number = '';

        },
        sendOrder() {
            axios.post(`${this.BASE_URL}/orders`, { 
                customer: this.customer,
                cart: this.cart
             })
                .then(res => {
                    console.log(res.data);
                    
                }).catch(error => {
                    console.log(error);
                });
        }
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

    }
}

</script>

<style lang="scss" scoped>
.w-150 {
    margin-top: 150px;
}
</style>