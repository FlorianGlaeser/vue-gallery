<template>
  <div>
    <form v-if="!this.$store.state.login">
      <fieldset>
        <legend>Login</legend>
        <label for="username">Username</label>
        <input
          type="text"
          id="username"
          placeholder="Username"
          v-model="username"
        />
        <br />
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          placeholder="Password"
          v-model="password"
        />
        <br />
        <button @click="checkCredentials($event)">Login</button>
      </fieldset>
    </form>
    <p v-if="feedback">Feedback: {{ feedback }}</p>

    <button v-if="this.$store.state.login" @click="logout()">Logout</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: "",
      password: "",
      feedback: "",
    };
  },
  methods: {
    checkCredentials(event) {
      event.preventDefault();

      // salt ?
      const crypto = require('crypto');
      const sha256 = crypto.createHash('sha256').update(this.username + this.password).digest('hex');

      // post ?
      axios
        .get(`/?hash=`+ sha256)
        .then(response => {
          if( response.data === true ) {
            this.$store.state.login = response.data;
            this.$store.state.hash = sha256;
            this.feedback = 'Korrekte Credentials';
          } else {
            this.feedback = 'Falsche Credentials';
          }
      });
    },
    logout() {
      this.$store.state.login = false;
      this.$store.state.hash = "";
      this.feedback = "";
      this.username = "";
      this.password = "";
    },
  },
};
</script>
