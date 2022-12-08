<template>
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-8 offset-lg-2">
        <div class="card" v-if="questions.length">
          <div class="card-header">
            <h3 class="text-dark text-uppercase text-center">
              your top questions
            </h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-borderless">
                <caption v-show="questions.length">
                  List of questions ({{
                    questions.length
                  }})
                </caption>
                <thead>
                  <tr>
                    <th>Question</th>
                    <th>Asked Date</th>
                    <th>Reply</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="q in questions" :key="q.id">
                    <td>{{ q.question }}</td>
                    <td>{{ q.created_at }}</td>
                    <td>
                      <button
                        @click="reply(q.id)"
                        class="btn btn-success btn-sm"
                      >
                        Reply
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card text-bg-success" v-else>
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <small
              >You will have to sign in first to see your asked questions</small
            >
            <router-link to="/login" class="btn btn-sm btn-dark"
              >Sign Up</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import formatDate from "@/assets/formatDate";
export default {
  name: "OtherQuestions",
  data() {
    return {
      questions: [],
      apiKey: "",
      userId: "",
    };
  },
  methods: {
    getOtherQuestions() {
      const config = {
        headers: {
          Authorization: `Bearer ${this.apiKey}`,
        },
      };
      this.axios
        .get(
          `http://127.0.0.1:8000/api/questions/others?userId=${this.userId}`,
          config
        )
        .then((response) => {
          formatDate(response);
          this.questions = response.data.questions;
        })
        .catch((e) => console.log(e));
    },
    reply(questionId) {
      console.log(questionId);
    },
  },
  mounted() {
    const userData = JSON.parse(localStorage.getItem("userData"));
    if (userData) {
      this.apiKey = userData.token;
      this.userId = userData.user.id;
      this.getOtherQuestions();
    }
  },
};
</script>
