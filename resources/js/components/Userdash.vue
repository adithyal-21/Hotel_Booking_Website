<template>
    <v-app>
        <div>
            <v-app-bar color="#212121" dark>
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                ></v-app-bar-nav-icon>

                <v-toolbar-title
                    class="font-weight-medium"
                    style="font-family:Bahnschrift SemiBold;font-size:23px"
                    >User Dashboard
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon @click="logout" style="margin-left:10px">
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

                <v-list>
                    <v-list-item dense>
                        <v-avatar>
                            <v-img src="user2.jpg"></v-img>
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
                            <v-icon>mdi-account</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/user_profile"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Profile </v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-map-marker</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/search_hotel"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>Search Hotel</v-list-item-title>
                        </router-link>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-history</v-icon>
                        </v-list-item-icon>
                        <router-link
                            to="/Book_history"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title
                                >Booking History</v-list-item-title
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
                            color="#BA68C8"
                            dark
                            max-width="400"
                            height="245"
                        >
                            <v-card-title>
                                <v-icon large left>
                                    mdi-domain
                                </v-icon>
                            </v-card-title>

                            <v-card-text class="text-h5 font-weight-bold">
                                <p class="count1">
                                    Total Hotels
                                </p>
                                <p class="count">{{ hotel }}</p>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-4">
                        <v-card
                            class="mx-auto"
                            color="#0097A7"
                            dark
                            max-width="400"
                            height="245"
                        >
                            <v-card-title>
                                <v-icon large left>
                                    mdi-ticket
                                </v-icon>
                            </v-card-title>

                            <v-card-text class="text-h5 font-weight-bold">
                                <p class="count1">
                                    Total Bookings
                                </p>
                                <p class="count">{{ book }}</p>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-4">
                        <v-card
                            class="mx-auto"
                            color="#0277BD"
                            dark
                            max-width="400"
                        >
                            <v-card-title>
                                <v-icon large left>
                                    mdi-alpha-i-circle
                                </v-icon>
                            </v-card-title>

                            <v-card-text class="text-h5 font-weight-bold">
                                <p class="count1">Instructions</p>
                                <p class="count2">
                                    Here You Can Search The Hotel And Then Book
                                    The Hotel Of Your Wish. If Booked You will
                                    Receive Mail from That Hotel.
                                </p>
                            </v-card-text>
                        </v-card>
                    </div>
                </div>
            </div>
            <br />
            <!--<div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <v-card class="mx-auto">
                            <div class="container">
                                <label class="label1">General Count:</label>
                                <v-divider></v-divider>
                                <label id="label">Booking Count:</label>
                                <v-progress-linear
                                    v-model="book"
                                    color="#0097A7"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template> </v-progress-linear
                                ><br />
                                <label id="label">Total Hotel:</label>
                                <v-progress-linear
                                    v-model="hotel"
                                    color="#BA68C8"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template>
                                </v-progress-linear>
                                <br /><br />
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label id="label"
                                                >Total Bookings:</label
                                            ><br /><br />
                                            <v-progress-circular
                                                :rotate="360"
                                                :size="155"
                                                :width="25"
                                                :value="book"
                                                color="#0097A7"
                                            >
                                                {{ book }}
                                            </v-progress-circular>
                                        </div>
                                        <div class="col-sm-4">
                                            <label id="label"
                                                >Total Hotel:</label
                                            ><br /><br />
                                            <v-progress-circular
                                                :rotate="360"
                                                :size="155"
                                                :width="25"
                                                :value="hotel"
                                                color="#BA68C8"
                                            >
                                                {{ hotel }}
                                            </v-progress-circular>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </v-card>
                    </div>
                </div>
            </div>-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <v-card class="mx-auto">
                            <div class="container">
                                <br />
                                <label id="label">Total Hotels:</label>
                                <v-progress-linear
                                    v-model="hotel"
                                    color="#0277BD"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template> </v-progress-linear
                                ><br />
                                <label id="label">Your Bookings:</label>
                                <v-progress-linear
                                    v-model="book"
                                    color="#0097A7"
                                    height="25"
                                >
                                    <template v-slot:default="{ value }">
                                        <strong>{{ value }}%</strong>
                                    </template> </v-progress-linear
                                ><br />
                                <label id="label">Total Bookings:</label>
                                <v-progress-linear
                                    v-model="book1"
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
                            <br />
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label id="label">Total Hotels:</label
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
                                        <label id="label">Your Booking:</label
                                        ><br /><br />
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="155"
                                            :width="25"
                                            :value="book"
                                            color="#0097A7"
                                        >
                                            {{ book }}
                                        </v-progress-circular>
                                    </div>
                                    <div class="col-sm-4">
                                        <label id="label">Total Bookings:</label
                                        ><br /><br />
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="155"
                                            :width="25"
                                            :value="book1"
                                            color="#BA68C8"
                                        >
                                            {{ book1 }}
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
        book1: "",
        name: sessionStorage.getItem("username")
    }),

    watch: {
        group() {
            this.drawer = false;
        }
    },
    mounted() {
        var email = sessionStorage.getItem("useremail");
        if (email == null) {
            this.$router.push({ path: "Userlog" });
        }
    },
    methods: {
        logout() {
            sessionStorage.removeItem("username");
            sessionStorage.removeItem("userid");
            sessionStorage.removeItem("useremail");
            sessionStorage.removeItem("bookid");
            this.$router.push("/");
        }
    },
    created() {
        axios
            .get(
                `http://127.0.0.1:8000/api/user_book_count/${sessionStorage.getItem(
                    "useremail"
                )}`
            )
            .then(Response => {
                this.book = Response.data.booking;
                this.book1 = Response.data.book1;
            })
            .catch(err => {
                console.log(err);
            });
        axios
            .get("http://127.0.0.1:8000/api/user_hotel_count")
            .then(Response => {
                this.hotel = Response.data.hotel;
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
    font-size: 30px;
    margin-top: 40px;
}
.count1 {
    color: white;
    font-family: Bahnschrift SemiBold;
}
.count2 {
    color: white;
    font-family: Bahnschrift SemiBold;
    font-size: 16px;
}
.label1 {
    margin-top: 10px;
    font-family: Bahnschrift SemiBold;
    font-size: 18px;
}
@media (min-width: 300px) and (max-width: 350px) {
    #form {
        margin-top: 20px;
    }
    #button {
        margin-top: 20px;
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
@media (min-width: 800px) and (max-width: 1050px) {
}
</style>
