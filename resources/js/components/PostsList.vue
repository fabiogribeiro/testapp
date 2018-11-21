<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Posts list</div>

                    <div class="card-body">

                      <ul>
                        <li style="margin-bottom: 5px" v-for="(post, index) in postList" :key="post.id">
                            {{ post.title }}

                            <button v-on:click="removePost(post.id, index)" type="submit" class="btn btn-sm btn-danger">
                              Remove
                            </button>
                        </li>

                        
                      </ul>

                      <div class="form-group row">
                          <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>

                          <div class="col-md-6">
                              <input v-model="title" id="title" class="form-control" name="title" value="" required autofocus>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="body" class="col-sm-4 col-form-label text-md-right">Body</label>

                          <div class="col-md-6">
                              <textarea v-model="body" id="body" class="form-control" name="body" value="" required>
                              </textarea>
                          </div>
                      </div>

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
          title: '',
          body: '',
          postList: this.posts
        }
      },
      methods: {
        addPost: function () {
          var posts = this.postList

          axios.post('/api/posts/create', {
            title: this.title,
            body: this.body
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
