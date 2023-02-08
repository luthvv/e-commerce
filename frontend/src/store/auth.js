export default {
    state: {
        userId: localStorage.getItem("id") || "",
        userName: localStorage.getItem("username") || "",
        userRole: localStorage.getItem("role") || "",
        userToken: localStorage.getItem("api_token") || "",
      },
      getters: {
        userName(state){
          return state.userName
        },
        userId(state){
          return state.userId
        },
        userToken(state){
          return state.userToken
        },
        userRole(state){
          return state.userRole
        },
      },
      mutations: { 
        SET_CONTOH(state, isidata) {
          state.dataUser = isidata
        },
      },
      actions: { 
        async dataCollect(context, {dataInfo, data}) {
          localStorage.setItem(dataInfo, data);
        },
      }
  }