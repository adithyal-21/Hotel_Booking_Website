<template>
    <v-app>
        <v-container>
            <v-row>
                <v-col cols="12" sm="12">
                    <v-card class="mx-auto" id="card" shaped hover>
                        <div v-for="err in getUserreg" :key="err.error">
                            <v-alert
                                type="error"
                                dismissible
                                style="border-top-left-radius:30px"
                                color="#B71C1C"
                            >
                                <div
                                    style="text-align:center;font-family: Bahnschrift SemiBold;font-size:20px"
                                >
                                    {{ err }}
                                </div>
                            </v-alert>
                        </div>
                        <v-row>
                            <v-col cols="12" sm="6">
                                <v-img
                                    alt="admin"
                                    src="userreg.png"
                                    id="image"
                                ></v-img>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <h1>
                                    User Registration
                                </h1>
                                <br />
                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <p>Name:</p>
                                                <v-text-field
                                                    solo
                                                    :rules="nameRules"
                                                    required
                                                    clearable
                                                    v-model="user.name"
                                                ></v-text-field>
                                                <p>E-mail</p>
                                                <v-text-field
                                                    solo
                                                    clearable
                                                    :rules="emailRules"
                                                    required
                                                    v-model="user.email"
                                                ></v-text-field>
                                                <p>Phone:</p>
                                                <v-text-field
                                                    counter="10"
                                                    :rules="phoneRules"
                                                    required
                                                    clearable
                                                    solo
                                                    v-model="user.phone"
                                                ></v-text-field>

                                                <p>Password</p>
                                                <v-text-field
                                                    v-model="user.password"
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
                                                    color="#3949AB"
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
                                                        >Create Account</v-btn
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
            select: null,
            checkbox: true,

            user: this.setRegister(),
            nameRules: [v => !!v || "Name is required"],

            emailRules: [
                v => !!v || "E-mail is required",
                v =>
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
                    "E-mail must be valid"
            ],
            phoneRules: [
                v => !!v || "Phone is required",
                v => (v && v.length == 10) || "Number should be 10"
            ],

            passRules: [
                v => !!v || "Password is Required",
                v => (v && v.length > 7) || "Minimum 8 Characters"
            ]
        };
    },
    methods: {
        setRegister() {
            return {
                name: "",
                email: "",
                phone: "",
                password: ""
            };
        },
        submit() {
            this.$refs.form.validate();
            store.dispatch("Adminpart/UserRegister", this);
        }
    },
    computed: {
        getUserreg() {
            return this.$store.state.Adminpart.userregerror;
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
    margin-top: 30px;
    text-align: center;
    color: #3949ab;
}
#button {
    color: white;
    margin-bottom: 30px;
}
#image {
    margin-top: 80px;
    height: 500px;
}
@media (min-width: 300px) and (max-width: 350px) {
    #image {
        height: 250px;
        margin-top: -10px;
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
        height: 300px;
        margin-top: -10px;
    }
}
/*large mobile phones*/
@media (min-width: 400px) and (max-width: 500px) {
    #image {
        height: 350px;
        margin-top: -10px;
    }
}
/*tablet*/

/*tablet mode*/
@media (min-width: 600px) and (max-width: 800px) {
    #image {
        height: 300px;
        margin-top: 150px;
    }
}
@media (min-width: 800px) and (max-width: 1050px) {
    #image {
        height: 380px;
        margin-top: 100px;
    }
}
</style>
