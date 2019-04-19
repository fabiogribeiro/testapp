<template>
  <div class="container">
    <h4 v-on:click="open = !open">Posts</h4>
    <ul v-if="open">
      <li v-for="(post, index) in postList" :key="post.id">
          {{ post.title }}

          <button v-on:click="removePost(post.id, index)" type="submit" class="btn btn-sm btn-danger">
            Remove
          </button>
      </li>
    </ul>
    <posts-form v-on:add-post="addPost"></posts-form>
  </div>
</template>

<script>
  export default {
    props: ['posts'],
    data: function () {
      return {
        postList: this.posts,
        open: true,
      }
    },
    methods: {
      addPost: function (title, body) {
        var posts = this.postList

        axios.post('/api/posts/create', {
          title: title,
          body: body
        }).then(function (response) {
          posts.push(response.data)
        }).catch(function (error) {
          console.log(error)
        })
      },
      removePost: function (id, index) {
        var posts = this.postList

        axios.delete('/api/posts/delete/' + id)
          .then(function (response) {
            if (response.data.success) {
              posts.splice(index, 1)
            }
          }).catch(function (error) {
            console.log(error)
          })
      }
    }
  }
</script>

<style scoped>
li {
  margin-bottom: 5px
}

h4 {
  cursor: pointer;
}
</style>
