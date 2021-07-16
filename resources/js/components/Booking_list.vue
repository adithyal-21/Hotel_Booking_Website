<template>
    <v-app>
        <div>
            <v-toolbar color="#1A237E" dark>
                <router-link to="/Hotel_dash" style="text-decoration:none">
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
                                <th scope="col">Arrival</th>
                                <th scope="col">Total Days</th>
                                <th scope="col">Rooms</th>

                                <th scope="col">Accept</th>
                                <th scope="col">Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="booked in fetchBookings"
                                :key="booked.id"
                            >
                                <td class="no">{{ booked.id }}</td>
                                <td>{{ booked.name }}</td>
                                <td>{{ booked.email }}</td>
                                <td>{{ booked.phone }}</td>
                                <td>{{ booked.arrival }}</td>
                                <td>{{ booked.days }}</td>
                                <td>{{ booked.rooms }}</td>

                                <td v-if="booked.status == 0">
                                    <v-icon
                                        style="color:green"
                                        @click="setstatus(booked)"
                                        >fa fa-check</v-icon
                                    >
                                </td>
                                <td v-else>
                                    <v-icon disabled style="color:green"
                                        >fa fa-check</v-icon
                                    >
                                </td>
                                <td>
                                    <v-icon
                                        style="color:red"
                                        @click="deleteBooking(booked)"
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
                text: "𝗕𝗢𝗢𝗞𝗜𝗡𝗚 𝗟𝗜𝗦𝗧",
                disabled: false
            }
        ],
        booked: {}
    }),
    methods: {
        setstatus(booked) {
            this.$store.dispatch("Adminpart/bookingstatus", {
                id1: booked.id
            });
        },
        deleteBooking(booked) {
            this.$store.dispatch("Adminpart/DeleteBooking", {
                id2: booked.id
            });
            let i = this.fetchBookings
                .map(booked => booked.id)
                .indexOf(booked.id);
            this.fetchBookings.splice(i, 1);
        }
    },
    created() {
        this.$store.dispatch("Adminpart/Bookinglist", {
            id: `${sessionStorage.getItem("hotelid")}`
        });
    },
    computed: {
        fetchBookings() {
            return this.$store.state.Adminpart.booking;
        }
    },
    mounted() {
        var id = sessionStorage.getItem("hotelid");
        if (id == null) {
            this.$router.push("/Hotel_login");
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
