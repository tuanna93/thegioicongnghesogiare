function xacnhanxoa(msg){
    if(window.confirm(msg)){
        return true;
    }
    return false;
}
$(document).ready(function(){
    $('#kieutrang').change(function(){
        $id = $(this).val();
        $.ajax({
            url : "/admin/loadkieutrang-"+$id,
            method : "get",
            success: function($data){
                $('#loadkieutrang').html($data);
            }
        });
    });
    $('#')
});