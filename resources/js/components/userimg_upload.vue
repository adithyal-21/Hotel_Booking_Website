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
                </v-breadcrumbs> </v-toolbar
            ><br /><br />
            <v-container>
                <v-row justify="center">
                    <v-card id="card" shaped hover width="800">
                        <v-row>
                            <v-col cols="12" sm="12">
                                <h1>
                                    User Image
                                </h1>
                                <br />

                                <v-form v-model="valid" ref="form">
                                    <v-container>
                                        <v-row class="justify-center">
                                            <v-col cols="12" sm="10">
                                                <div class="form-group">
                                                    <label for="description"
                                                        >Picture:</label
                                                    >
                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        @change="handleonchange"
                                                        id="file"
                                                    />
                                                </div>
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
                                                            indigo: valid
                                                        }"
                                                        id="button"
                                                        height="45"
                                                        width="230"
                                                        rounded
                                                        >UPLOAD</v-btn
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
    </v-app>
</template>
<script>
export default {
    data() {
        return {
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
            valid: false,
            checkbox: true,
            image: ""
        };
    },
    methods: {
        handleonchange(e) {
            this.image = e.target.files[0];
        },
        submit() {
            this.$refs.form.validate();
            this.$isLoading(true);
            const formData = new FormData();
            formData.set("image", this.image);
            axios
                .post(
                    `http://127.0.0.1:8000/api/userimage/${this.$route.params.id}`,
                    formData
                )
                .then(response => {
                    this.$isLoading(false);
                    alertify.success(response.data.msg);
                    this.$router.push("/user_profile");
                })
                .catch(err => {
                    console.log(err);
                });
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
    margin-top: 25px;
    text-align: center;
    color: #3949ab;
}
label {
    font-family: Bahnschrift SemiBold;
}
#button {
    color: white;
    margin-bottom: 30px;
}
#image {
    margin-top: 150px;
}
#file {
    height: 45px;
}
</style>
