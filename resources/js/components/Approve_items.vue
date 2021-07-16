<template>
    <v-app>
        <div>
            <form @submit.prevent="storerelation">
                <v-toolbar color="#1A237E" dark>
                    <router-link to="/Admindash" style="text-decoration:none">
                        <v-btn icon>
                            <v-icon style="font-size:23px"
                                >fa fa-arrow-left</v-icon
                            >
                        </v-btn>
                    </router-link>
                    <v-breadcrumbs :items="items">
                        <template v-slot:divider>
                            <v-icon>mdi-chevron-right</v-icon>
                        </template>
                    </v-breadcrumbs>
                    <v-spacer></v-spacer>
                    <div class="row justify-content-end">
                        <div class="col-sm-5">
                            <select
                                class="custom-select my-1 mr-sm-2"
                                v-model="send.hotel"
                            >
                                <option
                                    v-for="data1 in GetHotel"
                                    :key="data1.id"
                                    v-bind:value="data1.id"
                                    >{{ data1.Hot_name }}</option
                                >
                            </select>
                        </div>
                    </div>
                </v-toolbar>

                <v-card>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Hotel Name</th>
                                    <th scope="col">Work.. Days</th>
                                    <th scope="col">Rooms</th>
                                    <th scope="col">Timings</th>
                                    <th scope="col">Amount</th>

                                    <th scope="col">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="data in fetchAprroveextra"
                                    :key="data.id"
                                >
                                    <td class="no">{{ data.id }}</td>
                                    <td>{{ data.hotel }}</td>
                                    <td>{{ data.days }}</td>
                                    <td>{{ data.rooms }}</td>
                                    <td>{{ data.timings }}</td>
                                    <td>{{ data.amount }}</td>
                                    <td>
                                        <input
                                            type="checkbox"
                                            v-model="send.item"
                                            v-bind:value="data.id"
                                        />
                                    </td>

                                    <!--<td @click="deletehotel(data)">
                                    <v-icon style="color:red;"
                                        >fa fa-times</v-icon
                                    >
                                </td>-->
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align:center">
                            <v-btn
                                id="button"
                                height="45"
                                width="150"
                                color="indigo"
                                type="submit"
                                >submit</v-btn
                            >
                        </div>
                    </div>
                </v-card>
            </form>
        </div>
    </v-app>
</template>
<script>
import Axios from "axios";
export default {
    data: () => ({
        items: [
            {
                text: "𝗗𝗔𝗦𝗛𝗕𝗢𝗔𝗥𝗗",
                disabled: false
            },
            {
                text: "𝗔𝗣𝗣𝗥𝗢𝗩𝗘 𝗜𝗧𝗘𝗠𝗦",
                disabled: false
            }
        ],
        type: ["Vegetarian", "Non Vegetarian"],
        select: null,
        send: {
            hotel: "",
            item: []
        }
    }),
    created() {
        this.$store.dispatch("Adminpart/Approve_extra");
        this.$store.dispatch("Adminpart/gethotel");
    },
    computed: {
        fetchAprroveextra() {
            return this.$store.state.Adminpart.hotelextra;
        },
        GetHotel() {
            return this.$store.state.Adminpart.gethotel;
        }
    },
    methods: {
        storerelation() {
            this.$isLoading(true);
            axios
                .post("http://127.0.0.1:8000/api/relationdata", this.send)
                .then(Response => {
                    this.$isLoading(false);
                    alertify.success(Response.data.msg);
                    location.reload();
                })
                .catch(err => {
                    console.log(err);
                });
        }
        /*deletehotel(data) {
            this.$store.dispatch("Adminpart/DeleteAppHotel", {
                id: data.id
            });
            let i = this.fetchAprrovedHotel
                .map(data => data.id)
                .indexOf(data.id);
            this.fetchAprrovedHotel.splice(i, 1);
        }*/
    },
    mounted() {
        var email = sessionStorage.getItem("email");
        if (email == null) {
            this.$router.push({ path: "Adminlog" });
        }
    }
};
</script>
<style scoped>
.table th {
    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
        sans-serif;
    background-color: #c5cae9;
}
.table td {
    font-family: Bahnschrift Light;
    height: 60px;
}
.no {
    font-weight: bold;
}
#button {
    color: white;
    margin-bottom: 20px;
}
</style>
