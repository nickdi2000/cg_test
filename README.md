# Installation
php artisan migrate --seed<br/>
npm install</br>
This will create all databases, and insert test data based on the JSON  provided.<br/>
php artisan storage:link </br> (so images can be sourced locally)<br/>
After running these commands, you should be able to view and operate the entire application in one instance.

# nicks development process
<h2>Backend</h2>
<i>Note: I used a starter vue/laravel framework that i've used several times.  Its very barebones and includes authentication with a single landing page. Just an FYI in case you come across some other files. </i> <br/>
<ul>
	<li>I started with the models.  We needed a photographer, photos, and an "albums" table/model.  The photographer is the parent class/model which has a one to many (although one-to-one in this example) relationship to the albums, which has a one-to-many relationship to the photos. I also made sure to include a foreign-key cascading delete constraint, so that if the photographer is deleted, so are his albums (similar with albums->photos).  In a real-world example, you'd probably need much more like gallery, images, user, etc...but I dont think we needed that for this example</li>
	<li>I created the migrations for the 3 tables.  I also created a DB seeder based on the file you provided so that the records could be directly imported in from the JSON</li>
	<li>Notice there are two routes in the API: photographer and albums.  Since we didn't need to create any custom API's, I used a "resource" for both -- which auto generates our classic RESTful routes for us.  We also don't need anything specific for the "photos" just yet, since I am grabbing the album "with" the photos via belongsTo function created in the album model.  This makes it easy to grab the photos along with the album in any scenario.</li>
	<li>There are controllers for each of these routes. Since the scope of this project doesn't seem to require updating yet, I only have the one index function for each, which returns all records for the parent record..  </li>
	<li>
</ul>

<h2>Frontend</h2>
	<ul>
		<li>In general I am using a mix of the bootstrap grid system, so it will be responsive automatically.  Flexbox may have been better for a system that required it to be more dynamic.  I've also installed vuetify -- which I'm using for the carosel and some of the other small components like the buttons and the heart icons.</li>
		<li>The main page is "photographer". Which is where we are directed to by default (see routes).  this page grabs the photographer data asynchronously (via axios) and displays it in the header.  This would act as the parent route which sends the photographer props down to the sub router-view, which in this case is just the one: the album. </li>
		<li>The album component is a subcomponent of the photographer (I figured in most cases there might be other sub components we would want to display in the space of this photographer record) </li>
		<li>The gallery is using the photographer prop to grab the photographer.id, where it will request the "photos" data on the mounted hook. We can switch to the other component, carousel, which uses the exact samee data, but just displays it differently. </li>
		<li>The heart icon is using the "featured" boolean value.  On clicking this, it will toggle the color, since it is binded to the value.</li>
	</ul>
</br>
In Summary:  Good times.  I probably would have done a few things less static, such as the in-line styling.  But I figured for the sake of this project, that wasn't of importance.  Let me know if I should add anything else.
