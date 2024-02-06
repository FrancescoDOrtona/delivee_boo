<template>
    <div class="types-section container">
        <div class="title">
            <h1>Types</h1>
        </div>
        <div class="types-section_badges">
            <div v-for="type in types" :key="types" class="badge">
                <img src="" alt="">
                <div>
                    <h3>{{ type.name }}</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@use '../../../../style/partials/variables' as *;

.types-section{
    padding:32px 64px;
}


</style>