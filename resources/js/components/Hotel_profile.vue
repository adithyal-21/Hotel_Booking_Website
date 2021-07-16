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
                <v-spacer></v-spacer>

                <v-menu bottom left>
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn icon color="white" v-bind="attrs" v-on="on">
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>

                    <v-list>
                        <v-list-item>
                            <router-link
                                :to="{
                                    name: 'hotel_update',
                                    params: { id: data.id }
                                }"
                                style="text-decoration:none;color:inherit"
                            >
                                <v-list-item-title
                                    >Hotel Image</v-list-item-title
                                >
                            </router-link>
                        </v-list-item>
                        <v-list-item>
                            <router-link
                                :to="{
                                    name: 'hotel_update1',
                                    params: { id: data.id }
                                }"
                                style="text-decoration:none;color:inherit"
                            >
                                <v-list-item-title
                                    >User Image</v-list-item-title
                                >
                            </router-link>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </v-toolbar>
            <div class="container">
                <br /><br />
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <v-card class="mx-auto" id="card" hover shaped>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div v-if="data.image1 == null">
                                        <v-img
                                            src="profile.jpg"
                                            style="border-top-left-radius:25px;"
                                            id="image1"
                                        >
                                        </v-img>
                                    </div>
                                    <div v-else>
                                        <v-img
                                            :src="'/uploads/' + data.image1"
                                            style="border-top-left-radius:25px;margin-top:-10px"
                                            id="image"
                                        >
                                        </v-img>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h1>Profile</h1>
                                    <hr />
                                    <div
                                        class="table-responsive"
                                        style="margin-top:10px;"
                                        id="move"
                                    >
                                        <table class="table ">
                                            <tr>
                                                <th scope="row">
                                                    Owner:
                                                </th>

                                                <td>{{ data.name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Email :
                                                </th>

                                                <td>{{ data.email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Phone :
                                                </th>

                                                <td>{{ data.phone }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Hotel Name :
                                                </th>
                                                <td>
                                                    {{ data.Hot_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Hotel Location :
                                                </th>
                                                <td>
                                                    {{ data.Hot_loc }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Hotel Address :
                                                </th>
                                                <td>
                                                    {{ data.Hot_address }}
                                                </td>
                                            </tr>
                                        </table>
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
    data() {
        return {
            items: [
                {
                    text: "𝗗𝗔𝗦𝗛𝗕𝗢𝗔𝗥𝗗",
                    disabled: false
                },
                {
                    text: "𝗣𝗥𝗢𝗙𝗜𝗟𝗘",
                    disabled: false
                }
            ],

            data: {}
        };
    },
    methods: {
        gethotelProfile(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getHotelProfile/${id}`)
                .then(Response => {
                    this.data = Response.data.data1;
                });
        }
    },
    created() {
        this.gethotelProfile(sessionStorage.getItem("hotelid"));
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
h1 {
    text-align: center;
    font-family: Bahnschrift SemiBold;
    margin-top: 10px;
    color: #3949ab;
}
h3 {
    width: 100%;
    text-align: center;
    border-bottom: 1px solid lightgray;
    line-height: 0.1em;
    margin: 35px 0 30px;
    font-family: Bahnschrift SemiBold;
    font-size: 18px;
}

h3 span {
    background: #fff;
    padding: 0 10px;
    color: #5c6bc0;
}
#card {
    margin-top: 20px;
    border-bottom: solid 30px #3949ab;
    border-right: solid 30px #3949ab;
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
#image1 {
    margin-top: 40px;
}
#image {
    height: 500px;
}
@media (min-width: 300px) and (max-width: 350px) {
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
    }
    #image {
        height: 300px;
    }
    table th {
        font-size: 15px;
    }
    table td {
        font-size: 15px;
    }
}
/*meduim mobile phones*/
@media (min-width: 350px) and (max-width: 400px) {
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
    }
    #image {
        height: 300px;
    }
    table th {
        font-size: 16px;
    }
    table td {
        font-size: 16px;
    }
}
/*large mobile phones*/
@media (min-width: 400px) and (max-width: 500px) {
    #image {
        height: 300px;
    }
}
/*tablet*/

/*tablet mode*/
@media (min-width: 600px) and (max-width: 800px) {
    #image1 {
        margin-top: 150px;
        height: 200px;
    }
}
@media (min-width: 800px) and (max-width: 1050px) {
    #image1 {
        margin-top: 100px;
    }
}
</style>
