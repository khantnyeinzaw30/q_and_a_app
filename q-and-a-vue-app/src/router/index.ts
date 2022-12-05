import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import Home from "../views/HomePage.vue";
import Answers from "../views/AnswersPage.vue";
import Login from "../views/Auth/LoginPage.vue";
import Register from "../views/Auth/RegisterPage.vue";
import NotFound from "../views/NotFound.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "home",
    component: Home,
    beforeEnter: (to, from, next) => {
      if (localStorage.getItem("userToken")) next();
      else next({ name: "home" });
    },
  },
  {
    path: "/answers",
    name: "answers",
    component: Answers,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
    beforeEnter: (to, from, next) => {
      if (!localStorage.getItem("userToken")) next();
      else next({ name: "home" });
    },
  },
  {
    path: "/register",
    name: "register",
    component: Register,
    beforeEnter: (to, from, next) => {
      if (!localStorage.getItem("userToken")) next();
      else next({ name: "home" });
    },
  },
  {
    path: "/:catchAll(.*)",
    // path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
