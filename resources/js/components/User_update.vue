<template>
    <v-app>
        <div>
            <v-toolbar color="#1A237E" dark>
                <router-link to="/user_profile" style="text-decoration:none">
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
                                    User Data Update
                                </h1>
                                <br />
                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <p>Name:</p>
                                                <v-text-field
                                                    v-model="user1.name"
                                                    solo
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>

                                                <p>Email:</p>
                                                <v-text-field
                                                    solo
                                                    v-model="user1.email"
                                                    :rules="Rules"
                                                    required
                                                    clearable
                                                ></v-text-field>

                                                <p>Phone:</p>
                                                <v-text-field
                                                    counter="10"
                                                    v-model="user1.phone"
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
                                                        >UPDATE</v-btn
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
import store from "../store";
export default {
    data() {
        return {
            valid: false,
            user1: {},
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

            items: [
                {
                    text: "𝗣𝗥𝗢𝗙𝗜𝗟𝗘",
                    disabled: false
                },
                {
                    text: "𝗨𝗣𝗗𝗔𝗧𝗘",
                    disabled: false
                }
            ],

            checkbox: true
        };
    },
    methods: {
        getuserById(id) {
            axios
                .get(`http://127.0.0.1:8000/api/getuserid/${id}`)
                .then(response => {
                    this.user1 = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        submit() {
            this.$refs.form.validate();
            this.$store.dispatch("Adminpart/Updateuser", {
                user1: this.user1,
                id: `${this.$route.params.id}`
            });
        }
    },
    created() {
        this.getuserById(this.$route.params.id);
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
