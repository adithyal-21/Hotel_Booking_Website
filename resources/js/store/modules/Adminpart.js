import axios from "axios";
const state = {
    //Admin Registration
    admin: {
        name: "",
        email: "",
        phone: "",
        password: ""
    },
    //Admin Login
    admin1: {
        email: "",
        password: ""
    },
    //user Registration
    user: {
        name: "",
        email: "",
        phone: "",
        password: ""
    },
    //user Login
    user1: {
        email: "",
        password: ""
    },
    //hotel Registration
    hotel1: {
        name: "",
        location: "",
        address: "",
        owner: "",
        email: "",
        phone: ""
    },
    //hotel login
    hotel2: {
        email: "",
        password: ""
    },
    // hotel Update
    hotel: {
        Hot_name: "",
        Hot_loc: "",
        Hot_address: "",
        name: "",
        email: "",
        phone: ""
    },
    //user update
    user1: {
        name: "",
        email: "",
        phone: ""
    },
    change: {
        email: "",
        password: ""
    },

    extra: {
        Hot_name: "",
        days: "",
        rooms: "",
        timings: "",
        amount: ""
    },
    //booking
    book: {
        name: "",
        email: "",
        phone: "",
        arrival: "",
        days: "",
        rooms: "",
        hotelid: ""
    },
    adminreg: "",
    adminlog: "",
    userlog: "",
    hotellog: "",
    fetchotel: [],
    Apphotel: [],
    updated: [],
    hotelextra: [],
    gethotel: [],
    booking: []
};
const getters = {
    getHotel(state) {
        return state.fetchotel;
    },
    Approvedhotel(state) {
        return state.Apphotel;
    },
    Approveextra(state) {
        return state.hotelextra;
    },
    Approveextra(state) {
        return state.hotelextra;
    },
    getHotel(state) {
        return state.gethotel;
    },
    updatedhotel(state) {
        return state.updated;
    }
};
const actions = {
    AdminRegister({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/admreg", {
                name: context.admin.name,
                email: context.admin.email,
                phone: context.admin.phone,
                password: context.admin.password
            })
            .then(response => {
                if (response.status == 200) {
                    context.$isLoading(false);
                    alertify.success(response.data.message);
                    commit("SET_ADMIN", {
                        name: context.admin.name
                    });
                    context.$router.push({
                        name: "adminlog"
                    });
                }
            })
            .catch(err => {
                if (err.response.status == 401) {
                    context.$isLoading(false);
                    alertify.error(err.response.data.message1);
                }
                if (err.response.status == 422) {
                    context.$isLoading(false);
                    alertify.error("Empty Fields");
                }
            });
    },
    Adminlog({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/admlog", {
                email: context.admin1.email,
                password: context.admin1.password
            })
            .then(response => {
                commit("ADMIN_LOGIN", { email: context.admin1.email });
                sessionStorage.setItem("email", response.data.email);
                sessionStorage.setItem("name", response.data.name);
                context.$isLoading(false);
                alertify.success("Successfully Logged In As Admin");
                context.$router.push("/Admindash");
            })
            .catch(err => {
                if (err.response.status == 401) {
                    context.$isLoading(false);
                    alertify.error(err.response.data.message1);
                }
                if (err.response.status == 422) {
                    context.$isLoading(false);
                    alertify.error("Empty Fields");
                }
            });
    },
    Hotelreg({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/hotelreg", {
                name: context.hotel1.name,
                location: context.hotel1.location.toLowerCase(),
                address: context.hotel1.address,
                owner: context.hotel1.owner,
                email: context.hotel1.email,
                phone: context.hotel1.phone
            })
            .then(response => {
                commit("HOTEL_REG", {
                    name: context.hotel1.name,
                    owner: context.hotel1.owner
                });
                context.$isLoading(false);
                alertify.success("Hotel Registered Successfully");
                context.$router.push("/");
            })
            .catch(err => {
                if (err.response.status == 401) {
                    context.$isLoading(false);
                    alertify.error(err.response.data.error);
                }
                if (err.response.status == 422) {
                    context.$isLoading(false);
                    alertify.error("Empty Fields");
                }
            });
    },
    FetchHotel({ commit }) {
        axios
            .get("http://127.0.0.1:8000/api/Hotel_data")
            .then(response => {
                if (response.data.Hotellist.length == 0) {
                    alertify.error("No Hotel Registered Yet");
                } else {
                    commit("FETCH_HOTEL", response.data.Hotellist);
                }
            })
            .catch(err => {
                console.log(err);
            });
    },
    changestatus({ commit }, { id1 }) {
        axios
            .get(`http://127.0.0.1:8000/api/accept/${id1}`)
            .then(response => {
                commit("SELECTED_HOTELS", { id1 });
                alertify.success(response.data.msg);
            })
            .catch(err => {
                console.log(err);
            });
    },
    DeleteHotel({ commit }, { id2 }) {
        axios
            .delete(`http://127.0.0.1:8000/api/Delete/${id2}`)
            .then(response => {
                commit("DELETED_HOTELS", { id2 });
                alertify.error(response.data.msg);
            })
            .catch(err => {
                console.log(err);
            });
    },
    ApprovedHotel({ commit }) {
        axios
            .get("http://127.0.0.1:8000/api/Aprroved_hotel")
            .then(response => {
                if (response.data.hoteldata.length == 0) {
                    alertify.error("No Hotel Approved Yet");
                } else {
                    commit("APPROVED_HOTEL", response.data.hoteldata);
                }
            })
            .catch(err => {
                console.log(err);
            });
    },
    UpdateHotel({ commit }, { id, hotel }) {
        axios
            .post(`http://127.0.0.1:8000/api/update_hotel/${id}`, {
                Hot_name: hotel.Hot_name,
                Hot_loc: hotel.Hot_loc,
                Hot_address: hotel.Hot_address,
                name: hotel.name,
                email: hotel.email,
                phone: hotel.phone
            })
            .then(response => {
                commit("UPDATE_HOTEL", {
                    Hotel_name: hotel.Hot_name,
                    Owner: hotel.name,
                    response: response.data.message
                });
                alertify.success(response.data.message);
            });
    },
    DeleteAppHotel({ commit }, { id }) {
        axios
            .delete(`http://127.0.0.1:8000/api/DeleteAppHotel/${id}`)
            .then(response => {
                commit("DELETED_APP_HOTELS", { id });
                alertify.error(response.data.msg);
            })
            .catch(err => {
                console.log(err);
            });
    },
    Hotellog({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/Hotellog", {
                email: context.hotel2.email,
                password: context.hotel2.password
            })
            .then(response => {
                commit("HOTEL_LOG", {
                    email: response.data.email,
                    id: response.data.id
                });
                sessionStorage.setItem("hotelid", response.data.id);
                sessionStorage.setItem("hotelemail", response.data.email);
                sessionStorage.setItem("hotelowner", response.data.owner);
                context.$isLoading(false);
                alertify.success("Successfully Logged In");
                context.$router.push("/Hotel_dash");
            })
            .catch(err => {
                if (err.response.status == 401) {
                    context.$isLoading(false);
                    alertify.error(err.response.data.msg);
                }
                if (err.response.status == 422) {
                    context.$isLoading(false);
                    alertify.error("Empty Fields");
                }
            });
    },
    changepassword({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/changepass", {
                email: context.change.email,
                password: context.change.password
            })
            .then(response => {
                commit("HOTEL_CHANGE_PASS", {
                    email: context.change.email
                });
                context.$isLoading(false);
                sessionStorage.removeItem("hotelemail");
                sessionStorage.removeItem("hotelowner");
                sessionStorage.removeItem("hotelid");
                alertify.success("Password changed Successfully");
                context.$router.push("/Hotel_login");
            });
    },
    AddExtra({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/Extra_Data", {
                hotel: context.extra.Hot_name,
                days: context.extra.days,
                rooms: context.extra.rooms,
                timings: context.extra.timings,
                amount: context.extra.amount
            })
            .then(response => {
                commit("EXTRA_DATA_INSERT", {
                    hotel: context.extra.Hot_name
                });
                context.$isLoading(false);
                alertify.success(response.data.msg);
                context.$router.push("/Hotel_dash");
            })
            .catch(err => {
                context.$isLoading(false);
                alertify.error(err.response.data.msg);
                context.$router.push("/check_status");
            });
    },
    Approve_extra({ commit }) {
        axios
            .get("http://127.0.0.1:8000/api/Aprrove_Extra")
            .then(response => {
                commit("APPROVED_EXTRA", response.data.hotelExtra);
            })
            .catch(err => {
                console.log(err);
            });
    },
    gethotel({ commit }) {
        axios
            .get("http://127.0.0.1:8000/api/gethotel")
            .then(response => {
                commit("GET_HOTEL", response.data.gethotel);
            })
            .catch(err => {
                console.log(err);
            });
    },
    UserRegister({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/usereg", {
                name: context.user.name,
                email: context.user.email,
                phone: context.user.phone,
                password: context.user.password
            })
            .then(response => {
                if (response.status == 200) {
                    commit("SET_USER", {
                        name: context.user.name
                    });
                    context.$isLoading(false);
                    alertify.success("Registered Successfully");
                    context.$router.push("/Userlog");
                }
            })
            .catch(err => {
                if (err.response.status == 401) {
                    context.$isLoading(false);
                    alertify.error(err.response.data.message1);
                }
                if (err.response.status == 422) {
                    context.$isLoading(false);
                    alertify.error("Empty Fields");
                }
            });
    },
    Userlog({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/userlog", {
                email: context.user1.email,
                password: context.user1.password
            })
            .then(response => {
                context.$isLoading(false);
                commit("USER_LOGIN", { email: context.user1.email });
                sessionStorage.setItem("userid", response.data.id);
                sessionStorage.setItem("useremail", response.data.email);
                sessionStorage.setItem("username", response.data.name);
                alertify.success("Logged In Successfully");
                context.$router.push("/user_dash");
            })
            .catch(err => {
                if (err.response.status == 401) {
                    context.$isLoading(false);
                    alertify.error(err.response.data.message1);
                }
                if (err.response.status == 422) {
                    context.$isLoading(false);
                    alertify.error("Empty Fields");
                }
            });
    },
    Updateuser({ commit }, { id, user1 }) {
        axios
            .post(`http://127.0.0.1:8000/api/update_user/${id}`, {
                name: user1.name,
                email: user1.email,
                phone: user1.phone
            })
            .then(response => {
                commit("UPDATE_USER", {
                    name: user1.name,
                    email: user1.email,
                    response: response.data.message
                });
                alertify.success(response.data.message);
            });
    },
    booking_reg({ commit }, context) {
        context.$isLoading(true);
        axios
            .post("http://127.0.0.1:8000/api/bookreg", {
                name: context.book.name,
                email: context.book.email,
                phone: context.book.phone,
                arrival: context.book.arrival,
                days: context.book.days,
                rooms: context.book.rooms,
                hotelid: sessionStorage.getItem("bookid")
            })
            .then(res => {
                commit("BOOK_REG", {
                    name: context.book.name
                });
                context.$isLoading(false);
                alertify.success(res.data.msg);
                context.$router.push("/user_dash");
            })
            .catch(err => {
                console.log(err);
            });
    },
    Bookinglist({ commit }, { id }) {
        axios.get(`http://127.0.0.1:8000/api/booking/${id}`).then(response => {
            if (response.data.data.length == 0) {
                alertify.error("No Booking Yet");
            }
            commit("BOOKED_HOTEl", response.data.data);
        });
    },
    bookingstatus({ commit }, { id1 }) {
        axios
            .get(`http://127.0.0.1:8000/api/booked_id/${id1}`)
            .then(response => {
                commit("BOOKED", response.data.msg);
                alertify.success(response.data.msg);
                location.reload();
            })
            .catch(err => {
                console.log(err);
            });
    },
    DeleteBooking({ commit }, { id2 }) {
        axios
            .delete(`http://127.0.0.1:8000/api/Delete_booking/${id2}`)
            .then(response => {
                commit("DELETED_BOOKING", { id2 });
                alertify.error(response.data.msg);
            })
            .catch(err => {
                console.log(err);
            });
    }
};

