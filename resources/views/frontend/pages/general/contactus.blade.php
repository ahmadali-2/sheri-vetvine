<div class="modal fade" id="myPopup">
    <div class="modal-dialog custum_popup">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">

                <div class="popup-header">
                    <span class="popup-logo"><img src="{{ asset('frontend/images/popup-logo.png') }}"
                            alt="logo"></span>
                    <span class="close" data-dismiss="modal">&times;</span>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="popup-body">
                    <h2><span>Contact Us</span></h2>
                    <form action="{{ route('contactus.submit') }}" method="POST" class="custom_form" id="conatctusform">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="my-custom_label">*Email Address</label>
                                    <input type="email" name="email" placeholder="" class="my-custom_input">
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="" class="my-custom_label">*First Name</label>
                                    <input type="text" name="firstname" placeholder="" class="my-custom_input">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label for="" class="my-custom_label">*Last Name</label>
                                    <input type="text" name="lastname" placeholder="" class="my-custom_input">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="my-custom_label">*Message</label>
                                    <textarea name="message" id="" class="my-custom_textarea"></textarea>
                                </div>
                            </div>

                        </div>




                </div>
                <div class="popup-footer">
                    <button type="submit" class="toggle button send-msg">Submit</button>
                </div>
            </div>
            </form>



        </div>
    </div>
</div>
