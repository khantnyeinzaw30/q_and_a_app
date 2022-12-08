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
      userId: "",
    };
  },
  methods: {
    askQuestion() {
      const data = {
        question: this.question,
        userId: this.userId,
      };
      const config = {
        headers: {
          Authorization: `Bearer ${this.apiKey}`,
        },
      };
      if (this.question && this.question.length > 10) {
        this.axios
          .post("http://127.0.0.1:8000/api/add/question", data, config)
          .then(() => {
            this.question = "";
          })
          .catch((e) => console.log(e));
      }
    },
  },
  mounted() {
    const userData = JSON.parse(localStorage.getItem("userData"));
    if (userData) {
      this.apiKey = userData.token;
      this.userId = userData.user.id;
    }
  },
};
</script>
