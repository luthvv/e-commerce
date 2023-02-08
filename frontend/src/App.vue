<template>
  <div id="app" class="bg-gray-50">
    <router-view name="layout">
      <router-view name="content" :api="apiLogin"></router-view>
    </router-view>
  </div>
</template>

<script>
export default {
  methods: {
    async apiLogin(pass, user) {
      try {
        this.loading = true;
        const params = { username: user, password: pass };
        const url = `http://localhost:8000/login`;
        console.log(params);
        const ref = await this.$axios.post(url, null, { params: params });
        const refValue = ref.data.data;

        if (ref.data.success == true) {
          for (const dataKey in refValue) {
            let params = { dataInfo: dataKey, data: `${refValue[dataKey]}` };
            if (params.dataInfo != "password") {
              this.$store.dispatch("dataCollect", params);
            }
          }
          this.loading = false;

          // console.log(ref)
        }
        return ref;
      } catch (error) {
        this.$message.warning(error);
        this.loading = false;
      }
    },
  },
  beforeMount() {
    console.log(this.$route);
    // console.log(this.$store.getters.userAuth)
  },
};
</script>

<style src="./assets/tailwind.css"></style>
