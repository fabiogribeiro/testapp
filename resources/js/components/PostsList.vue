<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Posts list</div>

                    <div class="card-body">
                      <ul>
                        <li v-for="post in postList" :key="post.id">
                          {{ post.title }}
                        </li>
                      </ul>

                      <div class="col-md-8 offset-md-4">
                        <button v-on:click="addPost" type="submit" class="btn btn-primary">
                            Add post
                        </button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      props: ['posts'],
      data: function () {
        return {
          postList: this.posts
        }
      },
      methods: {
        addPost: function (event) {
          var newId = this.postList[this.postList.length - 1].id + 1
          var newPost = {
            id: newId,
            title: "title: " + newId,
            body: "body: " + newId
          }
          this.postList.push(newPost)
        }
      }
    }
</script>
