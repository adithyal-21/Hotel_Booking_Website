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
                                <th scope="col">Own. Name</th>
                                <th scope="col">Own. Email</th>
                                <th scope="col">Own. Phone</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="data in fetchAprrovedHotel"
                                :key="data.id"
                            >
                                <td class="no">{{ data.id }}</td>
                                <td>{{ data.Hot_name }}</td>
                                <td>{{ data.Hot_loc }}</td>
                                <td>{{ data.Hot_address }}</td>
                                <td>{{ data.name }}</td>
                                <td>{{ data.email }}</td>
                                <td>{{ data.phone }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'Hotel_edit',
                                            params: { id: data.id }
                                        }"
                                    >
                                        <v-icon style="color:green"
                                            >fa fa-edit</v-icon
                                        >
                                    </router-link>
                                </td>
                                <td @click="deletehotel(data)">
                                    <v-icon style="color:red;"
                                        >fa fa-trash</v-icon
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
                text: "𝗔𝗣𝗣𝗥𝗢𝗩𝗘𝗗 𝗛𝗢𝗧𝗘𝗟",
                disabled: false
            }
        ]
    }),
    created() {
        this.$store.dispatch("Adminpart/ApprovedHotel");
    },
    computed: {
        fetchAprrovedHotel() {
            return this.$store.state.Adminpart.Apphotel;
        }
    },
    methods: {
        deletehotel(data) {
            this.$store.dispatch("Adminpart/DeleteAppHotel", {
                id: data.id
            });
            let i = this.fetchAprrovedHotel
                .map(data => data.id)
                .indexOf(data.id);
            this.fetchAprrovedHotel.splice(i, 1);
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
