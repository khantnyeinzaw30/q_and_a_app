<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="text-success text-capitalize">top questions</h3>
          </div>
          <div class="card-body">
            <table class="table table-success table-striped table-hover">
              ...
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-8 offset-lg-2">
        <h3 class="text-center text-capitalize text-success">
          Ask a question here
        </h3>
        <form>
          <div class="row">
            <div class="col-sm-10">
              <textarea
                class="form-control"
                cols="30"
                rows="10"
                placeholder="Ask Something..."
              ></textarea>
            </div>
            <div class="col-sm-2">
              <input
                type="submit"
                value="Submit"
                class="btn btn-success w-100"
              />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "HomeView",
});
</script>
