<template>
  <v-carousel
    show-arrows-on-hover
    cycle
    >
    <v-carousel-item
      v-for="(al, i) in albums"
      :key="al.id"
    >
      <v-sheet
        tile
      >
        <v-row
          align="center"
          justify="center"
        >
            <img :src="'/storage/' + al.img" />
        </v-row>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
  export default {
    props: ['albums'],
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
