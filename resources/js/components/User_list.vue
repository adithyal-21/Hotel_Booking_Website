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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="info1 in data" :key="info1.id">
                                <td class="no">{{ info1.id }}</td>
                                <td>{{ info1.name }}</td>
                                <td>{{ info1.email }}</td>
                                <td>{{ info1.phone }}</td>
                                <td>
                                    <v-icon
                                        style="color:red"
                                        @click="deleteuser(info1)"
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
                text: "𝗨𝗦𝗘𝗥 𝗟𝗜𝗦𝗧",
                disabled: false
            }
        ],
        data: {}
    }),
    methods: {
        deleteuser(info1) {
            axios
                .delete(`http://127.0.0.1:8000/api/Delete_user/${info1.id}`)
                .then(response => {
                    swal({
                        title: "Done",
                        text: response.data.msg,
                        icon: "success",
                        button: "OK"
                    });
                    location.reload();
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        this.$isLoading(true);
        axios.get("http://127.0.0.1:8000/api/user_list").then(Response => {
            if (Response.data.data1.length == 0) {
                alertify.error("No User Registered Yet ");
            }
            this.$isLoading(false);
            this.data = Response.data.data1;
        });
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
