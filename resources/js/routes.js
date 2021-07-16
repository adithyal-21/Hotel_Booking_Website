import demo from "./components/demo.vue";
import Admin_reg from "./components/Admin_reg.vue";
import Admin_log from "./components/Admin_log.vue";
import Admin_dash from "./components/Admin_dash.vue";
import Hotel_dash from "./components/Hotel_dash.vue";
import user_dash from "./components/Userdash.vue";
import hotel_list from "./components/Hotel_list.vue";
import hotel_log from "./components/Hotel_login.vue";
import hotel_edit from "./components/Hoteldata_edit.vue";
import hotel_profile from "./components/Hotel_profile.vue";
import Userreg from "./components/Userreg.vue";
import Userlog from "./components/Userlog.vue";
import hotel_update from "./components/Hotel_update.vue";
import hotel_update1 from "./components/Hotel_update1.vue";
import approve_items from "./components/Approve_items.vue";
import Hotel_reg_form from "./components/Hotel_reg_form.vue";
import change_password from "./components/change_password.vue";
import Addhotel_details from "./components/Addhotel_details.vue";
import update_items from "./components/update_items.vue";
import check_status from "./components/Hotel_check_status.vue";
import Approved_hotel from "./components/Aprroved_hotel_list.vue";
import user_profile from "./components/user_profile.vue";
import user_update from "./components/User_update.vue";
import user_image from "./components/userimg_upload.vue";
import search_hotel from "./components/search_hotel.vue";
import Book_page from "./components/Book_page.vue";
import Book_form from "./components/Book_form.vue";
import Book_list from "./components/Booking_list.vue";
import Book_history from "./components/Booking_history.vue";
import Booked_list from "./components/Booked_list.vue";
import user_list from "./components/User_list.vue";
import Hotel_forpass from "./components/Hotel_forpass.vue";
import Admin_forpass from "./components/Admin_forpass.vue";
import User_forpass from "./components/User_forpass.vue";
import home from "./components/Home.vue";
export const routes = [
    {
        name: "demo",
        path: "/demo",
        component: demo
    },
    {
        name: "Adminreg",
        path: "/adminreg",
        component: Admin_reg,
        props: true
    },
    {
        name: "adminlog",
        path: "/adminlog",
        component: Admin_log,
        props: true
    },
    {
        name: "admindash",
        path: "/admindash",
        component: Admin_dash
    },
    {
        name: "hotel_list",
        path: "/hotel_list",
        component: hotel_list
    },
    {
        name: "Approved_hotel",
        path: "/Approved_hotel",
        component: Approved_hotel
    },
    {
        name: "Hotel_reg_form",
        path: "/Hotel_reg_form",
        component: Hotel_reg_form
    },
    {
        name: "Hotel_edit",
        path: "/Hotel_edit/:id",
        component: hotel_edit
    },
    {
        name: "Hotel_login",
        path: "/Hotel_login",
        component: hotel_log
    },
    {
        name: "Hotel_dash",
        path: "/Hotel_dash",
        component: Hotel_dash
    },
    {
        name: "change_password",
        path: "/change_password",
        component: change_password
    },
    {
        name: "hotel_profile",
        path: "/hotel_profile",
        component: hotel_profile
    },
    {
        name: "hotel_update",
        path: "/hotel_update/:id",
        component: hotel_update
    },
    {
        name: "hotel_update1",
        path: "/hotel_update1/:id",
        component: hotel_update1
    },
    {
        name: "Addhotel_details",
        path: "/Addhotel_details",
        component: Addhotel_details
    },
    {
        name: "approve_items",
        path: "/approve_items",
        component: approve_items
    },
    {
        name: "check_status",
        path: "/check_status",
        component: check_status
    },
    {
        name: "update_items",
        path: "/update_items/:id",
        component: update_items
    },
    {
        name: "Userreg",
        path: "/Userreg",
        component: Userreg
    },
    {
        name: "Userlog",
        path: "/Userlog",
        component: Userlog
    },
    {
        name: "user_dash",
        path: "/user_dash",
        component: user_dash
    },
    {
        name: "user_profile",
        path: "/user_profile",
        component: user_profile
    },
    {
        name: "user_update",
        path: "/user_update/:id",
        component: user_update
    },
    {
        name: "user_image",
        path: "/user_image/:id",
        component: user_image
    },
    {
        name: "search_hotel",
        path: "/search_hotel",
        component: search_hotel
    },
    {
        name: "Book_page",
        path: "/Book_page/:id",
        component: Book_page
    },
    {
        name: "Book_form",
        path: "/Book_form/:id",
        component: Book_form
    },
    {
        name: "Book_list",
        path: "/Book_list",
        component: Book_list
    },
    {
        name: "Book_history",
        path: "/Book_history",
        component: Book_history
    },
    {
        name: "Booked_list",
        path: "/Booked_list",
        component: Booked_list
    },
    {
        name: "user_list",
        path: "/user_list",
        component: user_list
    },
    {
        name: "Hotel_forpass",
        path: "/Hotel_forpass",
        component: Hotel_forpass
    },
    {
        name: "Admin_forpass",
        path: "/Admin_forpass",
        component: Admin_forpass
    },
    {
        name: "User_forpass",
        path: "/User_forpass",
        component: User_forpass
    },
    {
        name: "home",
        path: "/",
        component: home
    }
];
