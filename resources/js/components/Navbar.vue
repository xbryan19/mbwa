<template>
<div id="inspire">
    <v-app-bar clipped-left app color="#26A69A">
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
            <img src='img/MBWA1.png' width="200px" height="50px" :aspect-ratio="8/8">
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <!-- <span style="color:#FFFFFF;font-size: 20px">{{$store.state.time}}</span> -->
        <v-btn icon>
            <v-icon @click="logout()">mdi-logout</v-icon>
        </v-btn>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" clipped app>
        <template v-slot:prepend>
            <v-list>
                <div class="text-center">
                    <v-avatar size="90">
                        <img aspect-ratio="1" :src="imageUrl">
                    </v-avatar>
                </div>
                <v-list-item two-line style="text-align: center">
                    <v-list-item-content v-if="userInfo.FirstName">
                        <v-list-item-title class="title">{{userInfo.NickName}}</v-list-item-title>
                        <v-list-item-subtitle class="title">{{userInfo.PostionName}}</v-list-item-subtitle>
                        <!-- <v-list-item-subtitle>{{userInfo.section}}</v-list-item-subtitle> -->
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-divider color="white"></v-divider>
            <!-- {{userInfo}} -->
        </template>
        <!-- <v-list > -->
        <v-list v-if="$store.state.login_designation == 'Section Head' || $store.state.login_designation == 'Team Head'">
            <v-list-item-title class="ml-5">
                <h1 class="font-weight-bold headline" style="color: #424242">Menu</h1>
            </v-list-item-title>
            <!-- <template v-for="cheks in chek">
                <v-list-item-content :key="cheks.text" :to="cheks.to">
                    <v-list-item-title>
                        {{cheks.text}}
                    </v-list-item-title>
                </v-list-item-content>
            </template> -->
            <template v-for="cheks in chek" :to="cheks.to" style="text-decoration: none;">
                <v-list-item :to="cheks.to" :key="cheks.text" style="text-decoration: none;">
                    <v-list-item-action>
                        <v-icon>{{ cheks.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>
                            {{ cheks.text }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </template>

            <template v-for="item in items">
                <v-list-group v-if="$store.state.login_designation == 'Section Head'" :key="item.text" v-model="item.model" :prepend-icon="item.model ? item.icon : item['icon-alt']" append-icon="">
                    <!-- <v-list-item-title class="ml-5">
                </v-list-item-title> -->
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title>
                                {{item.text}}
                            </v-list-item-title>
                        </v-list-item-content>
                    </template>
                    <template v-for="(child,i) in itemInfo">
                        <v-list-item :key="i.TeamCode" :to="child.to">
                            <v-list-item-action>
                                <v-icon>{{ child.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>
                                    {{ child.TeamCode }}
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </template>
                </v-list-group>
                <!-- <v-list-item v-else :key="item.text" :to="item.to">
                    <v-list-item-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>
                            {{ item.text }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item> -->
                <!-- <v-divider color="white"></v-divider> -->
            </template>
        </v-list>
        <!----------------------- REPORTS -------------------------->
        <v-list>
            <v-list-item-title class="ml-5">
                <h1 class="headline font-weight-bold" style="color: #424242;">Reports</h1>
            </v-list-item-title>
            <template v-for="item2 in items2" :to="item2.to" style="text-decoration: none;">
                <!-- <v-list-group v-else-if="item.children" :key="item.text" v-model="item.model" :prepend-icon="item.model ? item.icon : item['icon-alt']" append-icon="">
                    <v-list-item-title class="ml-5">
                        <h1 class="subtitle-1 font-weight-bold" style="color: #424242;">Confirm</h1>
                    </v-list-item-title>
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title>
                                {{ item.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </template>

                    <v-list-item v-for="(child, i) in item.children" :key="i" link>
                        <v-list-item-action v-if="child.icon">
                            <v-icon>{{ child.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                {{ child.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group> -->
                <v-list-item :to="item2.to" :key="item2.text" style="text-decoration: none;">
                    <v-list-item-action>
                        <v-icon>{{ item2.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>
                            {{ item2.text }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </template>
        </v-list>
        <!-- {{Info[0].DesignationName == 'Section Head' || Info[0].DesignationName == 'Team Head' }} -->
    </v-navigation-drawer>
</div>
</template>

<script>
import moment from 'moment'
export default {
    props: {
        source: String,
    },
    data: () => ({
        dialog: false,
        drawer: null,
        chek: [{
            icon: 'mdi-check',
            text: 'CHECK',
            to: 'check',
        }, ],
        items: [{
            text: 'CONFIRM',
            to: 'check-all',
            icon: 'mdi-chevron-up',
            'icon-alt': 'mdi-chevron-down',
            model: false,
        }, ],
        items2: [{
                icon: 'mdi-file-chart',
                text: 'MBWA REPORT',
                to: 'report'
            },
            {
                icon: 'mdi-clipboard-list',
                text: 'MBWA SUMMARY',
                to: 'summary'
            }
        ],
        itemInfo: [{
            icon: 'mdi-chevron-up'
        }],
        // Info: []
    }),
    computed: {
        imageUrl() {
            if (this.$store.state.userInfo.Gender == 'F') {
                return `img/female.png`
            } else if (this.$store.state.userInfo.Gender == 'M') {
                return `img/male.png`
            } else {
                return `img/default.png`
            }
        },

        // filterLogin(){
        //     return this.$store.state.leaderInfo.filter(rec => {  return rec.EmployeeCode === this.userInfo.EmployeeCode  }).map(data => { return data.DesignationName})
        // }
    },
    created() {
        // this.test()
        this.getTeam()
        // this.filterInfo()
    },
    methods: {
        // filterInfo() {
        //     this.Info = this.$store.state.leaderInfo.filter(rec => {  return rec.EmployeeCode === this.userInfo.EmployeeCode  })
        //     console.log(this.Info)
        // },
        // test() {
        //     axios.get('api/getInfo?idNum=' + this.$store.state.userInfo.EmployeeCode).then(res => {
        //         // console.log(res.data,'getInfo')
        //         this.$store.commit('CHANGE_LEADER_INFO', res.data)
        //         // console.log(this.$store.state.leaderInfo, '<-=')
        //         this.itemInfo = res.data
        //         // console.log(this.itemInfo,'getINfo')
        //     })
        // },
        getTeam() {
            axios.get('api/getTeam?idNum=' + this.$store.state.userInfo.EmployeeCode).then(res => {
                // console.log(res.data.splice(1,3))
                // console.log(res.data,'team')
                this.itemInfo = res.data.splice(1, 3)
                // console.log(this.itemInfo)
            })
        },
        logout() {
            this.$store.commit('CHANGE_USER_INFO', '')
            this.$store.commit('CHANGE_LEADER_INFO', '')
            this.$router.push('/login')
        }
    }
}
</script>
