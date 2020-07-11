import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import router from './router'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    userInfo: {}, // default empty object
    leaderInfo: {},
    login_designation: '',
    time: 0
  },
  mutations: {
    CHANGE_USER_INFO: (state, data) =>{
      
      state.userInfo =  data
      if(data = ''){
        localStorage.clear()
      }
      
    },
    CHANGE_LEADER_INFO: (state, data) => {
      state.leaderInfo = data.value
      state.login_designation = data.login_desigantion
    },
    CHANGE_TIME_INFO: (state, data) => {
      state.time = data
    }
  },
  actions: {
   
  },
  //save to web storage
  plugins : [createPersistedState()]
})