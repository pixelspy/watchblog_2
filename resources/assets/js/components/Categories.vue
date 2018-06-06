<template>
  <div  class="cat_list">
    <div v-for="category in categories">
      <router-link :to="{ name: 'category', params: { categoryID: category.id }}" id="logo_header"><h3>{{category.name}}</h3></router-link>

    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
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
    //
    //   fetchOneCategory($id)
    }
  }
</script>
