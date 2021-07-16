<template>
    <v-app>
        <div>
            <v-toolbar color="#1A237E" dark>
                <router-link to="/user_dash" style="text-decoration:none">
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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>

                                <th scope="col">Arrived Date</th>
                                <th scope="col">Total Days</th>
                                <th scope="col">Rooms</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="info in data" :key="info.id">
                                <td class="no">{{ info.id }}</td>
                                <td>{{ info.name }}</td>
                                <td>{{ info.email }}</td>

                                <td>{{ info.arrival }}</td>

                                <td>{{ info.days }}</td>
                                <td>{{ info.rooms }}</td>
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
                text: "𝗕𝗢𝗢𝗞𝗜𝗡𝗚 𝗛𝗜𝗦𝗧𝗢𝗥𝗬 ",
                disabled: false
            }
        ],
        data: {}
    }),
    methods: {
        getbookinghistory(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getbookhistory/${id}`)
                .then(Response => {
                    if (Response.data.data1.length == 0) {
                        alertify.error("No Booking Yet");
                    }

                    this.data = Response.data.data1;
                });
        }
    },
    created() {
        this.getbookinghistory(sessionStorage.getItem("useremail"));
    },
    mounted() {
        var email = sessionStorage.getItem("useremail");
        if (email == null) {
            this.$router.push({ path: "Userlog" });
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
