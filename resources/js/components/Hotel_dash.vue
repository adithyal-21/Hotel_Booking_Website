<template>
    <v-app>
        <div>
            <v-app-bar dark>
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                ></v-app-bar-nav-icon>

                <v-toolbar-title
                    class="font-weight-medium"
                    style="font-family:Bahnschrift SemiBold;font-size:23px"
                    >Hotel Dashboard
                </v-toolbar-title>

                <v-spacer></v-spacer>
                <v-btn icon @click="logout" style="margin-left:5px;">
                    <v-icon>mdi-logout</v-icon>
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer
                v-model="drawer"
                absolute
                dark
                temporary
                width="280"
                ><br />

                <v-list dense>
                    <v-list-item>
                        <div v-if="data.image2 == null">
                            <v-avatar>
                                <v-img src="hoteldash.jpg"></v-img>
                            </v-avatar>
                        </div>
                        <div v-else>
                            <v-avatar>
                                <v-img :src="'/uploads/' + data.image2"></v-img>
                            </v-avatar>
                        </div>

                        <v-list-item-title>
                            <div v-if="name" id="name">
                                Hi {{ name }}
                            </div></v-list-item-title
                        >
                    </v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list nav dense>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Home</v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-account</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/hotel_profile"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Profile </v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-table</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/Booked_list"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Booked List</v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-help-circle</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/check_status"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Check Status</v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-alert-octagon-outline</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/Book_list"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Pending List</v-list-item-title>
                        </router-link>
                        &nbsp;&nbsp;&nbsp;
                        <span class="badge badge-danger">{{ pending }}</span>
                    </v-list-item>

                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-plus</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/Addhotel_details"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title
                                >Additional Details</v-list-item-title
                            >
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-key</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/change_password"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title
                                >Change Password</v-list-item-title
                            >
                        </router-link>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <form
                        class="form-inline mx-auto "
                        @submit.prevent="updatecount"
                        id="form"
                    >
                        <input
                            class="form-control mr-sm-3"
                            type="text"
                            placeholder=" Room Count Left"
                            v-model="data1.count"
                            required
                        />
                        <v-btn
                            id="button"
                            height="38"
                            width="100"
                            color="#37474F"
                            type="submit"
                            >submit</v-btn
                        >
                    </form>
                </div>
            </nav>
            <br />
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <v-card
                            class="mx-auto"
                            color="#0277BD"
                            dark
                            max-width="400"
                        >
                            <v-card-title>
                                <v-icon large left>
                                    mdi-domain
                                </v-icon>
                            </v-card-title>

                            <v-card-text class="text-h5 font-weight-bold">
                                <p class="count1">Hotel Status</p>
                                <p class="count">
                                    {{ msg }}
                                </p>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-4">
                        <v-card
                            class="mx-auto"
                            color="#0097A7"
                            dark
                            max-width="400"
                        >
                            <v-card-title>
                                <v-icon large left>
                                    mdi-account-group
                                </v-icon>
                            </v-card-title>

                            <v-card-text class="text-h5 font-weight-bold">
                                <p class="count1">User Count</p>
                                <p class="count">
                                    {{ user }}
                                </p>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-4">
                        <v-card
                            class="mx-auto"
                            color="#BA68C8"
                            dark
                            max-width="400"
                        >
                            <v-card-title>
                                <v-icon large left>
                                    mdi-ticket
                                </v-icon>
                            </v-card-title>

                            <v-card-text class="text-h5 font-weight-bold">
                                <p class="count1">Total Booking</p>
                                <p class="count">
                                    {{ book }}
                                </p>
                            </v-card-text>
                        </v-card>
                    </div>
                </div>
            </div>
            <br />
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <v-card class="mx-auto">
                            <div class="container">
                                <label id="label">Pending Count:</label>
                                <v-progress-linear
                                    v-model="pending"
                                    color="#0277BD"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template> </v-progress-linear
                                ><br />
                                <label id="label">User Count:</label>
                                <v-progress-linear
                                    v-model="user"
                                    color="#0097A7"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template> </v-progress-linear
                                ><br />
                                <label id="label">Total Booking:</label>
                                <v-progress-linear
                                    v-model="book"
                                    color="#BA68C8"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template>
                                </v-progress-linear>
                                <br />
                            </div>
                        </v-card>
                    </div>
                    <div class="col-sm-6">
                        <v-card class="mx-auto">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label id="label">Pending Count:</label
                                        ><br /><br />
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="155"
                                            :width="25"
                                            :value="pending"
                                            color="#0277BD"
                                        >
                                            {{ pending }}
                                        </v-progress-circular>
                                        <br /><br />
                                    </div>

                                    <div class="col-sm-4">
                                        <label id="label">User Count:</label
                                        ><br /><br />
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="155"
                                            :width="25"
                                            :value="user"
                                            color="#0097A7"
                                        >
                                            {{ user }}
                                        </v-progress-circular>
                                    </div>
                                    <div class="col-sm-4">
                                        <label id="label">Total Booking:</label
                                        ><br /><br />
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="155"
                                            :width="25"
                                            :value="book"
                                            color="#BA68C8"
                                        >
                                            {{ book }}
                                        </v-progress-circular>
                                    </div>
                                </div>
                            </div>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </v-app>
