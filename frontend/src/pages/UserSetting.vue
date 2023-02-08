<template>
  <div class="relative mt-6">
    <div class="absolute z-30">
      <el-button class="p-10" type="success" @click="onAdd = true"
        >Add User</el-button
      >
    </div>
    <div
      class="pt-16 z-10 min-h-screen"
      :class="onAdd ? 'opacity-30 cursor-pointer' : ''"
      @click="cancelAdd"
    >
      <el-table
        v-loading="loading"
        :data="
          search != ''
            ? tableData.filter(
                (data) =>
                  !search ||
                  data.username.toLowerCase().includes(search.toLowerCase())
              )
            : tableData
        "
        style="width: 100%"
      >
        <el-table-column label="Tanggal dibuat" prop="created_at">
        </el-table-column>
        <el-table-column label="Username" prop="username"> </el-table-column>
        <el-table-column label="Password" prop="password"> </el-table-column>
        <el-table-column align="right">
          <template slot="header">
            <input
              v-model="search"
              type="text"
              autocomplete="off"
              placeholder="Type to search"
              class="el-input__inner"
            />
          </template>
          <template slot-scope="scope">
            <el-button size="mini" @click="handleEdit(scope.$index, scope.row)"
              >Edit</el-button
            >
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row)"
              >Delete</el-button
            >
          </template>
        </el-table-column>
      </el-table>
    </div>
    <div v-if="onAdd" class="">
      <div
        class="absolute w-1/2 top-20 z-20 bg-white flex items-center border-2 rounded-l border-gray left-1/4"
      >
        <div class="w-full p-10 px-16">
          <el-form
            :model="addForm"
            status-icon
            :rules="rules"
            ref="addForm"
            label-width="130px"
            label-position="top"
            class="demo-ruleForm"
          >
            <el-form-item label="Username" prop="userName">
              <el-input
                type="text"
                v-model="addForm.userName"
                autocomplete="off"
              ></el-input>
            </el-form-item>
            {{ addForm.userName }}
            <el-form-item label="Password" prop="password">
              <el-input
                type="password"
                v-model="addForm.password"
                autocomplete="off"
              ></el-input>
            </el-form-item>
            <el-form-item label="Confirm password" prop="confirm">
              <el-input type="password" v-model="addForm.confirm"></el-input>
            </el-form-item>
            <el-form-item class="mt-10">
              <el-button type="primary" @click="submitForm('addForm')"
                >Submit</el-button
              >
              <el-button @click="resetForm('addForm')">Reset</el-button>
            </el-form-item>
          </el-form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    var validatePass = (rule, value, callback) => {
      if (value === "") {
        callback(new Error("Please input the password"));
      } else {
        if (this.addForm.confirm !== "") {
          this.$refs.addForm.validateField("confirm");
        }
        callback();
      }
    };
    var validatePass2 = (rule, value, callback) => {
      if (value === "") {
        callback(new Error("Please input the password again"));
      } else if (value !== this.addForm.password) {
        callback(new Error("Two inputs don't match!"));
      } else {
        callback();
      }
    };
    return {
      laoding: false,
      date: new Date(),
      onAdd: false,
      rules: {
        userName: [
          {
            required: true,
            message: "User name harus memiliki 3 karakter",
            min: 3,
          },
        ],
        password: [{ validator: validatePass, trigger: "blur" }],
        confirm: [{ validator: validatePass2, trigger: "blur" }],
      },
      tableData: [],
      search: "",
      addForm: {
        userName: "",
        password: "",
        confirm: "",
      },
    };
  },
  methods: {
    cancelAdd() {
      (this.onAdd = false),
        (this.addForm = {
          userName: "",
          password: "",
          confirm: "",
        });
    },
    submitForm(formName) {
      this.$refs[formName].validate(async (valid) => {
        const userData = {
          username: this.addForm.userName,
          password: this.addForm.password,
        };
        try {
          if (valid) {
            const register = await this.$axios.post(
              `http://localhost:8000/register?username=${userData.username}&password=${userData.password}`
            );

            this.tableData.push(userData)

            this.$message({
              message: "Berhasil ditambahkan",
              type: "success",
            });

            this.addForm = {
              userName: "",
              password: "",
              confirm: "",
            };

            this.onAdd = false;

            console.log(this.tableData);
          } else {
            console.log("error submit!!");
            return false;
          }
        } catch (error) {
          this.$message({
            type: "danger",
            message: error,
          });
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
    },

    handleDelete(index, row) {
      this.$confirm("Hapus akun?", "Warning", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        type: "warning",
      })
        .then(async () => {
          try {
            const action = await this.$axios.delete(
              `http://localhost:8000/deleteUser/${row.username}`
            );
            this.tableData.splice(index, 1);
            this.$message({
              type: "success",
              message: "Berhasil dihapus",
            });
          } catch (error) {
            this.$message({
              type: "warning",
              message: "gagal menghapus",
            });
          }
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Dibatalkan",
          });
        });
    },
  },
  async beforeMount() {
    try {
      this.loading = true;
      const url = `http://localhost:8000/getUser`;

      const ref = await this.$axios.get(url);
      const users = ref.data.users;
      this.loading = false;

      this.tableData = users;
    } catch (error) {
      this.$message.warning(error);
    }
  },
};
</script>

<style></style>
