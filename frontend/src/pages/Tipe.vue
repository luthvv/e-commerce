<template>
  <div>
    <div style="flex: 5">
      <el-input
        placeholder="Please input"
        v-model="searchInput"
        class="input-with-select"
      >
        <el-button
          @click="searchFilter"
          slot="append"
          icon="el-icon-search"
        ></el-button>
      </el-input>
    </div>

    <div v-if="search" class="mt-5">
      <div v-if="filterResult.length > 0">
        <div class="text-xl flex items-center justify-between  w-full font-medium">
          <div>Search results</div>
          <div>
            <el-button type="default" class="w-28" @click="clearSearch">Clear</el-button>
          </div>
        </div>

        <div class="grid-items mb-5">
          <Items
            :gambar="items.gambar"
            :tanggal="items.tanggal"
            :nama="items.nama"
            :id="items.id"
            :status="items.status"
            :tipe="items.tipe"
            v-for="items in filterResult"
            :key="items.id"
          />
        </div>

        <div class="w-full h-px bg-black"></div>
      </div>
      <div v-else>
        <div class="mb-5 text-2xl font-medium flex justify-between items-center">
          <div>No result found :(</div>
          <div><el-button type="default" class="w-28" @click="clearSearch">Clear</el-button></div>
        </div>
        <div class="w-full h-px bg-black"></div>
      </div>
    </div>

    <div class="grid-items">
      <Items
        :gambar="items.gambar_url"
        :tanggal="items.created_at"
        :nama="items.nama"
        :id="items.id"
        :status="items.status"
        :tipe="items.tipe"
        v-for="items in itemsData"
        :key="items.id"
      />
    </div>

    <router-link to="/tambah">
      <el-button class="absolute-btn m-7" type="primary" icon="el-icon-plus">
        Tambah</el-button
      >
    </router-link>
  </div>
</template>

<script>
import Items from "../components/Items.vue";
export default {
  components: {
    Items,
  },
  data() {
    return {
      filterResult: [],
      searchInput: "",
      search : false,
      itemsData: [],
    };
  },
  methods: {
    clearSearch(){
      this.search = false,
      this.filterResult = [],
      this.searchInput = "",
      this.filter = {
        tipe: "",
        status: "",
      }
    },
    searchFilter() {
      this.search = true,
      // const urut = []

      // for (var i = 0, l = this.itemsData.length; i < l; i++) {
      //   test.push(i)
      // }

      // console.log(test)

      this.searchInput != '' ? this.filterResult = this.itemsData.filter((d) => d.nama.toLowerCase().includes(this.searchInput.toLowerCase())) : null
    },
  },

  async beforeMount(){
    const url = `http://localhost:8000/getAll/${this.$route.params.tipe}`

    const ref = await this.$axios.get(url)

    this.itemsData = ref.data.data
  },
};
</script>

<style></style>
