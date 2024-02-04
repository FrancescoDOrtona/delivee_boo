<template>
    <div class="jumbotron">
        <div class="left-bg"></div>
        <div class="right-bg"></div>
        <div class="container container-custom py-5 jumbotron_content">
            <div class="jumbotron_content-text">
                <h1 class="display-5 fw-bold">I piatti dei ristoranti che ami e la spesa, a domicilio</h1>
                <p class="col-md-8 fs-4">
                    Cerca tra centinaia di ristoranti nella tua zona, scegli il tuo piatto preferito e ricevilo direttamente a casa con il nostro servizio di consegna a domicilio.
                </p>
            </div>
            <div class="search">
                <div class="input-label">
                    <label for="search">Cerca un ristorante nella tua zona</label>
                </div>
                <div class="search_container">
                    <input class="search_input" type="text" name="search" placeholder="Inserisci il nome del ristorante">
                    <span class="input_icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" role="presentation" focusable="false"><path fill="#01CCBC" d="M2 11.8214L21 3L12.1786 22L10.1429 13.8571L2 11.8214ZM11.7882 12.2118L12.7455 16.0408L16.8936 7.10644L7.95923 11.2545L11.7882 12.2118Z"></path></svg>
                    </span>
                    <span class="search_button">
                        <button>Cerca</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>

</script>

<style lang="scss" scoped>
@import "../../style/partials/variables";
@import "../../style/partials/mixins";

.jumbotron{
    position: relative;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    height: 650px;
    background-color: #000;
}


.left-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 45%;
    height: 100%;
    background: linear-gradient(90deg,#000c,#0000 33.83%);
    transform: matrix(-1,0,0,1,0,0);
    z-index: 1;
    background-size: cover;
    background-image: url('https://img2.storyblok.com/filters:format(webp)/f/62776/860x642/4e0f98735d/grocery-bag.jpg');
}

.right-bg {
    position: absolute;
    top: 0;
    right: 0;
    width: 45%;
    height: 100%;
    background: linear-gradient(90deg,#000c,#0000 33.83%);
    z-index: 1;
    background-size: cover;
    background-image: url('https://img2.storyblok.com/filters:format(webp)/f/62776/860x642/eaf9ed1e62/burger.jpg');
}

.container-sm {
    z-index: 1;
}

.jumbotron_content{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 2;
    position: relative;
}

.jumbotron_content-text{
   display: flex;
   flex-direction: column;
   align-items: center;
   h1{
    text-align: center;
   }
   p{
    margin: 50px 0px;
   } 
}

.search{
    display: flex;
    flex-direction: column;
    gap: 20px;
    position: relative;
    width: 664px;
    margin: auto;
    padding: 0 32px;
}

.input-label{
    align-self: center;
}
.search_input{
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 2px 6px rgba(0,0,0,.08);
    border-radius: 100px;
    padding-left: 48px;
    height: 64px;
    margin: 0;
    width: 100%;
}

.search_input:focus{
    transition-timing-function: ease-out;
    outline: none;
    border-color: transparent;
    box-shadow: 0 0 0 2px #2e3333, 0 0 0 4px #fff;
}

.input_icon{
    right: auto;
    left: 4px;
    top: 8px;
    appearance: none;
    background: none;
    border: none;
    position: absolute;
    padding: 4px;
    margin: 8px;
    cursor: pointer;
}
.search_container{
    display: flex;
    position: relative;
    flex: 1;
}

.search_button{
    position: absolute;
    right: 4px;
    top: 4px;
    button{
        border: none;
        border-radius: 100px;
        padding: 16px 40px;
        min-height: 56px;
        color: #fff;
        background: #00ccbc;
    }
}
</style>