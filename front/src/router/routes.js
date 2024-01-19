
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
      { path: 'dogs', component: () => import('pages/DogsPage.vue') },
      { path: 'dogs/new', component: () => import('pages/DogPage.vue') },
      { path: 'breeds', component: () => import('pages/BreedsPage.vue') },
      { path: 'dogs/:id', component: () => import('pages/DogDetailPage.vue') }
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
