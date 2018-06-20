<template>
  <div>
    <new-comment :endpoint="endpoint"></new-comment>
  </div>
</template>

<script>
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
    }
  }
</script>
