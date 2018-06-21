<template>
  <div>
    <new-comment
    :endpoint="endpoint"
    >
    </new-comment>

    <template v-if="comments.length">
      <ul class="list-unstyled">
        <comment v-for="comment in comments" :key="comment.id" :comment="comment"></comment>
      </ul>
    </template>

    <p class="mt-4">No comments to display</p>
  </div>
</template>

<script>
  import axios from 'axios'
  import bus from '../../bus.js'
  import NewComment from './NewComment'
  import Comment from './Comment'

  export default {
    data () {
      return {
          comments: [],
          meta: {},
          reply: null
      }
    },

    props: {
      endpoint: {
          required: true,
          type: String
      }
    },

    components: {
      NewComment,
      Comment
    },

    methods: {
      fetchComments(page = 1) {
          return axios.get(`${this.endpoint}?page=${this.meta.current_page}`)
      },

      async loadComments(page = 1) {
        let comments = await this.fetchComments(page)

        this.comments = comments.data.data
      },

      prependComment (comment) {
        console.log(comment)
      }
    },

    mounted() {
      this.loadComments(1)

      bus.$on('comment:stored', this.prependComment)
    }
  }
</script>
