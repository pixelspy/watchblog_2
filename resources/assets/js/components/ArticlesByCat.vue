<template>
  <div  class="container">
    <h3>Articles of {{category.name}}</h3>

     <div v-for="article in category.articles">
       <Article :title="article.title" :body="article.body" />
     </div>

  </div>
</template>


<script>
import Article from './ArticleCard.vue';
  export default {
    data() {
      return {
        category: {}
      }
    },

    created() {
      this.fetchCategory();
    },

    components: {
			'Article': Article
		},

    methods: {

      fetchCategory(page_url, id) {
        let vm = this;
        console.log(this.$route.params.categoryID);
        page_url = page_url ||`api/category/${this.$route.params.categoryID}`
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.category = res.data;
          console.log(this.category);
        })
        .catch(err => console.log(err));
      },

    }
  }
</script>

<!-- <ul>
  <li v-for="article in category.articles">
    {{ article.title}}
  </li>
</ul> -->
