<template>
  <form>
    <div class="form-group">
      <label for="firstname">Firstname</label>
      <input
        type="text"
        id="firstname"
        name="firstname"
        class="form-control"
        v-model="firstname">
    </div>
    <div class="form-group">
      <label for="lastname">Lastname</label>
      <input
        type="text"
        id="lastname"
        name="lastname"
        class="form-control"
        v-model="lastname">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input
        type="text"
        id="email"
        name="email"
        class="form-control"
        v-model="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input
        type="text"
        id="password"
        name="password"
        class="form-control"
        v-model="password">
    </div>
    <button type="submit" class="btn btn-primary" @click.prevent="signup">Sign up</button>
  </form>

</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      firstname: '',
      lastname: '',
      email: '',
      password: ''
     }
  },
  methods: {
    signup() {
      axios.post('/api/signup',
    {
      firstname: this.firstname,
      lastname: this.lastname,
      email: this.email,
      password: this.password
    }, {headers: {'X-Requested-With': 'XMLHttpRequest'}})
    .then(
      (response) => console.log(response)
    )
    .catch(
      (error) => console.log(error)
    );
    }
  },
}
</script>
