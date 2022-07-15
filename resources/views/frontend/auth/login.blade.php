<button type="button" class="btn btn-primary d-none" id="login_form_show_btn" data-toggle="modal" data-target="#login-modal">
    Launch demo modal
  </button>
    <div class="modal fade show" id="login-modal">
        <div class="modal-dialog custum_popup">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                    <div class="popup-header">
                        <span class="popup-logo"><img src="{{ asset('frontend/images/popup-logo.png') }}" alt="logo"></span>
                        <span class="close" id="login_modal_close" data-dismiss="modal">&times;</span>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="popup-body">
                        <h2 class="member-login"><span>Member Login</span></h2>
                        <div class="register-in-login">new to VETVINE?
                            <a class="Register-Now" href="#"  id="register_show_modal_login">Register now</a>
                        </div>
                        <form action="" method="post" class="custom_form" >

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="my-custom_label">Email</label>
                                        <input type="email" id="useremail" name="useremail" placeholder="" class="my-custom_input">
                                        <span id="emailmsg" style="color: red;"></span>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="my-custom_label">password</label>
                                        <input type="text" id="password" name="password" placeholder="" class="my-custom_input">
                                        <span id="passwordmsg" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <span class="keep-logged"><label for="checkme"><input type="checkbox"
                                                id="checkme"> Keep me logged
                                            in</label></span>
                                    <span class="forgaot"><a href="#">forgot password?</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="popup-footer">
                        <input type="submit" id="loginbtn" value="Log In" class="toggle button send-msg">
                    </div>


                </div>

            </div>
        </div>
    </div>

