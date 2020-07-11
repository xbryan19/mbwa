<template>
<v-app id="inspire">
    <Nav v-if="confirmed"/>
    <v-content>
        <router-view></router-view>
    </v-content>
</v-app>
</template>

<script>
import Nav from './Navbar.vue'
export default {
    components: {
        Nav
    },
    data() {
        return {
            confirmed: false
        }
    },
    watch: {
        userInfo(val) {
            console.log(val)
            this.authenticate()
        }
    },
    created() {
        this.authenticate()
    },
    methods: {
        authenticate() {
            if (this.$store.state.userInfo.EmployeeCode != undefined) {
                this.confirmed = true
            } else {
                this.confirmed = false
            }
        }
    }
   
}
</script>
