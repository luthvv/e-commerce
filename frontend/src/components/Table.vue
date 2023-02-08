<template>
  <div>
      <el-table :data="tableData" border stripe style="width: 100%;">
          <el-table-column prop="created_at" label="Waktu Edit" >
          </el-table-column>
          <el-table-column prop="pemegang" label="Pemegang" >
          </el-table-column>
          <el-table-column prop="lokasi" label="Lokasi" > </el-table-column>
          <el-table-column prop="status" label="Status" > </el-table-column>
          <el-table-column prop="image_url" label="Foto barang" >
            <a class="cursor-pointer" :download="tableData.image_url +'.jpg'" :href="tableData.image_url" :title="tableData.image_title">
            <img :src="tableData[0].image_url" alt="">
            </a>
          </el-table-column>
          <el-table-column prop="pengedit" label="pengedit" > </el-table-column>
        </el-table>

        <!-- <el-table :data="tableData" border stripe style="width: 100%;">
          <el-table-column v-for="data in tableData" :key="data.date" :prop="data.date" label="Waktu Edit" >
            {{data.date}}
          </el-table-column> -->
<!--         
        </el-table> -->
  </div>
</template>

<script>
export default {
    props: {
        tableData: Array,
        // date: String,
        // name: String,
        // lokasi: String,
        // status: String
    }
}
</script>

<style>

</style>