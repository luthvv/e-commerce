<template>
  <div class="min-h-screen">
    <div v-if="isAdmin == true" class="mt-10 h-full min-h-screen flex">
      <div class="flex-1">
        <div class="flex mb-10 justify-between">
          <div class="flex-1 font-medium text-gray-500 text-lg">
            User can edit detail?
          </div>

          <div class="flex-1">
            <el-select
              class="mb-3"
              size="small"
              v-model="settings.userEditDetail"
              :placeholder="userEditDetail"
              @change="isEdit = true"
            >
              <el-option label="Yes" :value="true"></el-option>
              <el-option label="No" :value="false"></el-option>
            </el-select>

            <div class="text-gray-400 text-sm">
              User will be able to edit inventory details
            </div>
          </div>
        </div>

        <div class="flex justify-between mb-10">
          <div class="flex-1 font-medium text-gray-500 text-lg">
            User can edit history?
          </div>

          <div class="flex-1">
            <el-select
              class="mb-3"
              size="small"
              v-model="settings.userEditHistory"
              :placeholder="userEditHistory"
              @change="isEdit = true"
            >
              <el-option label="Yes" :value="true"></el-option>
              <el-option label="No" :value="false"></el-option>
            </el-select>

            <div class="text-gray-400 text-sm">
              User will be able to edit inventory history
            </div>
          </div>
        </div>

        <div class="flex justify-between mb-10">
          <div class="flex-1 font-medium text-gray-500 text-lg">
            User can add inventory?
          </div>

          <div class="flex-1">
            <el-select
              class="mb-3"
              size="small"
              v-model="settings.userAdd"
              :placeholder="userAdd"
              @change="isEdit = true"
            >
              <el-option label="Yes" :value="true"></el-option>
              <el-option label="No" :value="false"></el-option>
            </el-select>

            <div class="text-gray-400 text-sm">
              User will be able to add new invetory &nbsp; &nbsp; &nbsp;&nbsp;
            </div>
          </div>
        </div>

        <div class="flex justify-between">
          <div class="flex-1 font-medium text-gray-700 text-lg">
            User account settings
          </div>

          <div class="flex-1">
            <router-link :to="this.$route.path + '/User'">
              <el-button type="success" class="w-full">Edit user</el-button>
            </router-link>
          </div>
        </div>
      </div>

      <div class="w-full flex-1 flex-col flex items-end gap-y-5 rounded-md">
        <el-button type="primary" class="w-1/3" :disabled="!isEdit" @click="apply">Apply</el-button>
        <el-button class="w-1/3">Cancel</el-button>
      </div>
    </div>

    <div class="mt-5" v-else>
      <div class="font-medium text-gray-500 text-xl">
        Only admin can use settings
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isEdit: false,
      isAdmin: true,
      newSettings: {},
      settings: {
        userEditDetail: true,
        userEditHistory: true,
        userAdd: true,
      },
    };
  },
};
</script>

<style></style>
