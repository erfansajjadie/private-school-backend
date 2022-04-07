<div class="modal fade modal-user" id="modalLogin">
    <div class="modal-dialog max-width-400">
        <div class="modal-content">
            <div class="login">
                <div class="modal-header">
                    <div class="modal-title">ورود به سامانه</div>
                    <button type="button" class="close fa fa-times-circle" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="lost-form" action="{{route('send-otp')}}" action-type="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="lost_mobile">شماره همراه تماس:</label>
                            <div class="input-fa">
                                <i class="fa fa-mobile-alt"></i>
                                <input id="lost_mobile" name="phone" class="form-control" type="text"
                                       placeholder="شماره تماس خود را وارد کنید">
                            </div>
                        </div>
                        <div>
                            <button class=" btn btn-lg btn-block btn-primary js-reset-pass" type="button">
                                <span>ارسال کد</span>
                                <i class="icon-loading"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
