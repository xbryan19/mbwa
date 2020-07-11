<template>
<v-container fluid fill-height>
    <v-layout align-center justify-center>
        <!-- <v-card width="450px" class="elevation-1 pa-3" color="rgb(0, 0, 0, 0.4)"> -->
        <v-card width="450px" height="550px" class="elevation-1 pa-3" style="border:1px solid grey">
            <v-card-text>
                <div class="layout column align-center">
                    <img src="img/MBWA.png" alt="Login Logo" width="250" height="250">
                    <!-- <h1 class="flex my-4 black--text font-weight-regular" style="text-align:center"></h1> -->
                </div>

                <!-- {{userData}} -->

                
                <v-form ma-5>
                    <v-text-field prepend-icon="mdi-account" type="text" v-model="user" label="Username" @keyup.enter="onLogin()"></v-text-field>

                    <v-text-field id="password" label="Password" prepend-icon="mdi-lock" type="password" v-model="pass" @keyup.enter="onLogin()"></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-row justify="center">
                    <v-btn width="300" class="ml-3 mr-3" rounded outlined @click="onLogin()">Login</v-btn><br><br>
                    <!-- <v-btn text class="font-weight-light heading layout column align-center">Create Account</v-btn>   -->
                </v-row>
            </v-card-actions>
        </v-card>
    </v-layout>
</v-container>
</template>

<script>
export default {
    data() {
        return {
            user: '',
            pass: '',
            tempInfo: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "bottomRight"
                    },
                    error: {
                        position: "bottomRight"
                    },
                    info: {
                        position: "bottomLeft"
                    },
                }
            },
        }
    },
    created() {
        this.user = ''
        this.pass = ''
    },
    methods: {
        onLogin() {

            // if (this.user == "" || this.pass == "") {
            //     this.$toast.error('Please fill the textbox!', 'Invalid', this.notificationSystem.options.error)
            // } else {
            //     axios.post('api/login', {
                    // user: this.user,
                    // pass: this.pass
            //     }).then(res => {
            //         // console.log(res.data)
            //         if (res.data != "") {
                        // var x = res.data.user
                        // this.CHANGE_USER_INFO(x)
            //             this.$router.push('/home')
                        
            //             this.$toast.success(x[0].name, 'Welcome', this.notificationSystem.options.success)
            //         } else {
            //             this.$toast.error('Unknown user!', 'Invalid', this.notificationSystem.options.error)
            //         }
            //         // console.log(res)
            //     }).catch((e) => {
            //         console.log(e)
            //     })
            // }

            if (this.user == "" || this.pass == "") {
                this.$toast.error('Please fill the fields!!', 'Invalid', this.notificationSystem.options.error)
            } else {
                axios.post('api/login', {
                        user: this.user,
                        pass: this.pass
                    })
                    .then(res => {
                        // var designation = []
                        if (res.data == 'Invalid Credentials!!') {
                            this.$toast.error('Username or Password!!', 'Invalid', this.notificationSystem.options.error)
                        }
                        else  {
                            
                            axios.get('api/getInfo?idNum=' + this.user).then(res => {
                                
                                console.log(res.data.filter(data => {
                                    return data.EmployeeCode == this.user
                                }).map(data => {
                                    return data.DesignationName
                                }))
                                this.$store.commit('CHANGE_LEADER_INFO',{value: res.data, login_desigantion: res.data.filter(data => {
                                    return data.EmployeeCode == this.user
                                    }).map(data => {
                                        return data.DesignationName
                                    })[0]
                                })
                            })

                            this.$store.commit('CHANGE_USER_INFO', res.data[0])

                            this.$router.push({name: 'summary'})
                                this.$toast.success(`${this.$store.state.userInfo.NickName}`, 'Welcome!!', this.notificationSystem.options.success)

                            // this.$store.state.userInfo = res.data[0]
                            // console.log(this.$store.state.userInfo,'store')
                        } 
                        // else {
                        //     this.$toast.error('Username or Password!!', 'Invalid', this.notificationSystem.options.error)
                        // }
                    }).catch((e) => {
                        console.log(e)
                    })

            }

        }
    }
}
</script>
