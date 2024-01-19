
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      
      { path: 'dogs', component: () => import('pages/DogsPage.vue') ,children:[
        
      ]},
      { path: 'dogs/new', component: () => import('pages/DogCreate.vue') },
      { path: 'breeds', component: () => import('pages/BreedsPage.vue') },
      { path: 'dogs/:id', component: () => import('pages/DogPage.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
