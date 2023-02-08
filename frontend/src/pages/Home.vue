<template>
  <div class="home">
    <div class="flex" style="gap: 12px">
      <div style="flex: 5">
        <el-input
          placeholder="Please input"
          v-model="searchInput"
          class="input-with-select"
        >
          <el-button
            @click="searchFilter()"
            slot="append"
            icon="el-icon-search"
          ></el-button>
        </el-input>
      </div>
      <div style="flex: 1">
        <el-select
          @change="searchFilter('tipe')"
          v-model="filter.tipe"
          placeholder="Tipe"
        >
          <el-option label="IT" value="IT"></el-option>
          <el-option label="Electrical" value="Electrical"></el-option>
          <el-option label="Furniture" value="Furniture"></el-option>
        </el-select>
      </div>

      <div style="flex: 1">
        <el-select
          @change="searchFilter('status')"
          v-model="filter.status"
          placeholder="Status"
        >
          <el-option label="Active" value="Active"></el-option>
          <el-option label="Broken" value="Broken"></el-option>
          <el-option label="In service" value="In service"></el-option>
        </el-select>
      </div>
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
            :gambar="items.image_url"
            :tanggal="items.tanggal_pembelian"
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
      v-for="items in itemsData"
        :gambar="items.image_url"
        :tanggal="items.tanggal_pembelian"
        :nama="items.nama"
        :id="items.id"
        :status="items.status"
        :tipe="items.tipe"
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
// @ is an alias to /src
import Items from "../components/Items.vue";
export default {
  name: "Home",
  components: {
    Items,
  },
  data() {
    return {
      search: false,
      filterResult: [],
      searchInput: "",
      filter: {
        tipe: "",
        status: "",
      },

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
      this.search = true
      const test = (this.filterResult = this.itemsData.filter((d) =>
        this.searchInput == "" &&
        this.filter.tipe == "" &&
        this.filter.status == ""
          ? null
          : this.searchInput != "" &&
            this.filter.tipe == "" &&
            this.filter.status == ""
          ? d.nama.toLowerCase().includes(this.searchInput.toLowerCase())
          : this.searchInput != "" &&
            this.filter.tipe != "" &&
            this.filter.status == ""
          ? d.nama.toLowerCase().includes(this.searchInput.toLowerCase()) &&
            d.tipe.toLowerCase() == this.filter.tipe.toLowerCase()
          : this.searchInput != "" &&
            this.filter.tipe == "" &&
            this.filter.status != ""
          ? d.nama.toLowerCase().includes(this.searchInput.toLowerCase()) &&
            d.status.toLowerCase() == this.filter.status.toLowerCase()
          : this.searchInput != "" &&
            this.filter.tipe != "" &&
            this.filter.status != ""
          ? d.nama.toLowerCase().includes(this.searchInput.toLowerCase()) &&
            d.tipe.toLowerCase() == this.filter.tipe.toLowerCase() &&
            d.status.toLowerCase() == this.filter.status.toLowerCase()
          : this.searchInput == "" &&
            this.filter.tipe != "" &&
            this.filter.status != ""
          ? d.tipe.toLowerCase() == this.filter.tipe.toLowerCase() &&
            d.status.toLowerCase() == this.filter.status.toLowerCase()
          : this.searchInput == "" &&
            this.filter.tipe == "" &&
            this.filter.status != ""
          ? d.status.toLowerCase().includes(this.filter.status.toLowerCase())
          : d.tipe.toLowerCase().includes(this.filter.tipe.toLowerCase())
      ));
    },
  },
  async beforeMount(){
    try {
        this.loading = true;
        // const params = { password: pass, email: mail };
        const url = `http://localhost:8000/getAll`;
        // console.log(params);
        const ref = await this.$axios.get(url);
        const refValue = ref.data.success;
        console.log(refValue)
        
        if (ref.data.success == true) {
          // for (const dataKey in refValue) {
          //   let params = { dataInfo: dataKey, data: `${refValue[dataKey]}`}
          //   this.$store.dispatch("dataCollect", params);
          //   console.log(this.$store.getters.userAuth)
          // }
          this.itemsData = ref.data.data
          console.log(this.itemsData)
          this.$message.success(ref.data.message); 
          this.loading = false;
        }
      } catch (error) {
        this.$message.warning('Data error');
        this.loading = false;
      }

    // this.$axios
    //   .get('http://localhost:8000/getbarang/2')
    //   .then(response => (console.log(response)))
  }
};
</script>

<style>
.home {
  margin-top: 15px;
}
.grid-items {
  gap: 1em;
  margin-top: 1em;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
}
.absolute-btn {
  position: fixed;
  padding: 15px 25px !important;
  bottom: 20px;
  right: 20px;
  font-size: 1em !important;
}
</style>
