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
                </v-breadcrumbs> </v-toolbar
            ><br />
            <v-container>
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="12"
                        ><v-card class="mx-auto" id="card" hover shaped>
                            <br /><br />
                            <v-row>
                                <v-col cols="12" sm="6">
                                    <v-img
                                        alt="admin"
                                        src="add.png"
                                        id="image"
                                    ></v-img>
                                </v-col>
                                <v-col cols="12" sm="6">
                                    <h1>
                                        Extra Details
                                    </h1>
                                    <br />
                                    <v-form v-model="valid" ref="form">
                                        <v-container>
                                            <v-row class="justify-center">
                                                <v-col cols="12" sm="10">
                                                    <p>Hotel Name:</p>
                                                    <v-text-field
                                                        solo
                                                        v-model="extra.Hot_name"
                                                        :rules="Rules"
                                                        required
                                                        clearable
                                                        disabled
                                                    ></v-text-field>
                                                    <p>Working Days:</p>
                                                    <v-text-field
                                                        solo
                                                        v-model="extra.days"
                                                        :rules="Rules"
                                                        required
                                                        clearable
                                                        hint="Ex. From Monday To Saturday"
                                                    ></v-text-field>

                                                    <p>Total Rooms</p>
                                                    <v-text-field
                                                        solo
                                                        v-model="extra.rooms"
                                                        :rules="Rules"
                                                        required
                                                        clearable
                                                        hint="In Numbers"
                                                    ></v-text-field>

                                                    <p>Timings:</p>
                                                    <v-text-field
                                                        solo
                                                        v-model="extra.timings"
                                                        :rules="Rules"
                                                        required
                                                        clearable
                                                        hint="9.00 A.M - 9.00 P.M"
                                                    ></v-text-field>
                                                    <p>Amount Per Room:</p>
                                                    <v-text-field
                                                        solo
                                                        v-model="extra.amount"
                                                        :rules="Rules"
                                                        required
                                                        clearable
                                                        hint="In Rupees"
                                                    ></v-text-field>
                                                    <v-checkbox
                                                        label="Do you agree?"
                                                        color="#3949ab"
                                                        v-model="checkbox"
                                                        :rules="[
                                                            v =>
                                                                !!v ||
                                                                'You must agree to continue!'
                                                        ]"
                                                        required
                                                    ></v-checkbox
                                                    ><br />
                                                    <v-row
                                                        class="justify-center"
                                                    >
                                                        <v-btn
                                                            @click="submit"
                                                            :class="{
                                                                indigo: !valid,
                                                                blue: valid
                                                            }"
                                                            id="button"
                                                            height="45"
                                                            width="230"
                                                            rounded
                                                            >Submit</v-btn
                                                        >
                                                    </v-row>
                                                </v-col></v-row
                                            ></v-container
                                        >
                                    </v-form>
                                </v-col></v-row
                            >
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
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
                    text: "𝗔𝗗𝗗 𝗗𝗘𝗧𝗔𝗜𝗟𝗦",
                    disabled: false
                }
            ],
            extra: this.getdata(),
            valid: false,
            Rules: [v => !!v || "Field is required"],
            checkbox: true
        };
    },
    methods: {
        getdata() {
            return {
                Hot_name: "",
                days: "",
                rooms: "",
                timings: "",
                amount: ""
            };
        },
        getname(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getHotelProfile/${id}`)
                .then(Response => {
                    this.extra = Response.data.data1;
                });
        },
        submit() {
            this.$refs.form.validate();
            this.$store.dispatch("Adminpart/AddExtra", this);
        }
    },
    created() {
        this.getname(sessionStorage.getItem("hotelid"));
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
#card {
    margin-top: 30px;
    border-bottom: solid 30px #3949ab;
    border-right: solid 30px #3949ab;
}
h1 {
    font-family: Bahnschrift SemiBold;

    text-align: center;
    color: #3949ab;
}
#button {
    color: white;
    margin-bottom: 30px;
}
#image {
    height: 680px;
    margin-top: 30px;
}
@media (min-width: 300px) and (max-width: 350px) {
    h1 {
        font-size: 29px;
    }
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
    }
    #image {
        height: 230px;
        margin-top: 20px;
    }
}
/*meduim mobile phones*/
@media (min-width: 350px) and (max-width: 400px) {
    #card {
        border-bottom: solid 25px #3949ab;
        border-right: solid 25px #3949ab;
    }
    #image {
        height: 250px;
        margin-top: 20px;
    }
}
/*large mobile phones*/
@media (min-width: 400px) and (max-width: 500px) {
    #image {
        height: 290px;
        margin-top: 20px;
    }
}
/*tablet*/

/*tablet mode*/
@media (min-width: 600px) and (max-width: 800px) {
    #image {
        margin-top: 150px;
        height: 400px;
    }
}
@media (min-width: 800px) and (max-width: 1050px) {
    #image {
        margin-top: 80px;
        height: 520px;
    }
}
</style>
