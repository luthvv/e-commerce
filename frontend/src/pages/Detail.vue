<template>
  <div v-if="formCurrent" class="detail">
    <div class="text-lg font-semibold text-right border-black">
      <span class="font-bold">Dibuat pada:</span> 17/09/2020
    </div>

    <div class="text-lg mb-2 font-semibold text-right border-black">
      <span class="font-bold">Oleh:</span> M Asep
    </div>
    <el-page-header class="transition bg-blue-100 p-4 rounded-md mb-5" v-if="editMode" @back="cancelEdit"
      content="You're now in edit mode">
    </el-page-header>
    <el-form ref="formEdit" :rules="editMode ? rules : null" class="transition" :class="!editMode ? 'edit-false' : ''"
      label-position="top" label-width="100%" :model="editMode ? formEdit : formCurrent">
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item prop="nama" label="Nama Barang">
            <el-input v-model="formEdit.nama" :placeholder="formCurrent.nama" :disabled="!editMode"></el-input>
          </el-form-item>
        </el-col>

        <el-col :span="6">
          <el-form-item v-if="!editMode" label="Tipe barang">
            <!-- <el-select
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
            </el-select> -->
            <el-input v-model="formEdit.tipe" :placeholder="formCurrent.tipe" :disabled="!editMode"></el-input>
          </el-form-item>

          <el-form-item v-else prop="tipe" label="Tipe barang">
            <el-select style="width: 100%" v-model="formEdit.tipe" :placeholder="formCurrent.tipe">
              <el-option v-for="type in tipe" :key="type" :label="type" :value="type"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item prop="tanggal_pembelian" label="Tanggal pembelian">
            <el-date-picker type="date" style="width: 100%" v-model="formEdit.tanggal_pembelian" :placeholder="
              formCurrent.tanggal_pembelian != null
                ? formCurrent.tanggal_pembelian
                : 'null'
            " :disabled="!editMode"></el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item prop="harga" label="Harga pembelian">
            <el-input type="number" v-model="formEdit.harga" :placeholder="
              this.editMode == true
                ? formCurrent.harga
                : 'Rp. ' + formCurrent.harga
            " :disabled="!editMode"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row style="margin-top: 20px" :gutter="20">
        <el-col :span="8">
          <el-form-item prop="supplier" label="Supplier">
            <el-input v-model="formEdit.supplier" :placeholder="formCurrent.supplier" :disabled="!editMode"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item prop="pemegang" label="Pemegang">
            <el-input v-model="formEdit.pemegang" :placeholder="formCurrent.pemegang" :disabled="!editMode"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item prop="lokasi" label="Lokasi">
            <el-input v-model="formEdit.lokasi" :placeholder="formCurrent.lokasi" :disabled="!editMode"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row style="margin-top: 30px" :gutter="20">
        <el-col :span="16">
          <el-form-item prop="status" label="Status">
            <el-radio-group v-if="!editMode" style="width: 100%; display: flex" class="radio-group"
              v-model="formCurrent.status" :disabled="true">
              <el-radio class="radio" label="Active">Active</el-radio>
              <el-radio class="radio" label="Broken">Broken</el-radio>
              <el-radio class="radio" label="In Service">In Service</el-radio>
              <el-radio class="radio" label="Write Off">Write Off</el-radio>
            </el-radio-group>

            <el-radio-group v-else style="width: 100%; display: flex" class="radio-group" v-model="formEdit.status"
              :disabled="false">
              <el-radio class="radio" label="Active">Active</el-radio>
              <el-radio class="radio" label="Broken">Broken</el-radio>
              <el-radio class="radio" label="In Service">In Service</el-radio>
              <el-radio class="radio" label="Write Off">Write Off</el-radio>
            </el-radio-group>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item prop="image" v-if="editMode" label="Foto">
            <ImageInput :upload="upload" v-if="formEdit.image_url === ''" />

            <div v-else>
              <div>
                <img :src="formEdit.image_url" alt="image preview" />
              </div>
              <h1>{{ formCurrent.image_title }}</h1>
            </div>
          </el-form-item>

          <el-form-item v-if="!editMode" label="Foto">
            <ImageKosong v-if="formCurrent.image_url === ''" />

            <div v-else>
              <div class="cursor-pointer">
                <a :download="formCurrent.image_title + '.jpg'" :href="formCurrent.image_url" title="ImageName">
                  <img :src="formCurrent.image_url" alt="image preview" />
                </a>
              </div>
              <h1>{{ formCurrent.image_title }}</h1>
            </div>
          </el-form-item>
        </el-col>
      </el-row>

      <div>
        <h3 class="title">History Inventaris</h3>
        <hr />
        <Table :tableData="tableData" />
      </div>


      <hr style="
          margin-top: 10px;
          height: 2px;
          border: none;
          color: #dcdfe6;
          background-color: #dcdfe6;
        "/>
      <el-form-item class="form-btn" v-if="editMode" style="display: flex; justify-content: flex-end">
        <el-button @click="cancelEdit">Batal</el-button>

        <el-button type="primary" @click="editDone('formEdit')">&nbsp;&nbsp;Done&nbsp;</el-button>
      </el-form-item>

      <el-form-item class="form-btn" v-else style="display: flex; justify-content: flex-end">
        <el-button type="danger" v-if="admin == true" @click="onDelete">Delete</el-button>

        <el-button @click="back">Kembali</el-button>

        <el-button type="primary" class="edit-btn" @click="onEdit">&nbsp;&nbsp; Edit &nbsp;&nbsp;</el-button>
      </el-form-item>
    </el-form>
  </div>
  <div v-else>
    {{ formCurrent }}
  </div>
</template>

