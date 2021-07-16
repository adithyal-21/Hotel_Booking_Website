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
                    >Admin Dashboard
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon @click="logout" style="margin-left:10px;">
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
                        <v-avatar>
                            <v-img src="admin1.png"></v-img>
                        </v-avatar>

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
                            <v-icon>mdi-account-group</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/user_list"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>User List </v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-table</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/hotel_list"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title
                                >Hotel List</v-list-item-title
                            > </router-link
                        >&nbsp;&nbsp;&nbsp;
                        <span class="badge badge-danger">{{ pending }}</span>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-alert-octagon-outline</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/approve_items"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Approve Items</v-list-item-title>
                        </router-link>
                        &nbsp;&nbsp;&nbsp;
                        <span class="badge badge-danger">{{ pending1 }}</span>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-checkbox-marked-circle-outline</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/Approved_hotel"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title
                                >Approved Hotel</v-list-item-title
                            >
                        </router-link>
                    </v-list-item>
                </v-list> </v-navigation-drawer
            ><br />
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
                                <p class="count1">Hotel Count</p>
                                <p class="count">
                                    {{ hotel }}
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
                                <label id="label">Hotel Count:</label>
                                <v-progress-linear
                                    v-model="hotel"
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
                                        <label id="label">Hotel Count:</label
                                        ><br /><br />
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="155"
                                            :width="25"
                                            :value="hotel"
                                            color="#0277BD"
                                        >
                                            {{ hotel }}
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
        book: "",
        hotel: "",
        user: "",
        pending: "",
        pending1: "",
        hotel1: "",
        book1: "",
        user1: "",
        name: sessionStorage.getItem("name")
    }),

    watch: {
        group() {
            this.drawer = false;
        }
    },
    mounted() {
        var email = sessionStorage.getItem("email");
        if (email == null) {
            this.$router.push({ path: "Adminlog" });
        }
    },
    methods: {
        logout() {
            sessionStorage.removeItem("name");
            sessionStorage.removeItem("email");
            this.$router.push("/");
        }
    },
    created() {
        axios.get("http://127.0.0.1:8000/api/getcount").then(res => {
            this.book = res.data.book;
            this.hotel = res.data.hotel;
            this.user = res.data.user;
            this.pending = res.data.pending;
            this.pending1 = res.data.pending1;
            this.hotel1 = this.hotel / 100;
            this.book1 = this.book / 100;
            this.user1 = this.user / 100;
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
    margin-left: -30px;
}
#head {
    font-family: Bahnschrift SemiBold;
    font-size: 25px;
    position: relative;
    left: 70px;
    color: #3949ab;
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
</style>
