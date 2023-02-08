<template>
  <a href="#" :class="this.$route.name == name ? 'bg-gray-50 text-gray-800 border-indigo-500' : ''" class="relative flex flex-row items-center h-11 text-gray-600 border-l-4 border-transparent pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">name</span>
    </a>
</template>

<script>
export default {
props: {
    name: String
}
}
</script>

<style>

</style>