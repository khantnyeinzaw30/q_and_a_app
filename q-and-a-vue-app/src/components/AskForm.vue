<template>
  <div class="col-lg-8 offset-lg-2">
    <div class="card shadow-sm">
      <div class="card-body">
        <form>
          <div class="mb-3">
            <textarea
              class="form-control"
              v-model="question"
              cols="30"
              rows="10"
              placeholder="Ask Something..."
            ></textarea>
          </div>
          <div>
            <input
              type="submit"
              value="Submit"
              class="btn btn-success w-25 float-end"
            />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AskForm",
  data() {
    return {
      question: "",
    };
  },
};
</script>
