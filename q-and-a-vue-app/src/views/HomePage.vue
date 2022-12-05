<template>
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header">
            <h3 class="text-success text-capitalize">top questions</h3>
          </div>
          <div class="card-body">
            <table class="table table-success table-striped table-hover">
              ...
            </table>
          </div>
          <!-- Ask A question Button -->
          <div class="card-header">
            <button
              class="btn btn-success float-end"
              @click="isBeingAsked = !isBeingAsked"
            >
              add new <i class="fa-solid fa-circle-question"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- ask a question section here -->
    <div class="row" v-if="isBeingAsked">
      <AskForm />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AskForm from "../components/AskForm.vue";

export default defineComponent({
  name: "HomeView",
  components: { AskForm },
  data() {
    return {
      isBeingAsked: false,
    };
  },
});
</script>
