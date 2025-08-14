<template>
  <div class="login-container">
    <h2 class="css_Login">Login</h2>
    <form @submit.prevent="handleLogin">
      <div>
        <label>Email:</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label>Password:</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">Login</button>
      <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    </form>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      errorMessage: ""
    };
  },
  methods: {
    handleLogin() {
      if (this.email === "admin@example.com" && this.password === "123456") {
        alert("Login successful!");
        this.$router.push("/dashboard");
      } else {
        // this.errorMessage = "Invalid email or password";
        this.errorMessage = "";
      }
    }
  }
};
</script>

<style scoped>
.login-container {
  max-width: 300px;
  margin: 100px auto;
  padding: 20px;
  border: 1px solid #3bf17e;
  border-radius: 8px;
  background-color: #3bf17e;
}
input {
  display: block;
  width: 90%;
  margin-bottom: 10px;
  padding: 8px;
  border-radius: 10px;
  border: none;
}
button {
  width: 96%;
  padding: 10px;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}
button:hover{
  background-color: aliceblue;
}
.error {
  color: red;
  margin-top: 10px;
}
.css_Login{
  display: flex;
  justify-content: center;
  justify-items: center;
}
</style>
