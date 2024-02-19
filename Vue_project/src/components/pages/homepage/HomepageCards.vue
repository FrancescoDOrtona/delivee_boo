<template>
    <div class="container">
        <div class="card-section">
            <div class="card-1 card_sizes">
                <div class="card_layer"></div>
                <div class="card_content">
                    <h2>Diventa nostro partner</h2>
                <div class="card_text">Raggiungi più clienti con Deliveroo. Gestiamo noi la consegna, così tu puoi dedicarti a offrire i migliori piatti e prodotti.</div>
                <a href="https://restaurants.deliveroo.com/it-it/?utm-campaign=workwithus&amp;utm-medium=organic&amp;utm-source=landingpage" class="card_button" target="_blank" rel="noreferrer">Inizia ora<img alt="Button arrow" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxOCAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTExLjQgMC40OTU5OTlMOS44NCAyLjA1NkwxMy44IDUuOTkySDBWOC4wMDhIMTMuOEw5Ljg0IDExLjk0NEwxMS40IDEzLjUwNEwxOCA3TDExLjQgMC40OTU5OTlaIiBmaWxsPSIjMDBDQ0JDIi8+Cjwvc3ZnPgo=" class="card_icon"></a></div>
            </div>
            <div class="card-2 card_sizes">
                <div class="card_layer"></div>
                <div class="card_content">
                    <h2>Consegna con noi</h2>
                <div class="card_text">La libertà di consegnare dove e quando vuoi, con ottimi guadagni, convenzioni e sconti riservati a te.</div><a href="https://deliveroo.it/apply?utm-campaign=ridewithus_lower&amp;utm-medium=organic&amp;utm-source=landingpage" class="card_button" target="_blank" rel="noreferrer"><span>Inizia ora</span> <img alt="Button arrow" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxOCAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTExLjQgMC40OTU5OTlMOS44NCAyLjA1NkwxMy44IDUuOTkySDBWOC4wMDhIMTMuOEw5Ljg0IDExLjk0NEwxMS40IDEzLjUwNEwxOCA3TDExLjQgMC40OTU5OTlaIiBmaWxsPSIjMDBDQ0JDIi8+Cjwvc3ZnPgo=" class="card_icon"></a></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
.card-section{
    margin-top: 64px;
    display: flex;
    flex-direction: row;
    gap: 16px;
}

.card-1{
    background-image: url(https://www.adformandum.org/wp-content/uploads/2019/07/img-alberghiera.jpg);
    
}

.card_sizes{
    background-size: cover;
    height: 480px;
    max-width: 710px;
    width: 100%;
    background-color: #bac3c3;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
    color: #fff;
    box-shadow: 0 6px 20px 0 #0000003d;
}

.card-2{
    background-image: url(https://www.assocarenews.it/wp/wp-content/uploads/2019/04/deliveroo.jpg);
}

.card_layer{
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: linear-gradient(355.15deg,#2e3333 3.92%,#0000 96.1%);
    opacity: .5;
}

.card_content {
    margin-right: 128px;
}
.card_content {
    position: relative;
    z-index: 1;
    margin: 0 64px 24px 24px;
    text-shadow: 0 2px 2px #00000026;
}

    .card_button {
        display: block;
        color: #2e3333;
        background-color: #fff;
        text-decoration: none;
        border: 1px solid #00000014;
        box-sizing: border-box;
        border-radius: 4px;
        padding: 12px 24px;
        font-size: 16px;
        line-height: 24px;
        text-shadow: none;
        width: -webkit-fit-content;
        width: -moz-fit-content;
        width: fit-content;
        white-space: nowrap;
        margin-top: 16px;
        transition-property: box-shadow;
        transition-duration: .15s;
        transition-timing-function: ease-out;
}

.card_icon {
    margin-bottom: -1px;
    margin-left: 8px;
}

.card_text {
    font-size: 18px;
    line-height: 130%;
    
}
</style>