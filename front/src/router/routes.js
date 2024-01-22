const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
      { path: '/dogs', component: () => import('pages/DogsPage.vue') },
      { path: '/new', component: () => import('pages/DogCreate.vue') },
      { path: '/breeds', component: () => import('pages/BreedsPage.vue') },
      { path: '/dogs/:id', component: () => import('pages/DogPage.vue') },
      { path: '/info', component: () => import('pages/InfoPage.vue') },
    ]
  },
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
];

export default routes;
