<template>
    <v-app>
        <div>
            <v-toolbar color="#1A237E" dark>
                <router-link to="/Admindash" style="text-decoration:none">
                    <v-btn icon>
                        <v-icon style="font-size:23px">fa fa-arrow-left</v-icon>
                    </v-btn>
                </router-link>
                <v-breadcrumbs :items="items">
                    <template v-slot:divider>
                        <v-icon>mdi-chevron-right</v-icon>
                    </template>
                </v-breadcrumbs>
            </v-toolbar>
            <v-card>
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Hotel Loc..</th>
                                <th scope="col">Hotel Add..</th>
                                <th scope="col">Owner Name</th>
                                <th scope="col">Owner Email</th>
                                <th scope="col">Owner Phone</th>
                                <th scope="col">Accept</th>
                                <th scope="col">Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="c in getAllCategory" :key="c.id">
                                <td class="no">{{ c.id }}</td>
                                <td>{{ c.Hot_name }}</td>
                                <td>{{ c.Hot_loc }}</td>
                                <td>{{ c.Hot_address }}</td>
                                <td>{{ c.name }}</td>
                                <td>{{ c.email }}</td>
                                <td>{{ c.phone }}</td>

                                <td @click="setstatus(c)">
                                    <v-icon style="color:green"
                                        >fa fa-check</v-icon
                                    >
                                </td>
                                <td @click="deleteHotel(c)">
                                    <v-icon style="color:red"
                                        >fa fa-times</v-icon
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </v-card>
        </div>
    </v-app>
</template>
<script>
export default {
    data: () => ({
        items: [
            {
                text: "𝗗𝗔𝗦𝗛𝗕𝗢𝗔𝗥𝗗",
                disabled: false
            },
            {
                text: "𝗛𝗢𝗧𝗘𝗟 𝗟𝗜𝗦𝗧",
                disabled: false
            }
        ]
    }),
    created() {
        this.$store.dispatch("Adminpart/FetchHotel");
    },
    computed: {
        getAllCategory() {
            return this.$store.state.Adminpart.fetchotel;
        }
    },
    methods: {
        setstatus(c) {
            this.$store.dispatch("Adminpart/changestatus", {
                id1: c.id
            });
            let i = this.getAllCategory.map(c => c.id).indexOf(c.id);
            this.getAllCategory.splice(i, 1);
        },
        deleteHotel(c) {
            this.$store.dispatch("Adminpart/DeleteHotel", {
                id2: c.id
            });
            let i = this.getAllCategory.map(c => c.id).indexOf(c.id);
            this.getAllCategory.splice(i, 1);
        }
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
</style>
