<div class="product-home danh-muc-tin-page">
    <div class="wrapper clearfix">
        <div class="register_noti"> </div>
        <form id="frmdangky" action="dang-ky.html" method="post" enctype="multipart/form-data">
            <div class="payment_col1">
                <div class="payment_box">
                    <div class="payment_title"> <span>Thông tin tài khoản</span> </div>
                    <div class="payment_content">
                        <div class="payment_line">
                            <label>Tên tài khoản *</label>
                            <input type="text" name="taikhoan_user" value="" placeholder="Tài khoản" id="taikhoan_user" class="validate[required,minSize[3]]" required="">
                            <p id="lbuser"></p>
                        </div>
                        <div class="payment_line">
                            <label>Mật khẩu *</label>
                            <input type="password" name="taikhoan_pass" value="" placeholder="Mật khẩu" id="taikhoan_pass" class="validate[required,minSize[6]]" required=""> </div>
                        <div class="payment_line">
                            <label>Nhập lại mật khẩu *</label>
                            <input type="password" name="txtrepass" value="" placeholder="Nhập lại mật khẩu" id="txtrepass" class="validate[required,equals[taikhoan_pass]]" required=""> </div>
                        <div class="payment_line">
                            <label>Địa chỉ Email *</label>
                            <input type="email" name="taikhoan_email" value="" placeholder="Email" id="taikhoan_email" class="validate[required,custom[email]]" required=""> </div>
                        <div class="payment_line">
                            <label>Mã xác nhận *</label>
                            <p style="margin-top:10px;">
                                <input type="text" name="txtser" id="txtser" value="" style="width:150px; margin:0;" maxlength="6" required=""> <img src="ma-bao-mat.png" alt="Mã bảo mật" id="imgser"> <img src="http://idcviettri.com/templates/default/user/images/refresh.png" alt="Thay mã bảo mật" class="refresh" style="opacity:0.8 ; filter:alpha(opacity=80); cursor:pointer">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="payment_box">
                    <div class="payment_title"> <span>Thông tin liên hệ</span> </div>
                    <div class="payment_content">
                        <div class="payment_line">
                            <label>Họ tên của bạn *</label>
                            <input type="text" name="taikhoan_hoten" value="" placeholder="Họ tên" id="taikhoan_hoten" class="validate[required]" required=""> </div>
                        <div class="payment_line">
                            <label>Điện thoại *</label>
                            <input type="text" name="taikhoan_phone" value="" placeholder="Điện thoại" id="input-telephone" class="validate[required,custom[onlyNumberSp]]"> </div>
                        <div class="payment_line">
                            <label>Địa chỉ (số nhà, đường, tỉnh thành) *</label>
                            <textarea class=" validate[required]" name="taikhoan_diachi" cols="40" rows="10" id="taikhoan_diachi"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment_col2">
                <div class="submit_order_bar">
                    <input type="submit" name="btnreg" class="submitregister" value="Đăng ký tài khoản"> </div>
            </div>

        </form>
    </div>
</div>