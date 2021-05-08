<template>
	  <v-carousel>
    <v-carousel-item
      v-for="(al,i) in photos"
      :key="i"
      :src="'/storage/' + al.img"
			cycle
			show-arrows-on-hover
    ></v-carousel-item>
  </v-carousel>
</template>

<script>
  export default {
    props: ['photos'],
    name: 'carousel',
    data: () => ({
      model: 0,
      colors: [
        'primary',
        'secondary',
        'yellow darken-2',
        'red',
        'orange',
      ],
    }),
  }
</script>
