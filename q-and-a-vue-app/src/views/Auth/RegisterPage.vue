<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header">
            <h3 class="text-success text-capitalize">Regsiter Here</h3>
          </div>
          <div class="card-body">
            <form @submit.prevent="register">
              <div class="row mb-3">
                <label class="col-form-label col-sm-2">User Name</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="eg. John Doe"
                    v-model="userInfo.name"
                    required
                  />
                </div>
              </div>
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
                    placeholder="......"
                    v-model="userInfo.password"
                    required
                  />
                </div>
                <div
                  class="alert alert-danger col mt-3 mx-3"
                  v-if="!isPasswordStrong"
                >
                  <small>Password is not strong enough!</small>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-form-label col-sm-2"
                  >Password Confirmation</label
                >
                <div class="col-sm-10">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="......"
                    v-model="userInfo.passwordConfirmation"
                    required
                  />
                </div>
                <div
                  class="alert alert-danger col mt-3 mx-3"
                  v-if="!isPasswordConfirmed"
                >
                  <small>Please confirm password!</small>
                </div>
              </div>
              <div class="row justify-content-center mb-3">
                <button
                  class="btn btn-outline-success"
                  style="width: 20%"
                  type="submit"
                >
                  Sign Up
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import storeToken from "../../assets/storeToken.js";

export default defineComponent({
  name: "RegisterPage",
  data() {
    return {
      userInfo: {
        name: "",
        email: "",
        password: "",
        passwordConfirmation: "",
      },
      isPasswordConfirmed: true,
      isPasswordStrong: true,
    };
  },
  methods: {
    register() {
      this.validateUserInfo();
      if (this.isPasswordConfirmed && this.isPasswordStrong) {
        this.axios
          .post("http://127.0.0.1:8000/api/register", this.userInfo)
          .then((response) => {
            storeToken(response);
            if (response.data.status == "ok") {
              this.$router.push({ name: "home" });
            }
            if (response.data.message) {
              this.isPasswordStrong = false;
            }
          })
          .catch((error) => console.log(error));
      }
    },
    // user info validation
    validateUserInfo() {
      this.isPasswordConfirmed =
        this.userInfo.password === this.userInfo.passwordConfirmation
          ? true
          : false;
      this.isPasswordStrong = this.userInfo.password.length >= 8 ? true : false;
      // console.log(this.isPasswordConfirmed);
      // console.log(this.isPasswordStrong);
    },
  },
});
</script>
