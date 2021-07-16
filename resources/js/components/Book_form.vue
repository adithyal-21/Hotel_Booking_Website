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
            <v-container>
                <v-row justify="center">
                    <v-card id="card" shaped hover width="800">
                        <v-row>
                            <v-col cols="12" sm="12">
                                <br />
                                <h1>
                                    Booking Details
                                </h1>
                                <br />
                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <p>Name:</p>
                                                <v-text-field
                                                    v-model="book.name"
                                                    solo
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                    disabled
                                                ></v-text-field>
                                                <p>E-mail:</p>
                                                <v-text-field
                                                    v-model="book.email"
                                                    solo
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                    disabled
                                                ></v-text-field>
                                                <p>Phone:</p>
                                                <v-text-field
                                                    counter="10"
                                                    v-model="book.phone"
                                                    :rules="phoneRules"
                                                    required
                                                    clearable
                                                    solo
                                                    disabled
                                                ></v-text-field>

                                                <p>Arrival Day:</p>
                                                <v-menu
                                                    ref="menu"
                                                    v-model="menu"
                                                    :close-on-content-click="
                                                        false
                                                    "
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="290px"
                                                >
                                                    <template
                                                        v-slot:activator="{
                                                            on,
                                                            attrs
                                                        }"
                                                    >
                                                        <v-text-field
                                                            v-model="
                                                                book.arrival
                                                            "
                                                            append-icon="mdi-calendar"
                                                            readonly
                                                            v-bind="attrs"
                                                            v-on="on"
                                                            :rules="Rules"
                                                            solo
                                                            clearable
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker
                                                        ref="picker"
                                                        v-model="book.arrival"
                                                        :max="
                                                            new Date()
                                                                .toISOString()
                                                                .substr(0, 10)
                                                        "
                                                        min="1950-01-01"
                                                        @change="save"
                                                    ></v-date-picker>
                                                </v-menu>
                                                <p>No. Of Days :</p>
                                                <v-text-field
                                                    solo
                                                    v-model="book.days"
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>
                                                <p>No. Of Rooms:</p>
                                                <v-text-field
                                                    solo
                                                    v-model="book.rooms"
                                                    :rules="Rules"
                                                    required
                                                    clearable
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
                                                <v-row class="justify-center">
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
                                                        >BOOK</v-btn
                                                    >
                                                </v-row>
                                            </v-col>
                                        </v-row></v-container
                                    >
                                </v-form>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-row>
            </v-container>
        </div>
        <br />
    </v-app>
</template>
<script>
export default {
    data() {
        return {
            valid: false,
            date: null,
            menu: false,
            book: this.getdata(),
            Rules: [v => !!v || "Field is required"],

            phoneRules: [
                v => !!v || "Phone is required",
                v => (v && v.length == 10) || "Number should be 10"
            ],

            items: [
                {
                    text: "𝗦𝗘𝗔𝗥𝗖𝗛 𝗛𝗢𝗧𝗘𝗟",
                    disabled: false
                },
                {
                    text: "𝗕𝗢𝗢𝗞𝗜𝗡𝗚",
                    disabled: false
                }
            ],

            checkbox: true
        };
    },
    watch: {
        menu(val) {
            val && setTimeout(() => (this.$refs.picker.activePicker = "YEAR"));
        }
    },
    methods: {
        save(date) {
            this.$refs.menu.save(date);
        },
        getdata() {
            return {
                name: "",
                email: "",
                phone: "",
                arrival: "",
                days: "",
                rooms: "",
                hotelid: ""
            };
        },
        getuserById(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getuserid1/${id}`)
                .then(response => {
                    this.book = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        submit() {
            this.$refs.form.validate();
            this.$store.dispatch("Adminpart/booking_reg", this);
        }
    },
    created() {
        this.getuserById(sessionStorage.getItem("userid"));
        sessionStorage.setItem("bookid", this.$route.params.id);
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
    margin-top: 15px;
    text-align: center;
    color: #3949ab;
}
#button {
    color: white;
    margin-bottom: 30px;
}
#image {
    margin-top: 150px;
}
@media (min-width: 300px) and (max-width: 350px) {
    #image {
        height: 230px;
        margin-top: 20px;
    }
    h1 {
        font-size: 29px;
    }
    #card {
        border-bottom: solid 20px #3949ab;
        border-right: solid 20px #3949ab;
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
        margin-top: 200px;
        height: 400px;
    }
}
@media (min-width: 800px) and (max-width: 1050px) {
    #image {
        margin-top: 190px;
    }
}
</style>
