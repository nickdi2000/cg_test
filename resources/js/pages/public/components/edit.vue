<template>
	<v-container class="grey lighten-5" elevation="3">
			 <v-card elevation="2" class="spacing-playground pa-6">
				 <h3>Edit Profile</h3>
				 <v-textarea label="bio" v-model="user.bio"/>
				 <v-text-field label="Phone" v-model="user.phone"/>
				 <v-text-field label="Email" v-model="user.email"/>
					 <v-card-actions>
						 	<v-btn color="success" @click="updateProfile()">Save</v-btn>
							<v-btn color="secondary" tag="v-btn" :to="user.indexPath">Back</v-btn>
					</v-card-actions>
			</v-card>

			<v-card elevation="2" class="spacing-playground pa-6">
				<i>CG: I've purposely left out front-end validation here so that we could see our responses from the server.
				<br/>
				Try submitting with a phone number longer than 10 digits, and/or a blank email.</i>
			</v-card>
	</v-container>
</template>

<script>
import Swal from 'sweetalert2'
import VueLodash from 'vue-lodash'
import lodash from 'lodash'

export default {


  data () {
    return {
			user: {},
		}
  },
	methods: {
		getData(){
			axios.get('/api/photographers/' + this.$route.params.id)
				.then(res => {
						this.user = res.data.data;
				});
		},
		updateProfile(){
			axios.put(this.user.updatePath, this.user)
				.then(res =>{
						this.handleResponse(res.data);
				}).catch(err =>{
						this.handleResponse(err.response.data);
					});
		},
		handleResponse(res){
				console.log(res);
				if(res.status == 'error'){
					let msgs = "";
					_.forEach(res.message, function(value, key){
						msgs += '<li>' + value + '<li/>';
					});
					res.message = msgs;
				}
				  Swal.fire({
			      icon: res.status,
			      title: res.status,
			      html: res.message,
			      cancelButtonText: 'cool stuff'
			    })

		}
	},
	mounted(){
		this.getData();
	}
}
</script>
