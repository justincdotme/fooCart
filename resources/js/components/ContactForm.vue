<template>
  <form @submit.prevent="submit" novalidate>
    <div class="alert alert-success" id="contact-success" v-show="success">Form submitted successfully</div>
    <div class="mb-3">
      <label for="name">Name <span class="text-muted">(required)</span></label>
      <input name="name"
             type="text"
             class="form-control"
             id="name"
             placeholder="John Smith"
             v-model="fields.name">
      <div v-if="errors && errors.name" id="contact-name-error" class="text-danger">{{ errors.name[0] }}</div>

    </div>
    <div class="mb-3">
      <label for="email">Email <span class="text-muted">(required)</span></label>
      <input name="email"
             type="email"
             class="form-control"
             id="email"
             placeholder="you@example.com"
             v-model="fields.email">
      <div v-if="errors && errors.email" id="contact-email-error" class="text-danger">{{ errors.email[0] }}</div>

    </div>
    <div class="mb-3">
      <label for="phone">Phone <span class="text-muted">(required)</span></label>
      <input name="phone"
             type="text"
             class="form-control"
             id="phone"
             placeholder="123-456-7890"
             v-model="fields.phone">
      <div v-if="errors && errors.phone" id="contact-phone-error"class="text-danger ">{{ errors.phone[0] }}</div>

    </div>
    <div class="mb-3">
      <label for="message">Message <span class="text-muted">(required)</span></label>
      <textarea name="message"
          type="text" class="form-control"
          id="message"
          placeholder="Message..."
          v-model="fields.message"></textarea>
      <div v-if="errors && errors.message" id="contact-message-error" class="text-danger ">{{ errors.message[0] }}</div>
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
  </form>
</template>

<script>
    export default {
      data() {
        return {
          fields: {},
          errors: {},
          success: false
        }
      },
      methods: {
        submit() {
          this.errors = {};
          window.axios.post('/contact', this.fields).then(response => {
            this.fields = {};
            this.success = true;
          }).catch(error => {
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            }
          });
        }
      }
    }
</script>
