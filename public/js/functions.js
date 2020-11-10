function callMessage(res){
        switch (res.code){
            case 1: toastr.success(res.message);
                break;
            case 2: toastr.info(res.message);
                break;
            case 3: toastr.error(res.message);
                break;
            case 4: toastr.warning(res.message);
                break;

        }
        return res.code <= 2;
}

function ajaxRequest(url,data){
       return $.ajax({
            url: url,
            type: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });
}
