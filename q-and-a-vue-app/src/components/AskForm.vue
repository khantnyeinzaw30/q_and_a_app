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
              @keyup.enter="askQuestion"
            ></textarea>
          </div>
          <div>
            <input
              type="button"
              value="Submit"
              @click="askQuestion"
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
      apiKey: "",
    };
  },
  methods: {
    askQuestion() {
      this.axios
        .post(
          "http://127.0.0.1:8000/api/add/question",
          {
            question: this.question,
          },
          {
            headers: {
              Authorization: "Bearer " + this.apiKey,
            },
          }
        )
        .then((response) => console.log(response.data))
        .catch((e) => console.log(e));
    },
  },
  mounted() {
    let user = JSON.parse(localStorage.getItem("userData"));
    if (user) {
      this.apiKey = user.token;
    }
  },
};
</script>
