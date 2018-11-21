<template>
  <div class=container>
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
      <button v-on:click="$emit('add-post', title, body)" type="submit" class="btn btn-primary">
          Add post
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      title: '',
      body: ''
    }
  }
}
</script>
