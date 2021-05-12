<template>
  <card class="text-center">
    <h3 class="mb-4">
      404 - Page Not Found
    </h3>

    <div class="links">
      <router-link :to="{ name: 'welcome' }">
        Home Page
      </router-link>
    </div>
  </card>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
