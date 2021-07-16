<template>
    <v-app>
        <div>
            <br />
            <ul class="nav justify-content-center">
                <li class="nav-item" id="pills">
                    <a class="nav-link active" href="">Home</a>
                </li>
                &nbsp;&nbsp; &nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <router-link
                            to="/Adminlog"
                            style="text-decoration:none;color:inherit"
                            >Admin
                        </router-link></a
                    >
                </li>

                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >Hotel</a
                    >
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">
                            <router-link
                                to="/Hotel_login"
                                style="text-decoration:none;color:inherit"
                                ><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login
                            </router-link></a
                        >

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="">
                            <router-link
                                to="/Hotel_reg_form"
                                style="text-decoration:none;color:inherit"
                                ><i class="fa fa-user-plus"></i
                                >&nbsp;&nbsp;Register
                            </router-link></a
                        >
                    </div>
                </li>
                &nbsp; &nbsp; &nbsp; &nbsp;
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >User</a
                    >
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">
                            <router-link
                                to="/Userlog"
                                style="text-decoration:none;color:inherit"
                                ><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login
                            </router-link></a
                        >

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="">
                            <router-link
                                to="/Userreg"
                                style="text-decoration:none;color:inherit"
                                ><i class="fa fa-user-plus"></i
                                >&nbsp;&nbsp;Register</router-link
                            ></a
                        >
                    </div>
                </li>
            </ul>

            <div
                style="
                     background: url('hom1.png') no-repeat ; background-size: 650px;background-position: right;margin-right:30px"
            >
                <div class="container">
                    <div class="row"></div>
                </div>
                <br /><br /><br /><br />
                <div class="container">
                    <h1 class="head">
                        BOOK YOUR HOTEL <br /><span>NOW.</span>
                    </h1>
                    <p>
                        Goal Setting Is One Of The Most Important Activities<br />
                        You Can Do In Small Business Regardless<br />
                        Of How Old Our Business Is.
                    </p>
                    <router-link to="/Userreg">
                        <a
                            class="btn btn-infos"
                            style="background-color: #e53935"
                            id="info-btn"
                            >Start Now</a
                        >
                    </router-link>
                    <div class="media-icons"></div>
                </div>
            </div>
        </div>
    </v-app>
</template>
<style scoped>
ul li a {
    color: black;
    text-decoration: none;
    letter-spacing: 1px;
    padding: 2px 15px;
    transition: 0.3s;
    font-size: 18px;
    font-family: Bahnschrift;
    margin-top: 4px;
}
ul li:hover {
    background-color: #3949ab;
}
ul li a:hover {
    color: white;
}
#pills {
    background-color: #3949ab;
    width: 80px;
    height: 37px;
    box-shadow: 3px 6px 10px 6px rgba(0, 0, 0, 0.2);
}
#pills a {
    color: white;
    margin-top: 4px;
}
.dropdown-item {
    font-weight: lighter;
}
.dropdown-item:hover {
    color: black;
}
i {
    font-weight: lighter;
}

.media-icons {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    margin-top: 210px;
}
.head {
    color: #5e35b1;
    font-size: 55px;
    text-transform: uppercase;
    font-weight: bolder;
    letter-spacing: 3px;
    line-height: 60px;
    margin-bottom: 30px;

    font-family: Bahnschrift;
}
.head span {
    color: #f4511e;
}
p {
    font-size: 18px;
    font-weight: 550;
    font-family: Bahnschrift;
    margin-top: -10px;
}
#info-btn {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 2px;
    padding: 10px 20px;
    border-radius: 5px;
    transition: 0.3s;
    transition-property: background;
}
</style>
