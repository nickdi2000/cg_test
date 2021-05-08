<template>
		<div class="row">
			<template v-if="albums" v-for="al in albums">
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
        <button class="btn btn-sm"><fa icon="heart" class="like" /></button>
				<span class="updatedAt">{{ al.updated_at | moment("YYYY-MM-DD")}} </span>
			</div>
    </v-card-actions>

  </v-card>
						<!--
					  	<b-card
						    :title="al.title"
						    :img-src="'/storage/' + al.img"
						    img-alt="Image"
						    img-top
						    tag="article"
						    style="max-width: 20rem;"
						    class="mb-4"
						  >
							{{al.description}}
							<div class="cardfooter">
								<button class="btn btn-sm"><fa icon="heart" class="like" /></button>
								<span class="updatedAt"> {{ al.updated_at | moment("YYYY-MM-DD")}} </span>
							</div>

						</b-card>
					-->

					</div>
				</template>
			</div>
</template>

<script>
export default {
	props: ['albums'],
}
</script>

<style scoped>
	.albums{
		display:flex;
		flex-direction: row;
		flex-wrap: wrap;
  	justify-content: space-between;
	}

	.albums < div {
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
