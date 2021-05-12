<template>
	<v-container v-if="!photographer">
		Loading..
	</v-container>

	<v-container v-else class="grey lighten-5" elevation="3">
    <v-row no-gutters>
    <v-col>
				<v-card class="pa-2" outlined height="100%" >
					<img :src="'/storage/' + photographer.profile_picture" class="avatar-pic" />
				</v-card>
		</v-col>
		  <v-col cols="8" md="6">
					<v-card class="pa-2 align-end mb-6" outlined height="100%">
						<v-card-text class="vbottom">
							<h4>{{ photographer.name }}</h4>
							<strong>Bio</strong>
							<p>{{ photographer.bio }}</p>
						</v-card-text>
					</v-card>
			</v-col>

		    <v-col>
		        <v-card class="pa-2 align-end mb-6 d-flex flex-column" outlined  height="100%">
							<v-card-text class="vbottom">
										<strong>Phone </strong>
										<p class="text-danger">{{photographer.phone}}</p>
										<strong>Email</strong>
										<p class="text-danger">{{photographer.email}}</p>
							</v-card-text>
							 <v-card-actions>
								 <router-link :to="photographer.editPath" tag="v-btn" color="info" small outlined>
									 <fa icon="edit" /> &nbsp; Edit
								 </router-link>
							 </v-card-actions>
		        </v-card>
	      </v-col>
    </v-row>



		<div>
				<router-view :photographer="photographer" />
		</div>
	</div>

</v-container>

</template>

<script>
export default {


  data () {
    return {
			photographer: [],
		}
  },
	methods: {
		getData(){
			axios.get('/api/photographers/' + this.$route.params.id)
				.then(res => {
						this.photographer = res.data.data;
				});
		}
	},
	mounted(){
		this.getData();
	}
}
</script>

<style scoped>
	.avatar-pic {
		width: 100%;
		height: auto;
		border-radius: 50%;
	}

	.header{
		font-size:0.8em;
	}

	@media only screen and (min-width : 960px) {
    .vbottom{
			position: absolute;
			bottom: 0;
		}
}


</style>
