window.onload = function () {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {
        var filesInput = document.getElementById("files");
        filesInput.addEventListener("change", function (event) {
            var files = event.target.files;
            var output = document.getElementById("result");
            output.innerHTML = '';
            if (files.length > 5) {
                alert("Можно выбрать только 5 изображение!");
                filesInput.value = '';
            } else if (filesInput.value == '') {
                alert('Ничего не выбрано')
            }
            for (var i = 0; i < 5; i++) {
                var file = files[i];
                if (!file.type.match('image'))
                    continue;
                var picReader = new FileReader();
                picReader.addEventListener("load", function (event) {
                    var picFile = event.target;
                    var div = document.createElement("div");
                    div.classList = ['m-3 w-80 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'];
                    div.innerHTML = "<img class='' src='" + picFile.result + "'" +
                        "title='" + picFile.name + "'/>";
                    output.insertBefore(div, null);
                });
                picReader.readAsDataURL(file);
            }
        });
    } else {
        console.log("Ваш браузер не поддерживает File API");
    }
}
