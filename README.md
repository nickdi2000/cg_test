# Installation
php artisan migrate --seed<br/>
This will create all databases, and insert test data based on the JSON  provided.<br/>
php artisan storage:link </br> (so images can be sourced locally)

# nicks development process
<h2>Backend</h2>
<i>Note: I used a starter vue/laravel framework that i've used several times.  Its very barebones and includes authentication with a single landing page. Just an FYI in case you come across some other files. </i> <br/>
<ul>
	<li>I started with the models.  We needed a photographer table, and an "albums" table which is a one-to-many relationship. I also made sure to include a foreign-key cascading delete constraint, so that if the photographer is deleted, so are his albums.  In a real-world example, you'd probably need much more like gallery, images, user, etc...but I dont think we needed that for this example</li>
	<li>I created the migrations for the two tables.  I also created a DB seeder based on the file you provided so that the records could be directly imported in from the JSON</li>
	<li>Notice there are two routes in the API: photographer and albums.  Since we didn't need to create any custom API's, I used a "resource" for both -- which auto generates our classic RESTful routes for us</li>
	<li>There are 2 controllers for these routes. Since we the scope of this project doesn't seem to require updating, I only have the one index function for each, which returns all records.  </li>
	<li>
</ul>

<h2>Frontend</h2>
	<ul>
		<li>There probably could have been more dynamic ways to produce the front end, but I went with BootstrapVue since this is a small project and I'm comfortable coding it quickly.</li>
		<li>The main page is "photographer". Which is where we are directed to by default.  this page grabs the photographer data asynchronously (via axios) and displays it in the header.  This would act as the parent route which sends the photographer props down to the sub component, which in this case is just the one: the gallery. </li>
		<li>The gallery component is a child route of the photographer (I figured in most cases there might be other sub components we would want to display in the space of this photographer) </li>
		<li>The gallery is using the photographer prop to grab the photographer.id, where it will request the "albums" data on the mounted hook.</li>
	</ul>
</br>
In Summary:  Good times.  I probably would have done a few things less static, such as the in-line styling.  But I figured for the sake of this project, that wasn't of importance.  Let me know if I should add anything else.
