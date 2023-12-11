import {
  createWebHashHistory,
  createRouter
} from "vue-router";


let routes = [
  { path: '/', component: import('../pages/chat/Chat.vue') },
  { path: '/login', component: import('../pages/login/LoginPage.vue') },
  { path: '/register', component: import('../pages/register/RegisterPage.vue') },
  { path: '/chat/', component: import('../pages/chat/Chat.vue') },
  { path: '/chat/:user_receive_id', component: import('../pages/chat/Chat.vue') },
  {
    path: '/admin', component: import('../layouts/MainLayout.vue'), children: [
      { path: 'usuario', component: import('../components/tables/User/UserTable.vue') }
    ]
  },
  {
    path: '/usuario', component: import('../layouts/MainLayout.vue'), children: [
      { path: '/usuario/insert', component: import('../pages/usuario/UsuarioEdit.vue') },
      { path: '/usuario/update/:id', component: import('../pages/usuario/UsuarioEdit.vue') },
      { path: '/usuario/view/:id', component: import('../pages/usuario/UsuarioEdit.vue') },
    ]
  }
]

export const router = createRouter({
  history: createWebHashHistory(),
  routes,
})
