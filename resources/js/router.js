import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';
Vue.use(VueRouter);

let router = new VueRouter({
    routes: [
        {
            path: '*',
            name: 'not_found',
            component: () => import('./components/NotFound.vue')
        },
        {
            path: '/summary',
            name: 'summary',
            component: () => import('./components/Summary.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('./components/Login.vue')
        },
        {
            path: '/report',
            name: 'report',
            component: () => import('./components/Report.vue')
        },
        {
            path: '/confirma',
            name: 'confirma',
            component: () => import('./components/confirm/ConfirmA.vue')
        },
        {
            path: '/check',
            name: 'check',
            beforeEnter: (to, from, next) => {
              // console.log(store.state.userInfo)
              var a = store.state.leaderInfo.filter(rec => {
                  return rec.EmployeeCode == store.state.userInfo.EmployeeCode
                })
              if(a[0].DesignationName == 'Team Head' || a[0].DesignationName == 'Section Head' ){
                next()
              } else {
                next({name: 'not_found'}) 
              }
            },
            component: () => import('./components/Check.vue')
        },
        {
            path: '/confirmb',
            name: 'confirmb',
            component: () => import('./components/confirm/ConfirmB.vue')
        },
        {
            path: '/confirmc',
            name: 'confirmc',
            component: () => import('./components/confirm/ConfirmC.vue')
        }

    ],
    mode: 'history'
    
});
router.beforeEach((to, from, next) => {
    if (to.path !== '/login') {
      if (store.state.userInfo.EmployeeCode != undefined) {
        next()
      } else {
        next({name: 'login'})
      }
    }else if(store.state.userInfo.EmployeeCode != undefined){
      // console.log('asdasd')
        next({ component: () => import('./components/Navbar.vue') })
    }else {
      // console.log('here')
        next()
    }

    // if (to.path !== '/login') {
    //   if (store.state.userInfo.EmployeeCode != undefined ) {
    //     next()
    //   }else {
    //     next({name: 'login'})
    //   }
    // }else if(store.state.userInfo.EmployeeCode != undefined){
    //   // console.log('asdasd')
    //     next({ name: 'check' })
    // }else {
    //   // console.log('here')
    //     next()
    // }
  })
   
export default router

