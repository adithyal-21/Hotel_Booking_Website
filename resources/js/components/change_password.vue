<template>
    <v-app>
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
        <v-container>
            <v-row>
                <v-col cols="12" sm="12">
                    <v-card class="mx-auto" id="card" shaped hover>
                        <v-row>
                            <v-col cols="12" sm="6">
                                <v-img
                                    alt="admin"
                                    src="change.jpg"
                                    id="image"
                                ></v-img>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <h1>
                                    Change Password
                                </h1>
                                <br />
                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <p>E-mail</p>
                                                <v-text-field
                                                    solo
                                                    v-model="change.email"
                                                    clearable
                                                    :rules="emailRules"
                                                    required
                                                    disabled
                                                ></v-text-field>

                                                <p>New Password</p>
                                                <v-text-field
                                                    v-model="change.password"
                                                    :append-icon="
                                                        show1
                                                            ? 'mdi-eye'
                                                            : 'mdi-eye-off'
                                                    "
                                                    :type="
                                                        show1
                                                            ? 'text'
                                                            : 'password'
                                                    "
                                                    hint="At least 8 characters"
                                                    counter="8"
                                                    @click:append="
                                                        show1 = !show1
                                                    "
                                                    solo
                                                    clearable
                                                    :rules="passRules"
                                                    required
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
                                                        >CHANGE</v-btn
                                                    >
                                                </v-row>
                                            </v-col></v-row
                                        ></v-container
                                    >
                                </v-form>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
            </v-row> </v-container
        ><br />
    </v-app>
</template>
<script>
import store from "../store";
export default {
    data() {
        return {
            valid: false,
            show1: false,
            show2: true,
            show3: false,
            show4: false,
            change: this.changedata(),
            emailRules: [
                v => !!v || "E-mail is required",
                v =>
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
                    "E-mail must be valid"
            ],

            passRules: [
                v => !!v || "Password is Required",
                v => (v && v.length >= 8) || "Minimum 8 Characters"
            ],
            items: [
                {
                    text: "𝗗𝗔𝗦𝗛𝗕𝗢𝗔𝗥𝗗",
                    disabled: false
                },
                {
                    text: "𝗖𝗛𝗔𝗡𝗚𝗘 𝗣𝗔𝗦𝗦𝗪𝗢𝗥𝗗",
                    disabled: false
                }
            ],
            select: null,
            checkbox: true
        };
    },
    methods: {
        changedata() {
            return {
                email: sessionStorage.getItem("hotelemail"),
                password: ""
            };
        },
        submit() {
            this.$refs.form.validate();
            store.dispatch("Adminpart/changepassword", this);
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
#card {
    margin-top: 50px;
    border-bottom: solid 30px #3949ab;
    border-right: solid 30px #3949ab;
}
h1 {
    font-family: Bahnschrift SemiBold;
    margin-top: 20px;
    text-align: center;
    color: #3949ab;
}
#button {
    color: white;
    margin-bottom: 30px;
}

@media (min-width: 300px) and (max-width: 350px) {
}
/*meduim mobile phones*/
@media (min-width: 350px) and (max-width: 400px) {
}
/*large mobile phones*/
@media (min-width: 400px) and (max-width: 500px) {
}
/*tablet*/

/*tablet mode*/
@media (min-width: 600px) and (max-width: 800px) {
}
@media (min-width: 800px) and (max-width: 1050px) {
}
</style>