const mutations = {
    SET_ADMIN(state, data) {
        state.adminreg = data;
    },
    ADMIN_LOGIN(state, data) {
        state.adminlog = data;
    },
    HOTEL_REG(state, data) {
        state.hotel = data;
    },
    FETCH_HOTEL(state, data) {
        state.fetchotel = data;
    },
    SELECTED_HOTELS(state, { id1 }) {
        state.status = id1;
    },
    DELETED_HOTELS(state, { id2 }) {
        state.reject = id2;
    },
    APPROVED_HOTEL(state, data) {
        state.Apphotel = data;
    },
    UPDATE_HOTEL(state, data) {
        state.updated = data;
    },
    DELETED_APP_HOTELS(state, data) {
        state.delapphot = data;
    },
    HOTEL_LOG(state, data) {
        state.hotellog = data;
    },
    HOTEL_CHANGE_PASS(state, data) {
        state.change = data;
    },
    EXTRA_DATA_INSERT(state, data) {
        state.extra = data;
    },
    APPROVED_EXTRA(state, data) {
        state.hotelextra = data;
    },
    GET_HOTEL(state, data) {
        state.gethotel = data;
    },
    SET_USER(state, data) {
        state.userreg = data;
    },
    USER_LOGIN(state, data) {
        state.userlog = data;
    },
    UPDATE_USER(state, data) {
        state.user_updated = data;
    },
    BOOK_REG(state, data) {
        state.book = data;
    },
    BOOKED_HOTEl(state, data) {
        state.booking = data;
    },
    BOOKED(state, data) {
        state.status = data;
    },
    DELETED_BOOKING(state, data) {
        state.delbooking = data;
    }
};
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
