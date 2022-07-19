<template>
  <v-footer padless app inset absolute color="transparent" class="mt-6">
    <v-card class="flex" color="transparent" flat>
      <v-card-text class="py-2 text-center">
        <strong>© 2019 - {{ new Date().getFullYear() }} Vijesh Datt Photography. <br v-if="$vuetify.breakpoint.smAndDown"> All rights reserved.</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {

}
</script>

<style>
</style>
