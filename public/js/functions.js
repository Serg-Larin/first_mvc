function callMessage(res){
        let response = JSON.parse(res);
        switch (response.code){
            case 1: toastr.success(response.message);
                break;
            case 2: toastr.warning(response.message);
                break;
            case 3: toastr.error(response.message);
                break;
        }
}
