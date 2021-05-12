function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
	{ path: '/', redirect: '/photographers/' },
	{ path: '/photographers', redirect: '/photographers/1/albums' },// hard code our pal Nick Reynolds for now
	{ path: '/photographers/profile/:id/edit', name: 'photographers.profileEdit', component: page('public/components/edit.vue')},
{
		path: '/photographers/:id',
		component: page('public/home.vue'),
		children: [
			{ path: '', redirect: 'albums'}, //lets send the user to the gallery as a default, and also because there is no where else to go, because this is for an interview at CG
			{ path: 'albums', name: 'photographers.albums', component: page('public/albums.vue')},

		]
	},

  { path: '*', component: page('errors/404.vue') }
]
