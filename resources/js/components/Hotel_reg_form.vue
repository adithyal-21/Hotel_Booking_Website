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
                                    src="hotel.jpg"
                                    id="image"
                                ></v-img>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <h1>
                                    Hotel Registration
                                </h1>
                                <br />
                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <p>Hotel Name:</p>
                                                <v-text-field
                                                    solo
                                                    v-model="hotel1.name"
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>
                                                <p>Hotel Location:</p>
                                                <v-text-field
                                                    solo
                                                    v-model="hotel1.location"
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>
                                                <p>Hotel Address:</p>
                                                <v-text-field
                                                    solo
                                                    v-model="hotel1.address"
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>
                                                <p>Owner Name:</p>
                                                <v-text-field
                                                    solo
                                                    v-model="hotel1.owner"
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>

                                                <p>E-mail</p>
                                                <v-text-field
                                                    solo
                                                    clearable
                                                    v-model="hotel1.email"
                                                    :rules="emailRules"
                                                    required
                                                ></v-text-field>
                                                <p>Phone:</p>
                                                <v-text-field
                                                    counter="10"
                                                    v-model="hotel1.phone"
                                                    :rules="phoneRules"
                                                    required
                                                    clearable
                                                    solo
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
                                                        >Submit</v-btn
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
            hotel1: this.setRegister1(),
            Rules: [v => !!v || "Field is required"],

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
                v => (v && v.length >= 8) || "Minimum 8 Characters"
            ],

            select: null,
            checkbox: true
        };
    },
    methods: {
        setRegister1() {
            return {
                name: "",
                location: "",
                address: "",
                owner: "",
                email: "",
                phone: ""
            };
        },
        submit() {
            this.$refs.form.validate();
            store.dispatch("Adminpart/Hotelreg", this);
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
    margin-top: 20px;
    text-align: center;
    color: #3949ab;
}
#button {
    color: white;
    margin-bottom: 30px;
}
#image {
    margin-top: 170px;
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
