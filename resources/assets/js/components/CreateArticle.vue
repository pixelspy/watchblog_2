<template>
  <form class="mb-3" @submit.prevent="addArticle" method="post">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Title" v-model="article.title">
    </div>
    <div class="form-group">
      <textarea type="text" class="form-control" placeholder="Body" v-model="article.body"></textarea>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Category</button>
      <div class="dropdown-content">
        <div v-for="category in categories">
          <a href="#">{{category.name}}</a>
        </div>
      </div>
    </div>


    <button type="submit" class="btn btn-light btn-block">Save</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      article: {
        id: '',
        title: '',
        body: ''
      },
      categories: []
    }
  },

  created() {
    this.fetchCategories();
  },

  methods: {
    fetchCategories(page_url) {
      let vm = this;
      page_url = page_url || 'api/categories'
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        this.categories = res.data;
      })
      .catch(err => console.log(err));
    },
  }

}

</script>
