<template>
  <nav class="d-flex justify-content-center align-items-center gap-3">
    <router-link to="/">Home</router-link> |
    <router-link to="/questions/others">Questions</router-link> |
    <router-link to="/login">Login</router-link> |
    <button @click="logout" class="btn btn-danger">Logout</button>
  </nav>
  <router-view />
</template>

<script>
export default {
  methods: {
    logout() {
      localStorage.removeItem("userData");
      this.$router.push({ name: "login" });
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

nav {
  padding: 30px;
}

nav a,
button {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
