<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header">
            <h3 class="text-success text-capitalize">Login Here</h3>
          </div>
          <div class="card-body">
            <div class="alert alert-danger" v-if="!isAuthenticated">
              <small>The credentials do not match!</small>
            </div>
            <form @submit.prevent="login">
              <div class="row mb-3">
                <label class="col-form-label col-sm-2">Email</label>
                <div class="col-sm-10">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="example@gmail.com"
                    v-model="userInfo.email"
                    required
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-form-label col-sm-2">Password</label>
                <div class="col-sm-10">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="......."
                    v-model="userInfo.password"
                    required
                  />
                </div>
              </div>
              <div class="row justify-content-center">
                <button
                  class="btn btn-outline-success"
                  style="width: 20%"
                  type="submit"
                >
                  Sign In
                </button>
              </div>
            </form>
          </div>
          <div class="card-footer">
            <strong
              >Dont have an account?
              <router-link
                to="/register"
                class="text-success"
                style="text-decoration: none"
              >
                Register
              </router-link>
              here.</strong
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import storeToken from "@/assets/storeToken";
export default {
  name: "LoginPage",
  data() {
    return {
      userInfo: {
        email: "",
        password: "",
      },
      isAuthenticated: true,
    };
  },
  methods: {
    login() {
      this.axios
        .post("http://127.0.0.1:8000/api/login", this.userInfo)
        .then((response) => {
          storeToken(response);
          if (response.data.token) {
            this.$router.push({ name: "home" });
          } else {
            this.isAuthenticated = false;
          }
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>
