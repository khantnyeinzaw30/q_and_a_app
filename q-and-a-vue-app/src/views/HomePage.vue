<template>
  <div class="container-fluid">
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
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="q in questions" :key="q.id">
                    <td>{{ q.question }}</td>
                    <td>{{ q.created_at }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Ask A question Button -->
          <div class="card-footer">
            <button
              class="btn btn-success float-end"
              @click="isBeingAsked = !isBeingAsked"
            >
              add new <i class="fa-solid fa-circle-question"></i>
            </button>
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
    <!-- ask a question section here -->
    <div class="row" v-if="isBeingAsked">
      <AskForm />
    </div>
  </div>
</template>

<script>
import AskForm from "../components/AskForm.vue";
import formatDate from "../assets/formatDate.js";

export default {
  name: "HomeView",
  components: { AskForm },
  data() {
    return {
      isBeingAsked: false,
      questions: [],
      apiKey: "",
      userId: "",
    };
  },
  methods: {
    getQuestions() {
      const config = {
        headers: {
          Authorization: `Bearer ${this.apiKey}`,
        },
      };
      this.axios
        .get(
          `http://127.0.0.1:8000/api/questions/all?userId=${this.userId}`,
          config
        )
        .then((response) => {
          formatDate(response);
          this.questions = response.data.questions;
        })
        .catch((e) => console.log(e));
    },
  },
  mounted() {
    const userData = JSON.parse(localStorage.getItem("userData"));
    if (userData) {
      this.apiKey = userData.token;
      this.userId = userData.user.id;
      this.getQuestions();
    }
  },
};
</script>
