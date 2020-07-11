<template>
<div class="ml-3 mr-3 mt-3 mb-3">
    <!-- userInfo:{{userInfo}} -->
    <v-layout align-center justify-center>
        <v-card class="elevation-1" style="border:1px solid grey">
            <v-card-text>
                <form class="ma-5">
                    <v-row>
                        <v-col cols="4" sm="3" md="3">
                            <span class="title mx-auto" hide-details>SECTION</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-text-field readonly outlined dense hide-details v-model="$store.state.userInfo.SectionsName"></v-text-field>
                        </v-col>
                        <v-col cols="4" sm="3" md="3">
                            <span class="title mx-auto" hide-details>TEAM</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-text-field readonly outlined dense hide-details v-model="$store.state.userInfo.TeamName"></v-text-field>
                        </v-col>
                        <v-col cols="4" sm="3" md="3">
                            <span class="title mx-auto" hide-details>DATE</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-text-field outlined dense hide-details v-model="date" readonly></v-text-field>
                        </v-col>
                        <v-col cols="4" sm="3" md="3">
                            <span class="title mx-auto" hide-details>PART OF DAY</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-text-field outlined dense hide-details v-model="partofday.day"  readonly></v-text-field>
                        </v-col>

                        <v-col cols="12" sm="12" md="12">
                            <v-simple-table style="border: 1px solid black">
                                <thead style="background-color: #26A69A;">
                                    <tr>
                                        <th style="border-right: 1px solid black;color:white">CHECK POINTS</th>
                                        <th style="color:white;text-align:center">FINDINGS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, i) in checkpoints" :key="i" @click="chckDialog(item,i)">
                                        <td style="border-right: 1px solid black">{{item.Checkpoints}}</td>
                                        <td style="text-align:center"> 
                                            <v-icon v-show="members2[i][0].sumbit == true" :color="members2[i].filter(rec=>{return rec.selected == true}).length > 0 ? 'red' : 'green'">
                                                {{members2[i].filter(rec=>{return rec.selected == true}).length > 0 ? 'mdi-close' : 'mdi-check'}}
                                            </v-icon>
                                            <!-- <v-checkbox style="margin-left: auto;margin-right: auto;width: 10%;" v-model="findings" :value="item.Checkpoints"></v-checkbox> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </v-simple-table>
                        </v-col>
                        <!-- <v-text-field prepend-icon="mdi-account" type="text" v-model="user" label="Username" @keyup.enter="onLogin()"></v-text-field> -->

                        <v-row justify="end">
                            <v-btn x-large color="#26A69A" class="font-weight-bold mr-7"  @click="submit()" :disabled="submitCP.filter(rec=>{return rec == 1}).length != 6">SUBMIT</v-btn>
                        </v-row>
                    </v-row>
                </form>
            </v-card-text>
            <v-card-actions>
                <v-row justify="center">
                    <!-- <v-btn width="300" class="ml-3 mr-3" rounded outlined @click="onLogin()">Login</v-btn><br><br> -->
                    <!-- <v-btn text class="font-weight-light heading layout column align-center">Create Account</v-btn>   -->
                </v-row>
            </v-card-actions>
        </v-card>
    </v-layout>
    <!-- <pre>
        {{getMembers}}
    </pre> -->
      
    <v-dialog v-model="checkDialog">
        <v-card>
            <v-card-title class="headline grey lighten-2" primary-title>
                <v-spacer></v-spacer>
                <v-card flat>
                    <v-card-text style="font-size: 20px">
                        <span>{{findings.Checkpoints}}</span>
                    </v-card-text>
                </v-card>
                <v-spacer></v-spacer>

            </v-card-title>
                <!-- {{members2[selectedCheckpoint][0]}} -->
            <v-card-text>
                <v-simple-table fixed-header>
                    <thead>
                        <tr>
                            <th></th>
                            <th style="align-text:center">NICKNAME</th>
                            <th style="align-text:center">FULLNAME</th>
                            <th style="align-text:center">REMARKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(items, i) in members2[selectedCheckpoint]" :key="i">
                            <td>
                                <v-checkbox v-model="items.selected" ></v-checkbox>
                            </td>
                            <td>{{items.NickName}}</td>
                            <td>{{items.FirstName}} {{items.LastName}}</td>
                            <td>
                                <v-text-field v-model="items.remarks" :disabled="!items.selected">
                                </v-text-field>
                                <!-- <v-text-field v-else readonly></v-text-field> -->
                            </td>
                        </tr>
                    </tbody>
                </v-simple-table>
            </v-card-text>
          
            <v-divider>
            </v-divider>

            <v-card-actions>
                <v-btn color="primary" @click="checkDialog = false"> 
                    BACK
                </v-btn>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="violators(getMembers),checkDialog = false" v-if="violatorCount > 0">
                    Next
                </v-btn>
                <v-btn color="primary" @click="noviolators(),checkDialog = false" v-else>
                    No Violators
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</div>
</template>

