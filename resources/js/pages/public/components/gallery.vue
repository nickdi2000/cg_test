<template>
		<div class="row">
			<template v-if="photos" v-for="al in photos">
					<div class="col-md-4">
						<v-card
    class="mx-auto"
    max-width="344"
  >
    <v-img
      :src="'/storage/' + al.img"
      height="200px"
    ></v-img>

    <v-card-title>
      {{al.title}}
    </v-card-title>

    <v-card-subtitle>
     {{al.description}}
    </v-card-subtitle>

    <v-card-actions>
			<div class="cardfooter">
				<v-btn icon :color="getColor(al.featured)" @click="al.featured = !al.featured"><v-icon>mdi-heart</v-icon></v-btn>
				<span class="updatedAt">{{ al.updated_at | moment("YYYY-MM-DD")}} </span>
			</div>
    </v-card-actions>

  </v-card>
					</div>
				</template>
			</div>
</template>

<script>
export default {
	props: ['photos'],
	    data: () => ({
				color: "pink",
	    }),
	methods: {
		toggleFeature(al){
			al.featured = !al.featured;
		},
		getColor(val){
			return val ? "pink" : "black";
		}
	}
}
</script>

<style scoped>
	.photos{
		display:flex;
		flex-direction: row;
		flex-wrap: wrap;
  	justify-content: space-between;
	}

	.photos < div {
		width: 33%;
		position: relative;
	}

	.cardfooter{
		width:100%;
	}

	.like{
		color: red;
	}

	.updatedAt{
		float:right;
		color: gray;
		font-size: 0.8em;
	}
</style>
