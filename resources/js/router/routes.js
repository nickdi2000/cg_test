function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
	{ path: '/', redirect: '/photographer/' },
	{ path: '/photographer', redirect: '/photographer/1/albums' },// hard code our pal Nick Reynolds for now
{
		path: '/photographer/:id',
		component: page('public/home.vue'),
		children: [
			{ path: '', redirect: 'albums'}, //lets send the user to the gallery as a default, and also because there is no where else to go, because this is for an interview at CG
			{ path: 'albums', name: 'photographer.albums', component: page('public/albums.vue')},
		]
	},

  { path: '*', component: page('errors/404.vue') }
]
