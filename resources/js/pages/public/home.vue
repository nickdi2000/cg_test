<template>
	<div>
		<card>
			<div class="row">
				<div class="col-3">
					<div>
							<img :src="'/storage/' + photographer.profile_picture" class="avatar-pic" />
						</div>
				</div>

				<div class="col-6 header">
						<div>
						<h2>{{ photographer.name }}</h2>
						<strong>Bio</strong>
						<p>{{ photographer.bio }}</p>
					</div>
				</div>

				<div class="col-3 header">
					<div>
						<strong>Phone </strong>
						<p class="text-danger">{{photographer.phone}}</p>
						<strong>Email</strong>
						<p class="text-danger">{{photographer.email}}</p>
					</div>

				</div>


			</div>

		</card>

		<div>
				<router-view :photographer="photographer" />
		</div>
	</div>


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
			axios.get('/api/photographer/' + this.$route.params.id)
				.then(res => {
						this.photographer = res.data;
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
	.header > div {
		position: absolute;
		bottom: 0;
	}
</style>
