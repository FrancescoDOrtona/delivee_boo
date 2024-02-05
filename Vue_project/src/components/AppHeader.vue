<template>
    <header>
        <div class="header">
            <div class="header-logo">
                <img src="../../public/logo-no-bg.png" alt="">
            </div>
            <div class="header-buttons">
                    <router-link :to="{name:'menu'}">menu</router-link>
                    <a class="buttons_icon btn btn-light" href="http://127.0.0.1:8000/login">
                        <span class="color-brand">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </span>
                        <span>Accedi</span>
                    </a>
                    <a class="buttons_icon btn btn-light" href="http://127.0.0.1:8000/register">
                        <span class="color-brand">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <span>Registrati</span>
                    </a>
            </div>
        </div>
    </header>
    
    
</template>

<script>

</script>

<style lang="scss" scoped>
@import "../../style/partials/variables";

// Utility classes
.color-brand{
    color: $main-brand-color;
}

.buttons_icon{
    display: flex;
    gap: 10px;
    align-items: center;
}




header{
    display: flex;
    flex-direction: column;
    position:absolute;
    right: 0;
    left: 0;
    z-index: 999;
}
.header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 60px;
}

.header-logo{
    img{
        width: 70px;
    }
}

.header-buttons{
    display: flex;
    gap: 20px;
}
</style>