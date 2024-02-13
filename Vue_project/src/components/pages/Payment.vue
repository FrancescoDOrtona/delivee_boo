<script>
import axios from 'axios';

export default {
  data() {
    return {};
  },
  components: {},
};
</script>

<template>
  <h1>Pagina pagamento</h1>
  <div>
    <v-braintree
      :authorization="xxxxxxxxxxxxxxxxx"
      locale="it_IT"
      @success="onSuccess"
      @error="onError"
    >
    </v-braintree>
  </div>
  <div id="dropin-container"></div>
</template>

<style lang="scss" scoped></style>
