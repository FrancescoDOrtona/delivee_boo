<template>
  <header class="container-fluid">
    <div class="header">
      <div class="header-logo ">
        <router-link :to="{ name: 'home' }">
          <img class="logo-1" src="../../logo-no-bg.png" alt="" />
          <img class="logo-2" src="../../logo-teal-titolo.svg" alt="" />
        </router-link>
      </div>

      <!-- DROPDOWN HAMBURGER MENU -->
      <div class="dropdown d-lg-none">
        <button class="hamburger_menu btn btn-light fs-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-burger"></i>
        </button>
        <ul class="dropdown-menu">
          <li>
            <a class="buttons_icon btn btn-light" href="http://127.0.0.1:8000/login">
              <span class="color-brand">
                <i class="fa-solid fa-right-to-bracket"></i>
              </span>
              <span>Accedi</span>
            </a>
          </li>
          <li>
            <a class="buttons_icon btn btn-light" href="http://127.0.0.1:8000/register">
              <span class="color-brand">
                <i class="fa-regular fa-user"></i>
              </span>
              <span>Registrati</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="header-buttons d-none d-lg-flex">
        <a class="buttons_icon btn btn-light" href="">
          <span class="color-brand">
            <i class="fa-solid fa-cart-shopping"></i>
          </span>
          <span class="d-none d-sm-none d-lg-block">{{ totalPrice }} €</span>
        </a>
        <a class="buttons_icon btn btn-light" href="http://127.0.0.1:8000/login">
          <span class="color-brand">
            <i class="fa-solid fa-right-to-bracket"></i>
          </span>
          <span class="d-none d-sm-none d-lg-block">Accedi</span>
        </a>
        <a class="buttons_icon btn btn-light" href="http://127.0.0.1:8000/register">
          <span class="color-brand">
            <i class="fa-regular fa-user"></i>
          </span>
          <span class="d-none d-sm-none d-lg-block">Registrati</span>
        </a>
      </div>
    </div>
  </header>
</template>

<script>
import { useLink } from 'vue-router';

export default {
  data() {
    return {
      totalPrice: 0,
    }
  },
  created(){
    const cartData = localStorage.getItem('price');
    if (cartData) {
      this.totalPrice = JSON.parse(cartData);
      // console.log(this.cart);
    }
  },
  methods:{
    
  },
  watch:{
    totalPrice: function (nuovoValore, valorePrecedente){
      console.log('La variabileDaOsservare è stata modificata:', nuovoValore);  
    }
  }
  }
</script>

<style lang="scss" scoped>
@import '../../style/partials/variables';

// Utility classes
.color-brand {
  color: $main-brand-color;
}

.buttons_icon {
  display: flex;
  gap: 10px;
  align-items: center;
  border: 1px solid lightgray;
}

header {
  display: flex;
  flex-direction: column;
  position: absolute;
  right: 0;
  left: 0;
  z-index: 10;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0px;

}

.header-logo {
  display: flex;
  flex-wrap: nowrap;

  .logo-1 {
    width: 70px;
  }

  .logo-2 {
    width: 140px;
  }
}

// Extra small devices (portrait phones, less than 576px)
@media (max-width: 575.98px) {
  .logo-1 {
    width: 70px;
  }

  .logo-2 {
    display: none;
  }

  .header {
    padding: 10px 0px;
  }
}

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {
  .logo-2 {
    display: none;
  }

  .header {
    padding: 10px 0px;
  }
}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) {
  .logo-2 {
    width: 140px;
  }
}

@media (min-width: 992px) and (max-width: 1499.98px) {}

.header-buttons {
  display: flex;
  gap: 20px;
}

.dropdown {

  button {
    color: $main-brand-color;
    border: 1px solid lightgray;
  }
}

.dropdown-menu {
  --bs-dropdown-min-width: 0
}
</style>
