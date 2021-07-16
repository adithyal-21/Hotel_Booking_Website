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
                        @submit.prevent="checkhotel"
                        id="form"
                    >
                        <input
                            class="form-control mr-sm-2"
                            type="text"
                            placeholder="Search"
                            v-model="data.id"
                            disabled
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

            <v-container>
                <v-row justify="center" align="center">
                    <v-col cols="12" sm="10">
                        <div v-for="data in status" :key="data.id">
                            <v-card id="card" shaped hover>
                                <v-row>
                                    <v-col cols="12" sm="6">
                                        <v-img
                                            alt="admin"
                                            src="selected.jpg"
                                            id="image"
                                        ></v-img>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <div
                                            class="table-responsive"
                                            style="margin-top:10px;"
                                            id="move"
                                        >
                                            <table class="table ">
                                                <tr>
                                                    <th scope="row">
                                                        Working Days :
                                                    </th>
                                                    <td>
                                                        {{ data.days }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Hotel Name :
                                                    </th>
                                                    <td>
                                                        {{ data.hotel }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Total Rooms :
                                                    </th>

                                                    <td>
                                                        {{ data.rooms }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Timings :
                                                    </th>

                                                    <td>{{ data.timings }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Amount :
                                                    </th>

                                                    <td>
                                                        {{ data.amount }} Rs
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <h3><span>UPDATE HERE</span></h3>
                                        <div
                                            class="row justify-content-center"
                                            style="margin-top:20px"
                                        >
                                            <router-link
                                                :to="{
                                                    name: 'update_items',
                                                    params: { id: data.id }
                                                }"
                                            >
                                                <v-btn
                                                    shaped
                                                    color="indigo"
                                                    width="200px"
                                                    dark
                                                >
                                                    Update
                                                </v-btn>
                                            </router-link>
                                        </div>
                                        <br /><br /></v-col
                                ></v-row>
                            </v-card>
                        </div>
                    </v-col>
                </v-row> </v-container
            ><br />
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
                    text: "𝗦𝗧𝗔𝗧𝗨𝗦",
                    disabled: false
                }
            ],
            data: {},
            status: ""
        };
    },
    methods: {
        getname(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getid/${id}`)
                .then(Response => {
                    this.data = Response.data.data1;
                });
        },
        checkhotel() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/checkstatus/${sessionStorage.getItem(
                        "hotelid"
                    )}`
                )
                .then(res => {
                    if (res.data.data.length == 0) {
                        alertify.error("Your Details Is Not Accepted");
                    } else {
                        this.status = res.data.data;
                    }
                });
        }
    },
    created() {
        this.getname(sessionStorage.getItem("hotelid"));
    },
    computed: {
        getfulldata() {
            return this.$store.state.Adminpart.itemstatus;
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
#button {
    color: white;
}
#card {
    margin-top: 50px;
    border-bottom: solid 30px #3949ab;
    border-right: solid 30px #3949ab;
}
table {
    text-align: left;
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
h3 {
    width: 100%;
    text-align: center;
    border-bottom: 1px solid lightgray;
    line-height: 0.1em;
    margin: 10px 0 40px;
    font-family: Bahnschrift SemiBold;
    font-size: 18px;
}

h3 span {
    background: #fff;
    padding: 0 10px;
    color: #5c6bc0;
}
#image {
    height: 318px;
}
@media (min-width: 300px) and (max-width: 350px) {
    #form {
        margin-top: 20px;
    }
    #button {
        margin-top: 20px;
    }
    #image {
        height: 230px;
    }
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
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
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
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
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
    }
    #image {
        height: 190px;
        margin-top: 70px;
    }
}
@media (min-width: 800px) and (max-width: 1050px) {
    #image {
        height: 250px;
        margin-top: 10px;
    }
}
</style>
