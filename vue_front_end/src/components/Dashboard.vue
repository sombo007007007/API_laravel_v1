<template>
  <div class="flex h-screen">
    <Sidebar class="hidden md:block w-64" />
    <!-- Sidebar hidden on small screens, visible on md and up -->

    <div class="flex flex-col flex-1">
      <Topbar />

      <div class="p-5">
        <h2>Welcome to the Dashboard</h2>
        <p class="text-gray-600">This is your dashboard overview.</p>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from './Sidebar/Sidebar.vue'
import Topbar from './Topbar/Topbar.vue'

export default {
  name: 'Dashboard',
  components: {
    Sidebar,
    Topbar
  }
}
</script>