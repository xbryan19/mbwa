<template>
<div class="ml-3 mr-3 mt-3 mb-3">
    <!-- userInfo:{{userInfo}} -->
    <v-layout align-center justify-center>
        <v-card class="elevation-1" style="border:1px solid grey" width="100%">
            <v-card-text>
                <form class="ma-5">
                    <!-- <v-row>
                        <v-col cols="4" sm="1" md="1">
                            <span class="caption mx-auto" hide-details>TEAM</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-select readonly outlined dense hide-details></v-select>
                        </v-col>
                        <v-col cols="4" sm="3" md="3">
                            <span class="caption mx-auto" hide-details>INCHARGE</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-text-field outlined dense hide-details readonly></v-text-field>
                        </v-col>
                        <v-col cols="4" sm="3" md="3">
                            <span class="caption mx-auto" hide-details>DATE</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-select outlined dense hide-details readonly></v-select>
                        </v-col>
                        <v-col cols="4" sm="3" md="3">
                            <span class="caption mx-auto" hide-details>YEAR</span>
                        </v-col>
                        <v-col cols="8" sm="9" md="9">
                            <v-text-field outlined dense hide-details readonly></v-text-field>
                        </v-col>

                        <v-col cols="12" sm="12" md="12">
                            <v-simple-table style="border: 1px solid black">
                            </v-simple-table>
                        </v-col>

                        <v-row justify="end">

                        </v-row>
                    </v-row> -->
                    <v-row dense>
                        <div>
                            <div>
                                <v-row dense>
                                    <v-col cols="3" style="padding: 15px 0;">
                                        <span class="caption mx-auto" hide-details>TEAM</span>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field outlined dense hide-details readonly></v-text-field>
                                    </v-col>
                                </v-row>
                            </div>
                            <div class="mt-n2">
                                <v-row dense>
                                    <v-col cols="3" style="padding: 15px 0;">
                                        <span class="caption mx-auto" hide-details>IN CHANGE</span>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field outlined dense hide-details readonly></v-text-field>
                                    </v-col>
                                </v-row>
                            </div>
                            <div class="mt-n2">
                                <v-row dense>
                                    <v-col cols="3" style="padding: 15px 0;">
                                        <span class="caption mx-auto" hide-details>DATE</span>
                                    </v-col>
                                    <v-col cols="4">
                                        <v-text-field outlined dense hide-details readonly></v-text-field>
                                    </v-col>
                                    <v-col cols="2" style="text-align:right; padding: 15px 0;">
                                        <span class="caption mx-auto" hide-details>YEAR</span>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field outlined dense hide-details readonly></v-text-field>
                                    </v-col>
                                </v-row>
                            </div>
                        </div>

                        <v-spacer></v-spacer>

                        <div>
                            <v-btn>PDF</v-btn>
                        </div>
                    </v-row>

                    <div class="mt-5">
                        <v-simple-table style="border:1px solid black">
                            <t-head>
                                <tr>
                                    <th>MORNING</th>
                                </tr>
                            </t-head>
                            <t-body>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            </t-body>
                        </v-simple-table>
                    </div>

                </form>

            </v-card-text>
            <v-card-actions>
                <v-row justify="center">
                </v-row>
            </v-card-actions>
        </v-card>
    </v-layout>
</div>
</template>
