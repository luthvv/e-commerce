<template>
  <div>
    <el-form
      label-position="top"
      :rules="rules"
      label-width="100%"
      :model="form"
      ref="ruleForm"
    >
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item prop="nama" label="Nama Barang">
            <el-input
              v-model="form.nama"
              placeholder="Masukkan harga pembelian"
            ></el-input>
          </el-form-item>
        </el-col>

        <el-col :span="6">
          <el-form-item prop="tipe" label="Tipe barang">
            <el-select
              style="width: 100%"
              v-model="form.tipe"
              placeholder="Pilih tipe barang"
            >
              <el-option
                v-for="type in tipe"
                :key="type"
                :label="type"
                :value="type"
              ></el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item prop="tanggal_pembelian" label="Tanggal pembelian">
            <el-date-picker
              type="date"
              placeholder="Pick a date"
              v-model="form.tanggal_pembelian"
              style="width: 100%"
            ></el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item prop="harga" label="Harga pembelian">
            <el-input
              v-model="form.harga"
              placeholder="Harga pembelian"
              type="number"
            ></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row style="margin-top: 20px" :gutter="20">
        <el-col :span="8">
          <el-form-item prop="supplier" label="Supplier">
            <el-input v-model="form.supplier" placeholder="Supplier"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item prop="pemegang" label="Pemegang">
            <el-input v-model="form.pemegang" placeholder="Pemegang"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item prop="lokasi" label="Lokasi">
            <el-input v-model="form.lokasi" placeholder="Lokasi"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row style="margin-top: 30px" :gutter="20">
        <el-col :span="16">
          <el-form-item prop="status" label="Status">
            <el-radio-group
              style="width: 100%; display: flex"
              class="radio-group"
              v-model="form.status"
            >
              <el-radio class="radio" label="active">Active</el-radio>
              <el-radio class="radio" label="broken">Broken</el-radio>
              <el-radio class="radio" label="in Service">In Service</el-radio>
              <el-radio class="radio" label="write Off">Write Off</el-radio>
            </el-radio-group>
          </el-form-item>
        </el-col>

        <el-col :span="8">
          <el-form-item prop="image" label="Foto">
            <ImageInput
              v-model="form.image_url"
              :upload="uploadFile"
              v-if="form.image_url === ''"
            />

            <div class="flex items-start gap-x-5" v-else>
              <div>
                <div>
                  <img :src="form.image_url" alt="image preview" />
                </div>
                <h1>{{ form.image_title }}</h1>
              </div>
              <el-button type="primary" @click="clearImage">Clear</el-button>
            </div>
          </el-form-item>
        </el-col>
      </el-row>
      <hr
        style="
          height: 2px;
          border: none;
          color: #dcdfe6;
          background-color: #dcdfe6;
        "
      />

      <el-form-item
        class="form-btn"
        style="display: flex; justify-content: flex-end"
      >
        <el-button @click="back">Kembali</el-button>
        <el-button type="primary" @click="submitForm('ruleForm')"
          >Tambah</el-button
        >
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import ImageInput from "../components/ImageInput.vue";

export default {
  components: {
    ImageInput,
  },
  data() {
    return {
      rules: {
        tipe: [
          { required: true, message: "Pilih tipe barang", trigger: "blur" },
        ],
        tanggal_pembelian: [
          {
            required: true,
            message: "Isi tanggal pembelian",
            trigger: "change",
          },
        ],
        harga: [
          {
            required: true,
            message: "Isi harga berupa angka",
            trigger: "change",
          },
        ],
        nama: [
          {
            required: true,
            message: "Isi nama barang",
            trigger: "change",
          },
        ],
        supplier: [
          { required: true, message: "Isi supplier barang", trigger: "change" },
        ],
        pemegang: [
          { required: true, message: "Isi pemegang barang", trigger: "change" },
        ],
        lokasi: [
          { required: true, message: "Isi lokasi barang", trigger: "change" },
        ],
        status: [
          { required: true, message: "Pilih status barang", trigger: "blur" },
        ],
        // image: [
        //   {
        //     required: true,
        //     message: "Please input activity form",
        //     trigger: "blur",
        //   },
        // ],
      },
      form: {
        nama: "",
        tipe: "",
        tanggal_pembelian: "",
        harga: "",
        supplier: "",
        pemegang: "",
        lokasi: "",
        status: "",
        image_url: "",
        image_title: "",
      },

      tipe: ["IT", "Electrical", "Furniture"],
    };
  },
  methods: {
    clearImage(){
      this.form.image_url = ""
      this.form.title = ""
    },
    submitForm(formName) {
      this.$refs[formName].validate(async (valid) => {
        const params = {
          nama: this.form.nama,
          tipe: this.form.tipe,
          tanggal_pembelian: this.form.tanggal_pembelian.toDateString(),
          harga: this.form.harga,
          supplier: this.form.supplier,
          pemegang: this.form.pemegang,
          lokasi: this.form.lokasi,
          status: this.form.status,
          image_url: this.form.image_url,
          image_title: this.form.image_title,
        };
        if (valid) {
          const url = `http://localhost:8000/createInventaris`;
          const ref = await this.$axios.post(url, null, {
            params: params,
          });
          console.log(ref);
          if (ref.data.success) {
            this.$message({
              type: "success",
              message: ref.data.message,
            });
            this.$router.replace("/");
          } else {
            this.$message({
              type: "error",
              message: ref.data.message,
            });
          }
        } else {
          this.$message({
            type: "warning",
            message: `Lengkapi form terlebih dahulu`,
          });
          return false;
        }
      });
    },
    onSubmit() {},
    back() {
      this.$router.back();
    },
    uploadFile(file) {
      console.log(file);
      if (file.target.files[0].size < 34666006) {
        const fileReader = new FileReader();
        fileReader.onload = () => {
          this.form.image_url = fileReader.result;
          this.form.image_title = file.target.files[0].name;
          console.log(file.target.files[0]);
        };
        fileReader.readAsDataURL(file.target.files[0]);

        //ini berupa blob image
        // console.log(URL.createObjectURL(file.target.files[0]))

        // var logFile = file.target.files[0];
        // var reader = new FileReader();
        // reader.readAsDataURL(logFile);
        // reader.onload = function (e) {
        //   var rawLog = reader.result;
        //   console.log(rawLog);
        // };
      } else {
        this.$message({
          message: "Ukuran gambar terlalu besar!",
          type: "error",
        });
      }
    },
  },
};
</script>

<style>
.radio-group {
  border: 1px solid #dcdfe6;
  background-color: white;
  padding: 15px 18px;
  border-radius: 4px;
}
.radio-group .radio {
  flex: 1;
  display: flex;
  justify-content: center;
}
.form-btn .el-button {
  padding: 15px 30px;
  font-size: 1em;
}
</style>
