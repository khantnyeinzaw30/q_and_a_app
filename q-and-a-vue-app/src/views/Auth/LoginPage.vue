<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header">
            <h3 class="text-success text-capitalize">Login Here</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="row mb-3">
                <label class="col-form-label col-sm-2">Email</label>
                <div class="col-sm-10">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="example@gmail.com"
                    v-model="userInfo.email"
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

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "LoginPage",
  data() {
    return {
      userInfo: {
        email: "",
        password: "",
      },
    };
  },
});
</script>
