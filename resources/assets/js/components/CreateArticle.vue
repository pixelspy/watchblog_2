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
      edit: false,
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

    // add and update
    addArticle() {
      if(this.edit == false) {
        // Add
        fetch('api/article', {
          method: 'post',
          body: JSON.stringify(this.article),
          headers: {
            'content-type' : 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.article.title = '';    // empty the form
          this.article.body = '';
          alert('Article Added');
          this.fetchArticles();
        })
        .catch(err => console.log(err));
      } else {
        // update
        fetch('api/article', {
          method: 'put',
          body: JSON.stringify(this.article),
          headers: {
            'content-type' : 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.article.title = '';    // empty the form
          this.article.body = '';
          alert('Article Updated');
          this.fetchArticles();
        })
        .catch(err => console.log(err));
      }
    },
    // set up of the form, not the update
    editArticle(article) {
      this.edit = true;
      this.article.id = article.id;
      this.article.article_id = article.id;
      this.article.title = article.title;
      this.article.body = article.body;
    }
  }

}

</script>

<!--
<script>
  export default {
    data() {
      return {
        articles: [],
        article: {
          id: '',
          title: '',
          body: ''
        },
        article_id: '',  // $id -->  for our PUT request
        pagination: {},
        edit: false
      }
    },

    // runs automatically when the page loads :
    created() {
      this.fetchArticles();
    },

    methods: {

      fetchArticles(page_url) {
        let vm = this;
        page_url = page_url || '/api/articles'
        fetch(page_url)
          .then(res => res.json())
          .then(res => {
            // console.log(res.data);
            this.articles = res.data;
            vm.makePagination(res.meta, res.links);
          })
          .catch(err => console.log(err));
      },

      makePagination(meta, links) {
        let pagination = {
          current_page: meta.current_page,
          last_page: meta.last_page,
          next_page_url: links.next,
          prev_page_url: links.prev
        }
        this.pagination = pagination;
      },

      deleteArticle(id) {
        if(confirm('Are you sure?')) {
          fetch(`api/article/${id}`, {
            method: 'delete'
          })
          .then(res => res.json())
          .then( data => {
            alert('Article removed');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
        }
      },

      // add and update
      addArticle() {
        if(this.edit == false) {
          // Add
          fetch('api/article', {
            method: 'post',
            body: JSON.stringify(this.article),
            headers: {
              'content-type' : 'application/json'
            }
          })
          .then(res => res.json())
          .then(data => {
            this.article.title = '';    // empty the form
            this.article.body = '';
            alert('Article Added');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
        } else {
          // update
          fetch('api/article', {
            method: 'put',
            body: JSON.stringify(this.article),
            headers: {
              'content-type' : 'application/json'
            }
          })
          .then(res => res.json())
          .then(data => {
            this.article.title = '';    // empty the form
            this.article.body = '';
            alert('Article Updated');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
        }
      },
      // set up of the form, not the update
      editArticle(article) {
        this.edit = true;
        this.article.id = article.id;
        this.article.article_id = article.id;
        this.article.title = article.title;
        this.article.body = article.body;
      }
    }

  }
</script> -->