</template>
<script>
export default {
    data: () => ({
        drawer: false,
        group: null,
        name: sessionStorage.getItem("hotelowner"),
        data1: {},
        data: {},
        msg: "",
        user: "",
        book: "",
        pending: ""
    }),

    watch: {
        group() {
            this.drawer = false;
        }
    },
    mounted() {
        var id = sessionStorage.getItem("hotelid");
        if (id == null) {
            this.$router.push("/Hotel_login");
        }
    },
    methods: {
        logout() {
            sessionStorage.removeItem("hotelowner");
            sessionStorage.removeItem("hotelid");
            sessionStorage.removeItem("hotelemail");
            this.$router.push("/");
        },
        gethotelProfile(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getHotelProfile/${id}`)
                .then(Response => {
                    this.data = Response.data.data1;
                });
        },
        updatecount(id) {
            this.$isLoading(true);
            axios
                .post(
                    `http://127.0.0.1:8000/api/Room_count_upd/${sessionStorage.getItem(
                        "hotelid"
                    )}`,
                    this.data1
                )
                .then(Response => {
                    this.$isLoading(false);
                    alertify.success(Response.data.msg);
                });
        }
    },
    created() {
        this.gethotelProfile(sessionStorage.getItem("hotelid"));
        axios
            .get(
                `http://127.0.0.1:8000/api/getcount_hotel/${sessionStorage.getItem(
                    "hotelowner"
                )}`
            )
            .then(Response => {
                this.msg = Response.data.msg;
            })
            .catch(err => {
                this.msg = "Pending Upload..";
            });
        axios
            .get("http://127.0.0.1:8000/api/getcount_hotel1")
            .then(Response => {
                this.user = Response.data.user;
            });
        axios
            .get(
                `http://127.0.0.1:8000/api/getcount_Booking/${sessionStorage.getItem(
                    "hotelid"
                )}`
            )
            .then(Response => {
                this.book = Response.data.book;
            });
        axios
            .get(
                `http://127.0.0.1:8000/api/pending/${sessionStorage.getItem(
                    "hotelid"
                )}`
            )
            .then(Response => {
                this.pending = Response.data.pending;
            });
    }
};
</script>
<style scoped>
#main:hover {
    text-decoration: none;
    color: inherit;
}
#main {
    text-decoration: none;
    color: inherit;
}
#name {
    font-family: Bahnschrift SemiBold;
    font-size: 18px;
    text-align: center;
    margin-left: -50px;
}
#button {
    color: white;
}
#label {
    font-family: Bahnschrift SemiBold;
}
.count {
    color: white;
    text-align: center;
}
.count1 {
    color: white;
    font-family: Bahnschrift SemiBold;
}
@media (min-width: 300px) and (max-width: 350px) {
    #form {
        margin-top: 20px;
    }
    #button {
        margin-top: 10px;
    }
}
/*meduim mobile phones*/
@media (min-width: 350px) and (max-width: 400px) {
    #form {
        margin-top: 20px;
    }
    #button {
        margin-top: 20px;
    }
}
/*large mobile phones*/
@media (min-width: 400px) and (max-width: 500px) {
    #form {
        margin-top: 20px;
    }
    #button {
        margin-top: 20px;
    }
}
/*tablet*/

/*tablet mode*/
@media (min-width: 600px) and (max-width: 800px) {
    #form {
        margin-top: 20px;
    }
}
</style>
