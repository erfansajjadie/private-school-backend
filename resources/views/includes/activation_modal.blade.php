<div class="modal fade modal-user" id="modalActivation">
    <div class="modal-dialog max-width-400">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">کد فعال‌سازی</div>
                <button type="button" class="close fa fa-times-circle" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="mobile-recovery-form" action="{{route('verify-otp')}}" method="POST">
                    <div class="form-group">
                        <div class="input-fa">
                            <i class="fa fa-envelope"></i>
                            <input id="activation_code" name="activation" value="" class="form-control" type="text"
                                   placeholder="کد فعال‌سازی خود را وارد نمایید." >
                        </div>
                    </div>
                    <div>
                        <button class=" btn btn-lg btn-block btn-primary js-confirm-activation-code" type="button"
                                data-sitekey="6LcihpoUAAAAAF3jmXblZp85RW-TVAlOpGapCm1j"
                                data-token="YleuQwqCYHVmnXvy8UGpL791IAPWOySgsk0bBNyd">
                            <span>ورود</span>
                            <i class="icon-loading"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span>اگر کد فعال‌سازی ارسال نشد، دوباره</span>
                <button class="btn btn-link js-lost">درخواست بدهید.</button>
            </div>
        </div>
    </div>
</div>
