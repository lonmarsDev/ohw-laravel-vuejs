<template>
    <div class="innerformmain topspace">
        <h2 class="componentheader">Account Verification</h2>
        <p>If we see patterns that seem unusual for your account, we’ll need to verify your identity.</p>
        <br>
        <h2 class="componentheader">Verify identity via SMS</h2>
        <button type="button" class="btn btn2 btn-lg">Enable</button>
        <h2 class="componentheader paddingTop">Verify identity with security questions</h2>
        <div class="formall"  v-if="!answered">
            <form action="" id="security_question_form" v-on:submit.prevent="onSubmit">
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="security_question1">Security Question #1</label>
                        <select name="security_question1" id="security_question1" class="form-control">
                            <option value="0">-- Select Question --</option>
                            <option v-bind:value="question.id" v-for="(question, index) in securityQuestions" :key="index" v-text="question.question"></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="security_answer1">Security Answer #1</label>
                        <input type="password" name="security_answer1" id="security_answer1" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="security_question2">Security Question #2</label>
                        <select name="security_question2" id="security_question2" class="form-control">
                            <option value="0">-- Select Question --</option>
                            <option v-bind:value="question.id" v-for="(question, index) in securityQuestions" :key="index" v-text="question.question"></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="security_answer2">Security Answer #2</label>
                        <input type="password" name="security_answer2" id="security_answer2" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="security_question3">Security Question #3</label>
                        <select name="security_question3" id="security_question3" class="form-control">
                            <option value="0">-- Select Question --</option>
                            <option v-bind:value="question.id" v-for="(question, index) in securityQuestions" :key="index" v-text="question.question"></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="security_answer3">Security Answer #3</label>
                        <input type="password" name="security_answer3" id="security_answer3" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn2">Save</button>
            </form>
        </div>
        <p v-show="answered">Your answers to security question have been saved. <a href="" class="componentarchor" v-on:click.prevent="editQuestions">Edit</a></p>
    </div>
</template>

<script>
  import ResponseMessage from '../../mixins/ResponseMessage';
  export default {
    name: "AccountVerification",
    props: {
      securityQuestions: {
        type: Array,
        required: true
      },
      securityAnswers: {
        type: Array,
        required: true
      },
      securityQuestionsAnswered: {
        type: Boolean,
        required: true
      }
    },
    mixins: [
      ResponseMessage
    ],
    data() {
      return {
          answered: this.securityQuestionsAnswered
      }
    },
    methods: {
      onSubmit() {
        let form = $('#security_question_form');
        let form_data = form.serializeArray();
        let params = {};

        form_data.map((i) => {
          params[i.name] = i.value;
        });

        this.$http.post(window.APP_URL + '/api/settings/security_questions', params)
          .then((response, status, header) => {
            
            this.$toastr.s(this.$_responseMessage_success_handler(response));
            this.answered = true;
          }).catch((response, status, header) => {
            this.$toastr.e(this.$_responseMessage_error_handler(response.body.errors));
        });
      },
      editQuestions() {
        if (this.answered) {
          this.answered = false
        }
      }
    }
  }
</script>

<style scoped>
    .componentheader {
        color: #2b3443;
        padding-bottom: 5px;
    }

    .paddingTop {
        padding-top: 10px;
    }

    .componentarchor {
        color: #16b3b9;
        border-bottom: #16b3b9 2px dotted;
        font-weight: 502;
    }
</style>