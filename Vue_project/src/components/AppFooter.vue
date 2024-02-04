<template>
    <footer>
        <div class="container">
            <div class="grid">
                <div class="col-3">1</div>
                <div class="col-3">2</div>
                <div class="col-3">3</div>
                <div class="col-3">4</div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@import "../../style/partials/variables";

footer{
    padding: 20px;
    color: white;
    background-color: $dark-gray-footer;
}

.grid{
    display: grid;
    grid-template-columns: repeat(4 , 1fr)
}
</style>