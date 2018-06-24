<template>
  <div>
    <h3 class="mb-5">Replying to comment</h3>

    <comment :comment="comment"></comment>

    <form @submit.prevent="store" id="reply">
      <div class="form-group">
        <textarea
              id="body"
              rows="6"
              class="form-control"
              autofocus="autofocus"
              v-model="form.body"
          ></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Reply</button>
        <a href="#" @click.prevent="cancel" class="btn btn-link">Cancel</a>
      </div>
    </form>
  </div>
</template>

<script>
  import Comment from './Comment'
  import bus from '../../bus'

  export default {
    props: {
      comment: {
        required: true,
        type: Object
      }
    },

    data () {
      return {
        form: {
          body: ''
        }
      }
    },

    components: {
      Comment
    },

    methods: {
      store () {
        console.log(this.form);
      },

      cancel () {
        bus.$emit('comment:reply-cancelled')
      }
    }
  }
</script>
