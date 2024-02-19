<template>
    <div class="section-sales">
        <div class="sales_title container container-custom-2">
            <div class="title_bg-left"></div>
            <div class="title">
                <h1>Menù in offerta: sconti fino al 25%</h1>
            </div>
            <div class="title_bg-right"></div>
        </div>
        <div class="sales_content container container-custom">
            <p>Perfetti per dare più gusto alla tua settimana, ordinare i piatti più amati da tutta la famiglia e fare una
                pausa dai fornelli.</p>
            <small>Si applicano spese di consegna e di servizio. Offerta soggetta a disponibilità, solo per ristoranti
                aderenti all'iniziativa. Si applicano termini e condizioni, consultabili qui. <span
                    class="text-decoration-underline">Termini e condizioni qui.</span>
            </small>
        </div>
        <div class="bottom-bg"></div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@use "../../../../style/partials/mixins" as *;

.section-sales {
    background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQ0MCIgaGVpZ2h0PSIzMjAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgY2xpcC1wYXRoPSJ1cmwoI2EpIj48cGF0aCBmaWxsPSJ1cmwoI2IpIiBkPSJNMCAwaDE0NDB2MzIwSDB6Ii8+PGcgZmlsdGVyPSJ1cmwoI2MpIj48cGF0aCBkPSJNNzIwIDYwYzM4MyAwIDk1MyAyNjAgOTUzIDI2MEgtMjMzUzMzNyA2MCA3MjAgNjBaIiBmaWxsPSJ1cmwoI2QpIiBmaWxsLW9wYWNpdHk9Ii4xNSIvPjwvZz48L2c+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJiIiB4MT0iMTQ0MCIgeTE9IjMyMCIgeDI9IjEwNTEuMjQiIHkyPSItMzk5Ljc2OSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiMwQ0IiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwMDdFODkiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iZCIgeDE9IjcyMCIgeTE9IjYwIiB4Mj0iNzIwIiB5Mj0iMzIwIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHN0b3Agc3RvcC1jb2xvcj0iI2ZmZiIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIuNDgiLz48L2xpbmVhckdyYWRpZW50PjxjbGlwUGF0aCBpZD0iYSI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTAgMGgxNDQwdjMyMEgweiIvPjwvY2xpcFBhdGg+PGZpbHRlciBpZD0iYyIgeD0iLTI2NSIgeT0iMjgiIHdpZHRoPSIxOTcwIiBoZWlnaHQ9IjMyNCIgZmlsdGVyVW5pdHM9InVzZXJTcGFjZU9uVXNlIiBjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnM9InNSR0IiPjxmZUZsb29kIGZsb29kLW9wYWNpdHk9IjAiIHJlc3VsdD0iQmFja2dyb3VuZEltYWdlRml4Ii8+PGZlQmxlbmQgaW49IlNvdXJjZUdyYXBoaWMiIGluMj0iQmFja2dyb3VuZEltYWdlRml4IiByZXN1bHQ9InNoYXBlIi8+PGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iMTYiIHJlc3VsdD0iZWZmZWN0MV9mb3JlZ3JvdW5kQmx1cl8xMDY4XzExNTI1MCIvPjwvZmlsdGVyPjwvZGVmcz48L3N2Zz4=);
    background-size: cover;
    background-position: 50%;
    opacity: 1;
    position: relative;
    text-align: center;   
    letter-spacing: 0;
    overflow: hidden;
    color: #fff;
    padding-top: 80px;
    
}

.sales_title{
    padding: 0;
    display: flex;
    justify-content: center;    
}

.title{
    h1{
        font-size: 60px;
        font-weight: bolder;
        max-width: 726px;
        min-width: 159px;
    }
}

.title_bg-left{
    background-image: url(https://cwa.roocdn.com/_next/static/media/merch-sparkleleft@2x.90d6981a.svg);
    background-size: contain;
    margin-right: 24px;
    width: 72px;
    height: 84px;
}

.title_bg-right{
    margin-left: 24px;
    background-image: url(https://cwa.roocdn.com/_next/static/media/merch-sparkleright@2x.75af3f8c.svg);
    background-size: contain;
    width: 72px;
    height: 84px;
}

.sales_content{
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    text-shadow: 0 2px 6px 0 #0000001a;
    p{
        font-size: 24px;
    }
    small{
        padding: 0px 140px;
    }

    @media (max-width: 575.98px) {
        small{
        padding: 0px 0px;
        font-size: 10px;
    }
    }
}

.bottom-bg{
    background-image: url(https://cwa.roocdn.com/_next/static/media/merch-itemrow@2x.09d506d7.svg);
    margin-top: 32px;
    overflow: hidden;
    user-select: none;
    align-content: center;
    background-position: 50%;
    width: 100%;
    height: 84px
}
</style>