uploadImageJob = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "imageuploadImageJob",


        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

uploadImageCompany = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "imageUploadCompany",


        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

uploadSettingImage = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "SettingImage",
        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}