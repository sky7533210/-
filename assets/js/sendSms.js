function sendsms(phone,what,callback) {
    $.ajax({
        url:"/getsmscode"
        ,type: 'post'
        ,data:{
            phone:phone
            ,what:what
        }
        ,dataType:'json'
        ,success: function (response) {
            callback(response);
        }
    });
}
