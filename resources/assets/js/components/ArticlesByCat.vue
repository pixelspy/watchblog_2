<template>
  <div  class="container">
    <h3>{{category.name}}</h3>
   All articles of that  category
  </div>
</template>


<script>
  export default {
    data() {
      return {
        category: {}
      }
    },

    created() {
      this.fetchCategory();
    },

    methods: {

      fetchCategory(page_url, id) {
        let vm = this;
        page_url = page_url ||` api/category/${id}`
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.category = res.data;
        })
        .catch(err => console.log(err));
      },

    }
  }
</script>

<!-- 
// fetchCategory(id) {
//   fetch(`api/category/${id}`)
//   .then(res => res.json())
//   .then(res => {
//     this.category = res.data;
//   })
//   .catch(err => console.log(err));
// }, -->
