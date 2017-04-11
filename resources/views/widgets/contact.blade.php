<div class="product-home danh-muc-tin-page">
    <div class="wrapper clearfix">
        <div class="contacform clearfix">
            <div class="ctfulltitle">
                <h3>Gửi thông tin liên hệ</h3> </div>
            <div class="leftform">
                <form action="" method="post">
                {!! csrf_field() !!}
                    <div class="formrow">
                        <label>Họ và tên (<span>*</span>)</label>
                        <input type="text" name="txthoten" value="" required=""> </div>
                    <div class="formrow">
                        <label>Địa chỉ Email (<span>*</span>)</label>
                        <input type="email" name="txtemail" value="" required=""> </div>
                    <div class="formrow">
                        <label>Điện thoại (<span>*</span>)</label>
                        <input type="text" name="txtdienthoai" value="" required=""> </div>
                    <div class="formrow">
                        <label>Nội dung (<span>*</span>)</label>
                        <textarea name="txtnoidung" required=""></textarea>
                    </div>
                    <input type="submit" class="submitlh" name="btngui" value="Gửi liên hệ" style="margin-top: 10px">
                </form>
            </div>
            <div class="rightform">
                <h3>Giới thiệu công ty</h3>
                <div class="textcontent">
                        {!! \App\Helpers\Helpers::page_get_option('contact') !!}
                </div>
            </div>
        </div>
    </div>
</div>