<script>
import moment from 'moment';
import axios from 'axios';
export default {
    data() {
        return {
            checkDialog: false,
            submitDetails: [],
            findings: {},
            partofday: [],
            checkpoints: [],
            members: {},
            date: moment().format("YYYY-MM-DD"),
            members2:[],
            selectedCheckpoint:0,
            submitCP: [0,0,0,0,0,0]
        }
    },
    created() {
        this.getCheckpoint(),
            this.getTime()
        // console.log(this.$store.state.leaderInfo,'meron')
        this.members = this.$store.state.leaderInfo.filter(rec=>{
             rec.selected = false
             return rec
        })

        for(var x=0; x<6; x++){
            let val = JSON.parse(JSON.stringify(this.$store.state.leaderInfo.filter(rec=>{
                rec.selected = false
                rec.remarks = null
                rec.submit = false
                return !rec.EmployeeCode.includes(this.$store.state.leaderInfo[0].EmployeeCode)
            })))
            this.members2.push(val)
        }

    },
    computed: {
        checkSubmit(){
            return this.members2.filter(rec=>{
                return rec[0].submit == true 
            }).length
        },
        violatorCount(){
            return this.members2[this.selectedCheckpoint].filter(rec=>{
                return rec.selected === true
            }).length
        },
        getMembers() {
            return this.members2[this.selectedCheckpoint].filter(rec => {
                return !rec.EmployeeCode.includes(this.$store.state.leaderInfo[0].EmployeeCode)
            })
        }
    },
    methods: {
        violators(val){
            // console.log(val.filter(rec=>{return rec.selected === true}))
            this.members2[this.selectedCheckpoint][0].sumbit = true
            this.submitCP[this.selectedCheckpoint] = 1
        },
        noviolators(){
            this.members2[this.selectedCheckpoint][0].sumbit = true
            this.submitCP[this.selectedCheckpoint] = 1
        },
        chckDialog(val,i) {
            this.selectedCheckpoint = i
            this.findings = val
            this.checkDialog = true
        },
        submit() {
            let OverallFindings = this.members2.map(rec=>{
                return rec.filter(r=>{
                    return r.selected == true
                }).length
            })

            let StaffFindings = this.members2.map(rec=>{
                return rec.filter(r=>{
                    return r.selected == true
                })
            })
            // console.log(OverallFindings)
            // console.log(StaffFindings)
            var sectionName = this.$store.state.userInfo.SectionsName
            var teamName = this.$store.state.userInfo.TeamName
            var Time = this.$store.state.time[0].Time
            // console.log(Time)
            var controlno = this.date.replaceAll("-","")+'-'+(teamName.substr(21,5).replace("-","")+"-"+this.partofday.dayNum)
            // console.log(this.userInfo.EmployeeCode)
            this.submitDetails = {
                date: this.date,
                sectionName,
                teamName,
                Time,
                partofday: this.partofday,
                controlno,
                user: this.userInfo.EmployeeCode,
                OverallFindings,
                StaffFindings
            }
            // console.log(this.submitDetails)
           
            axios.post('api/submitFindings', this.submitDetails).then(res => {
                console.log(res.data)
            }).catch((e) => {
                console.log(e)
            })
        },
        getTime() {
            axios.get('api/getTime').then(res => {
                this.$store.commit('CHANGE_TIME_INFO', res.data)
                var d = res.data;
                this.$store.state.time[0].Time = moment(d[0].Time, "HH:mm:ss").format("hh:mm A")
                // console.log(this.$store.state.time)
            })
            // console.log(this.$store.state.time, 'time')

            // if (this.$store.state.time[0].Time >= '06:30:00' && this.$store.state.time[0].Time <= '11:00:59') {
            //     this.partofday = 'Morning' 
            // }else if(this.$store.state.time[0].Time >= '11:01:00' && this.$store.state.time[0].Time <= '14:00:00'){
            //     this.partofday = 'After Break'
            // }else {
            //     this.partofday = 'After Noon'
            // }

            if (this.$store.state.time[0].Time >= '06:30:00' && this.$store.state.time[0].Time <= '11:00:59') {
                this.partofday = {
                    day: 'Morning',
                    dayNum: 1
                } 
            } else if (this.$store.state.time[0].Time >= '11:01:00' && this.$store.state.time[0].Time <= '14:00:00') {
                this.partofday = {
                    day: 'After Break',
                    dayNum: 2
                } 
            } else {
                this.partofday = {
                    day: 'After Noon',
                    dayNum: 3
                }
            }

            console.log(this.partofday,'time')

        },
        getCheckpoint() {
            axios.get('api/getCheckpoint').then(res => {
                // console.log(res.data)
                this.checkpoints = res.data
            })
        },
        // getTime() {
        //     axios.get('api/getTime').then(res => {
        //             var d = res.data; // for now
        //             // this.time = res.data
        //             // console.log(this.time)
        //             this.time = moment(d[0].Time, "HH:mm:ss").format("hh:mm A")
        //             console.log(this.time)

        //     })
        // }
    }

}
</script>
