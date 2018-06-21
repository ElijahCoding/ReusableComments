<template>
  <div>
    <new-comment
    :endpoint="endpoint"
    >
    </new-comment>
  </div>
</template>

<script>
  import bus from '../../bus.js'
  import NewComment from './NewComment'

  export default {
    props: {
      endpoint: {
        required: true,
        type: String
      }
    },

    components: {
      NewComment
    },

    methods: {
      prependComment (comment) {
        console.log(comment)
      }
    },

    mounted() {
      bus.$on('comment:stored', this.prependComment)
    }
  }
</script>
