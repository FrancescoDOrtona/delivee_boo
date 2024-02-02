<script>
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'


export default {
  components: {
    AppHeader,
    AppFooter
  },
};
</script>

<template>
  <AppHeader />
  <div class="flex-grow-1">
    <router-view></router-view>
  </div>
  <AppFooter />
</template>

<style lang="scss">
@use "./style/general.scss";

#app{
  display: flex;
  flex-direction: column;
  height: 100vh;
}


</style>