<script>
import Table from "../components/Table.vue";
import ImageInput from "../components/ImageInput.vue";
import ImageKosong from "../components/ImageKosong.vue";
export default {
  components: {
    Table,
    ImageInput,
    ImageKosong,
  },
  data() {
    return {
      admin: true,
      rules: {
        nama: [
          { required: true, message: "Pilih tipe barang", trigger: "blur" },
        ],
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
          { required: true, message: "Isi harga barang", trigger: "change" },
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
        image: [
          {
            required: true,
            message: "Please input activity form",
            trigger: "blur",
          },
        ],
      },
      date: new Date(),
      tipe: ["IT", "Electrical", "Furniture"],
      editMode: false,
      // editHistory: {
      //   waktuEdit: '',
      //   pemegang: '',

      // },
      formEdit: {
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
        pengedit: this.$store.getters.userName,
      },

      formCurrent: {},

      tableData: [],
    };
  },
  computed: {
    editDate() {
      return (
        this.date.getFullYear() +
        "-" +
        this.date.getMonth() +
        "-" +
        this.date.getDate()
      );
    },
  },
  methods: {
    upload(file) {
      if (file.target.files[0].size < 34666006) {
        const fileReader = new FileReader();
        fileReader.onload = () => {
          this.formEdit.image_url = fileReader.result;
          this.formEdit.image_title = file.target.files[0].name;
          console.log(this.formEdit.image_url);
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
    back() {
      this.$router.back();
    },
    cancelEdit() {
      this.$message("Edit canceled");

      this.editMode = false;

      this.formEdit = {
        tipe: "",
        tanggal_pembelian: "",
        harga: "",
        supplier: "",
        pemegang: "",
        lokasi: "",
        status: "",
        image_url: "",
        image_title: "",
        pengedit: this.$store.getters.userName,
      };
    },
    onDelete(){
      this.$confirm("Are you sure want to edit ?", "Warning", {
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        type: "warning",
      }).then(() => {
          const url = `http://localhost:8000/deleteBarang/${this.$route.params.id}`;

          const ref = this.$axios.delete(url);
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Delete canceled",
          });
        });
    },
    onEdit() {
      this.$confirm("Are you sure want to edit ?", "Warning", {
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        type: "warning",
      })
        .then(() => {
          this.editMode = true;
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Edit canceled",
          });
        });
    },
    clearForm(formName) {
      this.$refs[formName].resetFields();
    },
    editDone(formName) {
      this.$refs[formName].validate(async (valid) => {
        if (valid) {
          this.$confirm(
            "Are you sure to confirm this edited file? this will permanently added to history",
            "Warning",
            {
              confirmButtonText: "Confirm",
              cancelButtonText: "Cancel",
              type: "warning",
            }
          )
            .then(() => {
              const url = `http://localhost:8000/editInventaris`;
              const params = {
                id: this.$route.params.id,
                nama: this.formEdit.nama,
                tipe: this.formEdit.tipe,
                tanggal: this.formEdit.tanggal_pembelian.toDateString(),
                harga: this.formEdit.harga,
                supplier: this.formEdit.supplier,
                pemegang: this.formEdit.pemegang,
                lokasi: this.formEdit.lokasi,
                status: this.formEdit.status,
                image_url: this.formEdit.image_url,
                image_title: this.formEdit.image_title,
                pengedit: this.$store.getters.userName,
              };

              const ref = this.$axios.post(url, null, { params: params });

              console.log(ref);
              // this.formCurrent = this.formEdit;

              // let editHistory = {
              // waktuEdit: this.editDate,
              //   pemegang: this.formEdit.pemegang,
              //   lokasi: this.formEdit.loksi,
              //   status: this.formEdit.status,
              //   foto: this.formEdit.image_url,
              //   pengedit: "asep",
              // };

              this.formEdit = {
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
              };

              this.editMode = false;

              this.$message({
                type: "success",
                message: "Edit confirmed",
              });

              this.$router.go()

            })
            .catch((error) => {
              console.log(error)
              this.$message({
                type: "info",
                message: "Edit canceled",
              });
            });
        } else {
          this.$message({
            type: "warning",
            message: `Lengkapi form terlebih dahulu`,
          });
          return false;
        }
      });
    },
  },

  async beforeMount() {
    try {
      console.log(this.$route.params.id);
      const url = `http://localhost:8000/getbarang/${this.$route.params.id}`;

      const ref = await this.$axios.get(url);
      this.formCurrent = ref.data.data.inventaris;
      this.tableData = ref.data.data.history;

      console.log(this.tableData);

      console.log(this.formCurrent);
      console.log(ref.data);
    } catch (error) {
      this.$message.warning(error);
      this.loading = false;
    }
  },
};
</script>

<style>
.detail .edit-false .el-input__inner::placeholder {
  color: black !important;
  opacity: 1 !important;
}

.edit-btn {
  background-color: rgb(161 98 7) !important;
  border: 1px solid rgb(161 98 7) !important;
}

.edit-btn:hover {
  background-color: rgb(202 138 4) !important;
  border: 1px solid rgb(202 138 4) !important;
}

.edit-btn:active {
  background-color: rgb(133 77 14) !important;
  border: 1px solid rgb(133 77 14) !important;
}

.detail .cell {
  text-align: center;
}

.transition {
  transition: 0.2s;
}

.el-radio__input.is-disabled .el-radio__inner,
.el-radio__input.is-disabled.is-checked .el-radio__inner {}

.el-radio__input.is-disabled.is-checked .el-radio__inner {
  background-color: #409eff !important;
  border-color: #409eff !important;
}

.el-radio__input.is-checked+.el-radio__label {
  color: #409eff !important;
}
</style>
