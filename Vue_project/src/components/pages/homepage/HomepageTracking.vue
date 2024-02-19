<template>
    <div class="container">
        <div class="section">
            <div class="col-md-4 section_content">
                <h2>Segui gli ordini passo passo</h2>
                <p>I piatti e i prodotti che ami, consegnati in pochissimo tempo. Vedrai quando il rider ha ritirato l'ordine, che potrai seguire passo passo, e riceverai una notifica quando sarà quasi da te.</p>
                <div class="content-store">
                    <img src="https://consumer-component-library.roocdn.com/27.1.19/static/images/app-store-badges-it.svg" alt="">
                </div>
            </div>
            <div class="col-md-8 section_image">
                <img src="https://img2.storyblok.com/filters:format(webp)/f/62776/x/ca59b51c51/map-min.svg" alt="">
                <img class="notification" src="https://img2.storyblok.com/filters:format(webp)/f/62776/731x276/e6a58efba4/notification-itit.png" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@use "../../../../style/partials/variables" as *;
.section{
    margin: 64px 32px;
    display: flex;
    flex-direction: row;
    border-radius: 20px;
    background-color: white;
    overflow: hidden;
    color: $text-gray;
}

@media (max-width: 767.98px) { 
        .section{
            flex-direction: column;
            display: flex;
    }
    }

.content-store{
    display: flex;
    flex-direction: row;
    gap: 10px;
    img{
        width: 300px;
    }

    @media (max-width: 991.98px) { 
        img{
            width: 200px;
        }
    }
}

@media (max-width: 767.98px) { 
    .content-store{
        display: flex;
        flex-direction: row;
        gap: 10px;
        justify-content: center;
    }
}

.section_content{
    padding-top: 24px;
    margin: 8px 32px;
    h2{
        font-weight: bolder !important;
        font-size: 42px !important;
    }

    p{
        font-size: 18px;
        margin-bottom: 40px;
    }

    @media (max-width: 767.98px) { 
        h2{
        font-weight: bolder !important;
        font-size: 30px !important;
    }
        
        p{
            font-size: 18px;
            margin-bottom: 20px;
        }
    }
}

.section_image{
    display: flex;
    position: relative;
    z-index: 1;
    overflow: hidden;
    justify-content: center;
    align-self: auto;
}

.notification{
    position: absolute;
    width: 70%;
    max-width: 400px;
    margin-top: 10px;
    right: 65px;
}
</style>