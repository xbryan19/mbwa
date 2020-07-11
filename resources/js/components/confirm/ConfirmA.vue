<template>
<v-container fluid fill-height>
    <!-- userInfo:{{userInfo}} -->
    <v-layout align-center justify-center>
        <v-card width="70%" height="auto" class="elevation-1 pa-3" style="border:1px solid grey">
            <v-card-text>
                <form class="ma-5">

                    <v-row>
                        <v-col cols="12" sm="3">
                            <span class="title mx-auto" hide-details>SECTION</span>
                        </v-col>
                        <v-col cols="12" sm="9">
                            <v-select outlined dense hide-details></v-select>
                        </v-col>
                        <v-col cols="12" sm="3">
                            <span class="title mx-auto" hide-details>TEAM</span>
                        </v-col>
                        <v-col cols="12" sm="9">
                            <v-select outlined dense hide-details></v-select>
                        </v-col>
                        <v-col cols="12" sm="3">
                            <span class="title mx-auto" hide-details>DATE</span>
                        </v-col>
                        <v-col cols="12" sm="9">
                            <v-select outlined dense hide-details></v-select>
                        </v-col>
                        <v-col cols="12" sm="3">
                            <span class="title mx-auto" hide-details>PART OF DAY</span>
                        </v-col>
                        <v-col cols="12" sm="9">
                            <v-select outlined dense hide-details></v-select>
                        </v-col>

                        <v-col cols="12">
                            <v-simple-table style="border: 1px solid black">
                                <thead style="background-color: #26A69A;">
                                    <tr>
                                        <th style="border-right: 1px solid black;color:white">CHECK POINTS</th>
                                        <th style="color:white">FINDINGS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid black">NO CHATTING IN THE AREA</td>
                                        <td>
                                            <v-icon color="success">mdi-check</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid black">AREA IS CLEAN & PERFORMED 5S</td>
                                        <td>
                                            <v-icon color="red">mdi-close</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid black">PROPER GROOMING WAS OBSERVE</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid black">ALL STAFF ARE IN THEIR WORKING AREA</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid black">ALL STAFF ARE FOCUS ON THEIR WORK</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid black">NO PROBLEM IN THE WORK PLACE/TASK</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </v-simple-table>
                        </v-col>
                        <!-- <v-text-field prepend-icon="mdi-account" type="text" v-model="user" label="Username" @keyup.enter="onLogin()"></v-text-field> -->

                    </v-row>
                    
                    <v-row>
                        <v-spacer></v-spacer>
                        <v-col cols="2">
                            <v-btn x-large color="#26A69A" class="font-weight-bold" dark>SUBMIT</v-btn>
                        </v-col>
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
</v-container>
</template>

<script>
export default {
    data() {
        return {

        }
    }
}
</script>
