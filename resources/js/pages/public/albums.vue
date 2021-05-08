<template>
	<div>
	<card>
		<v-btn
		 color="dark"
		 @click="toggle"
	 >
		 Toggle View
	 </v-btn>
	</card>

	<div style="margin-top:10px;">
			<component :is="viewStyle" :albums="albums"/>
		</div>
	</div>
</div>



</div>
</template>

<script>
import  gallery  from './components/gallery';
import carousel from './components/carousel';

export default {

	props: ['photographer'],
	components: { gallery, carousel },
  data () {
    return {
			albums: [],
			viewStyle: "gallery"
		}
  },
	methods: {
		getPhotos(){
			console.log('photos');
			axios.get('/api/albums')
				.then(res => {
						console.log(res);
						this.albums = res.data;
				});
		},
		toggle(){
			this.viewStyle = (this.viewStyle == 'carousel' ? 'gallery' : 'carousel');
		}
	},
	mounted(){
		this.getPhotos();
	}
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

	.like{
		color: red;
	}

	.updatedAt{
		float:right;
		color: gray;
	}
</style>
