<template>
    <v-app>
        <div>
            <v-app-bar color="#00796B" dark>
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                ></v-app-bar-nav-icon>
                <v-spacer></v-spacer>
                <v-toolbar-title
                    class="font-weight-medium"
                    style="font-family:Bahnschrift SemiBold;font-size:25px"
                    >Admin Dashboard</v-toolbar-title
                >

                <v-spacer></v-spacer>

                <!--<v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-filter</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>-->
            </v-app-bar>

            <v-navigation-drawer v-model="drawer" dark absolute temporary bottom
                ><br />

                <v-list-item dense>
                    <v-list-item-avatar>
                        <v-img src="admin1.png"></v-img>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title> </v-list-item-title>
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

                        <v-list-item-title>
                            <router-link
                                :to="{ path: item.routeUrl }"
                                style="text-decoration: none; color: inherit;"
                            >
                                {{ item.title }}</router-link
                            ></v-list-item-title
                        >
                    </v-list-item>

                    <!--<v-list-group
                        v-for="item in items1"
                        :key="item.title"
                        v-model="item.active"
                        :prepend-icon="item.action"
                        no-action
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title
                                    style=" text-decoration: none;
    color: inherit;"
                                    v-text="item.title"
                                ></v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item
                            v-for="child in item.items"
                            :key="child.title"
                        >
                            <v-list-item-content>
                                <router-link
                                    :to="{ path: child.route }"
                                    style="text-decoration: none; color: inherit;"
                                >
                                    <v-list-item-title>
                                        {{ child.title }}
                                    </v-list-item-title>
                                </router-link>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>-->
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
            {
                title: "Dashboard",
                icon: "fa fa-qrcode",
                routeUrl: ""
            },
            { title: "Home", icon: "fa fa-home", routeUrl: "" },
            {
                title: "Hotel List",
                icon: "fa fa-list",
                routeUrl: "/hotel_list"
            },
            { title: "Approved Hotel ", icon: "fa fa-check", routeUrl: "" }
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
        ]
    }),

    watch: {
        group() {
            this.drawer = false;
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
</style>
