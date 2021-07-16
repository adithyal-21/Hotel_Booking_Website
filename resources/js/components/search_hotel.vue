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
                        @submit.prevent="findhotel"
                        id="form"
                    >
                        <input
                            class="form-control mr-sm-3"
                            type="text"
                            placeholder="Enter Hotel Location"
                            v-model="data.location"
                        />
                        <v-btn
                            id="button"
                            height="40"
                            width="100"
                            color="indigo"
                            type="submit"
                            >submit</v-btn
                        >
                    </form>
                </div>
            </nav>
            <br />
            <div v-for="data in hotel" :key="data.id">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-9">
                            <v-card hover id="card" shaped>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="5">
                                            <div v-if="data.image1 == null">
                                                <v-img
                                                    height="350px"
                                                    id="image"
                                                    src="profile.jpg"
                                                >
                                                </v-img>
                                            </div>
                                            <div v-else>
                                                <v-img
                                                    height="350px"
                                                    id="image"
                                                    :src="
                                                        '/uploads/' +
                                                            data.image1
                                                    "
                                                >
                                                </v-img>
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="7">
                                            <v-card-title
                                                class="mx-2"
                                                style="text-transform:capitalize;  font-family: Bahnschrift;font-size:25px"
                                                >{{
                                                    data.Hot_name
                                                }}</v-card-title
                                            >

                                            <v-card-text>
                                                <v-row
                                                    align="center"
                                                    class="mx-2"
                                                >
                                                    <v-rating
                                                        :value="4.5"
                                                        color="amber"
                                                        dense
                                                        half-increments
                                                        readonly
                                                        size="14"
                                                    ></v-rating>

                                                    <div
                                                        class="grey--text ms-4"
                                                    >
                                                        4.5
                                                    </div>
                                                </v-row>

                                                <br />
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class=" text-subtitle-1"
                                                                id="text"
                                                            >
                                                                <i
                                                                    class="fa fa-phone"
                                                                ></i>
                                                                <span>{{
                                                                    data.phone
                                                                }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class=" text-subtitle-1"
                                                                id="text"
                                                            >
                                                                <i
                                                                    class="fa fa-envelope"
                                                                ></i>
                                                                <span>{{
                                                                    data.email
                                                                }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class=" text-subtitle-1"
                                                                id="text"
                                                            >
                                                                <i
                                                                    class="fa fa-map-marker"
                                                                ></i>
                                                                <span>{{
                                                                    data.Hot_loc
                                                                }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class=" text-subtitle-1"
                                                                id="text"
                                                            >
                                                                <i
                                                                    class="fa fa-user"
                                                                ></i>
                                                                <span>{{
                                                                    data.name
                                                                }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <p class="room">
                                                                {{
                                                                    data.Room_count
                                                                }}&nbsp; Rooms
                                                                Left
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </v-card-text>

                                            <v-divider class="mx-4"></v-divider>
                                            <br />
                                            <v-row class="justify-center">
                                                <router-link
                                                    :to="{
                                                        name: 'Book_page',
                                                        params: { id: data.id }
                                                    }"
                                                    style="text-decoration:none;color:inherit"
                                                >
                                                    <v-btn
                                                        color="indigo"
                                                        id="button"
                                                        height="35"
                                                        width="150"
                                                    >
                                                        <v-icon left>
                                                            mdi-eye </v-icon
                                                        >View</v-btn
                                                    >
                                                </router-link></v-row
                                            ><br />
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
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
                text: "𝗦𝗘𝗔𝗥𝗖𝗛 𝗛𝗢𝗧𝗘𝗟",
                disabled: false
            }
        ],
        data: {},
        hotel: []
    }),
    methods: {
        findhotel() {
            axios
                .post("http://127.0.0.1:8000/api/findlocation", this.data)
                .then(res => {
                    this.hotel = res.data.data;
                    if (res.data.data.length == 0) {
                        alertify.error("No Hotel Found");
                    }
                })
                .catch(err => console.log(err));
        }
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
#button {
    color: white;
}
#text span {
    text-transform: capitalize;
    font-family: Bahnschrift;
    margin-left: 10px;
    color: grey;
}
i {
    color: grey;
}
#card {
    border-bottom: solid 20px #3949ab;
    border-right: solid 20px #3949ab;
}
#image {
    border-top-left-radius: 15px;
}
table th {
    font-family: Bahnschrift SemiBold;
    font-size: 18px;
    border-top: none;
    text-transform: capitalize;
}
table td {
    border-top: none;
    font-family: Bahnschrift;
    font-weight: lighter;
    font-size: 16px;
    text-transform: capitalize;
}
table tr {
    height: 60px;
}
#move {
    margin-top: 5px;
    margin-left: 10px;
}
.room {
    text-transform: capitalize;
    font-family: Bahnschrift;
    color: red;
    font-size: 17px;
    margin-bottom: -10px;
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
@media (min-width: 800px) and (max-width: 1050px) {
}
</style>
