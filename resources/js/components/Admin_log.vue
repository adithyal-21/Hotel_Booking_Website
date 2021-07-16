<template>
    <v-app>
        <v-container>
            <v-row>
                <v-col cols="12" sm="12">
                    <v-card class="mx-auto" id="card" shaped hover>
                        <v-row>
                            <v-col cols="12" sm="6">
                                <v-img
                                    alt="admin"
                                    src="login.jpg"
                                    id="image"
                                ></v-img>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <h1>
                                    Admin Login
                                </h1>
                                <br />
                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <p>E-mail</p>
                                                <v-text-field
                                                    solo
                                                    clearable
                                                    v-model="admin1.email"
                                                    :rules="emailRules"
                                                    required
                                                    :append-icon="'mdi-email'"
                                                ></v-text-field>

                                                <p>Password</p>
                                                <v-text-field
                                                    v-model="admin1.password"
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
                                                        >LOGIN</v-btn
                                                    >
                                                </v-row>
                                                <div class="forgot">
                                                    <p>
                                                        <router-link
                                                            to="/Admin_forpass"
                                                            style="text-decoration:none;color:#3949ab"
                                                        >
                                                            Forgot Password?
                                                        </router-link>
                                                    </p>
                                                </div>
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

            admin1: this.setLogin(),

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
            select: null,
            checkbox: true
        };
    },
    methods: {
        setLogin() {
            return {
                email: "",
                password: ""
            };
        },
        submit() {
            this.$refs.form.validate();
            store.dispatch("Adminpart/Adminlog", this);
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
.forgot {
    margin-top: 20px;
    text-align: right;
    font-family: Bahnschrift SemiBold;
    font-size: 16px;
}
@media (min-width: 300px) and (max-width: 350px) {
    .forgot {
        text-align: center;
    }
}
/*meduim mobile phones*/
@media (min-width: 350px) and (max-width: 400px) {
    .forgot {
        text-align: center;
    }
}
/*large mobile phones*/
@media (min-width: 400px) and (max-width: 500px) {
    .forgot {
        text-align: center;
    }
}
/*tablet*/

/*tablet mode*/
@media (min-width: 600px) and (max-width: 800px) {
    #image {
        margin-top: 70px;
    }
    .forgot {
        text-align: center;
    }
}
@media (min-width: 800px) and (max-width: 1050px) {
}
</style>
