import { mapState, mapMutations } from 'vuex'
const myPlugins = {
    install(Vue){
        Vue.mixin({
            data: () => ({
                    
            }),
            computed: {
                ...mapState([
                    'userInfo',
                    'leaderInfo',
                    'login_designation',
                    'time'
                ])
            },
            methods: {
                ...mapMutations([
                    'CHANGE_USER_INFO',
                    'CHANGE_LEADER_INFO',
                    'CHANGE_TIME_INFO'
                ])
             
            },
        })
    }
}
 
export default myPlugins