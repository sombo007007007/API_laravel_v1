<template>
  <div class="sidebar">
    <h3>MyApp</h3>
    <ul>
      <li><router-link to="/dashboard" class="text-blue-500 font-bold mt-1">Dashboard</router-link></li>
      <li><router-link to="/dashboard">Home</router-link></li>
      <li><router-link to="/">Logout</router-link></li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "Sidebar"
}
</script>
