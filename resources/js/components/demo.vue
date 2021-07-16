<template>
    <v-app>
        <div>
            <v-app-bar color="#212121" dark>
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                ></v-app-bar-nav-icon>

                <v-toolbar-title
                    class="font-weight-medium"
                    style="font-family:Bahnschrift SemiBold;font-size:23px"
                    >User Dashboard
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon @click="logout" style="margin-left:10px">
                    <v-icon>mdi-logout</v-icon>
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer
                v-model="drawer"
                dark
                absolute
                temporary
                bottom
                width="280"
                ><br />

                <v-list-item dense>
                    <v-avatar>
                        <v-img src="user2.jpg"></v-img>
                    </v-avatar>
                    <v-list-item-content>
                        <v-list-item-title>
                            <div v-if="name" id="name">Hi {{ name }}</div>
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list dense>
                    <v-list-item v-for="item in items" :key="item.title" link>
                        <v-list-item-icon>
                            <v-icon style="font-size:20px">{{
                                item.icon
                            }}</v-icon>
                        </v-list-item-icon>
                        <router-link
                            :to="{ path: item.routeUrl }"
                            style="text-decoration: none; color: inherit;"
                        >
                            <v-list-item-title>
                                {{ item.title }}
                            </v-list-item-title></router-link
                        >
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </div>
    </v-app>
</template>
<script>
export default {
    data: () => ({
        drawer: false,
        group: null,

        items: [
            { title: "Home", icon: "fa fa-home", routeUrl: "" },
            {
                title: "Profile",
                icon: "fa fa-user",
                routeUrl: "/user_profile"
            },
            {
                title: "Search Hotel ",
                icon: "fa fa-search",
                routeUrl: "/search_hotel"
            },
            {
                title: "Booking History ",
                icon: "fa fa-history",
                routeUrl: "/Book_history"
            }
        ],
        items1: [
            {
                action: "mdi-plus",
                items: [
                    {
                        title: "Manager Form",
                        route: ""
                    },
                    {
                        title: "Employee Form",
                        route: ""
                    },
                    {
                        title: "Department Form",
                        route: ""
                    }
                ],
                title: "Add"
            }
        ],
        name: sessionStorage.getItem("username")
    }),

    watch: {
        group() {
            this.drawer = false;
        }
    },

    methods: {
        logout() {
            sessionStorage.removeItem("username");
            sessionStorage.removeItem("userid");
            sessionStorage.removeItem("useremail");

            sessionStorage.removeItem("bookid");
            this.$router.push("/Userlog");
        }
    }
};
</script>
<style scoped>
#main:hover {
    text-decoration: none;
    color: inherit;
}
#main {
    text-decoration: none;
    color: inherit;
}
#name {
    font-family: Bahnschrift SemiBold;
    font-size: 18px;
    text-align: center;
    margin-left: -50px;
}
#button {
    color: white;
}
@media (min-width: 300px) and (max-width: 350px) {
    #form {
        margin-top: 20px;
    }
    #button {
        margin-top: 20px;
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
}
@media (min-width: 800px) and (max-width: 1050px) {
}
</style>
