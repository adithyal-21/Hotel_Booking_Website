<template>
    <v-app>
        <div>
            <v-toolbar color="#1A237E" dark>
                <router-link to="/search_hotel" style="text-decoration:none">
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

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <br />

                        <v-card hover shaped id="card">
                            <div v-if="data.image1 == null">
                                <v-img
                                    src="profile.jpg"
                                    style="border-top-left-radius:25px;"
                                    id="image1"
                                    height="400px"
                                >
                                </v-img>
                            </div>
                            <div v-else>
                                <v-img
                                    :src="'/uploads/' + data.image1"
                                    height="350px"
                                    style="border-top-left-radius:25px;margin-top:-10px"
                                >
                                </v-img>
                            </div>

                            <v-card-title
                                v-for="ext in extra"
                                :key="ext.name"
                                class="mx-2"
                                style="text-transform:capitalize;  font-family: Bahnschrift;font-size:25px"
                                >{{ ext.hotel }}</v-card-title
                            >

                            <v-card-text>
                                <v-row align="center" class="mx-2">
                                    <v-rating
                                        :value="4.5"
                                        color="amber"
                                        dense
                                        half-increments
                                        readonly
                                        size="14"
                                    ></v-rating>

                                    <div class="grey--text ms-4">
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
                                                    class="fa fa-map-marker"
                                                    style="margin-right:5px"
                                                ></i>
                                                <span>{{
                                                    data.Hot_address
                                                }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div
                                                class=" text-subtitle-1"
                                                id="text"
                                                v-for="ext in extra"
                                                :key="ext.days"
                                            >
                                                <i class="fa fa-calendar"></i>
                                                <span>{{ ext.days }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div
                                                class=" text-subtitle-1"
                                                id="text"
                                                v-for="ext in extra"
                                                :key="ext.hotel"
                                            >
                                                <i class="fa fa-clock"></i>
                                                <span>{{ ext.timings }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div
                                                class=" text-subtitle-1"
                                                id="text"
                                                v-for="ext in extra"
                                                :key="ext.id"
                                            >
                                                <i class="fa fa-hotel"></i>
                                                <span>{{ ext.rooms }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div
                                                class=" text-subtitle-1"
                                                id="text"
                                                v-for="ext in extra"
                                                :key="ext.id"
                                                style="color:red"
                                            >
                                                <i class="fa fa-money"></i>
                                                <span>{{ ext.amount }} Rs</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="container"
                                    style="margin-top:5px; text-transform: capitalize;font-family: Bahnschrift;"
                                >
                                    If Intersted You Can Book Our Hotel By
                                    Clicking Book Buttom
                                </div>
                            </v-card-text>

                            <v-divider class="mx-4"></v-divider>

                            <v-card-actions>
                                <v-row class="justify-center">
                                    <router-link
                                        :to="{
                                            name: 'Book_form',
                                            params: { id: data.id }
                                        }"
                                        style="text-decoration:none;color:inherit"
                                    >
                                        <v-btn
                                            color="indigo"
                                            id="button"
                                            height="40"
                                            width="230"
                                            rounded
                                            >BOOK</v-btn
                                        >
                                    </router-link>
                                </v-row>
                            </v-card-actions>
                        </v-card>
                    </div>
                </div>
            </div>
        </div></v-app
    >
</template>
<script>
export default {
    data: () => ({
        items: [
            {
                text: "𝗛𝗢𝗧𝗘𝗟",
                disabled: false
            },
            {
                text: "𝗕𝗢𝗢𝗞𝗜𝗡𝗚",
                disabled: false
            }
        ],
        data: {},
        extra: {}
    }),
    methods: {
        gethotelProfile(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getHotel_book/${id}`)
                .then(Response => {
                    this.data = Response.data.data1;
                });
            axios
                .get(`http://127.0.0.1:8000/api/get_extra/${id}`)
                .then(Response => {
                    this.extra = Response.data.data;
                    if (Response.data.data.length == 0) {
                        alertify.error("Hotel Not Secured");
                        this.$router.push("/search_hotel");
                    }
                });
        }
    },
    created() {
        this.gethotelProfile(this.$route.params.id);
    }
};
</script>
<style scoped>
#text span {
    text-transform: capitalize;
    font-family: Bahnschrift;
    margin-left: 10px;
}
#card {
    border-bottom: solid 30px #3949ab;
    border-right: solid 30px #3949ab;
}
#button {
    color: white;
    margin-top: 10px;
    margin-bottom: 20px;
}
</style>
