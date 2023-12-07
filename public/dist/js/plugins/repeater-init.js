$(function () {
    "use strict";

    // Default
    $(".repeater-default").repeater();

    // Custom Show / Hide Configurations
    $(".file-repeater, .email-repeater").repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function (remove) {
            if (confirm("Are you sure you want to remove this item?")) {
                $(this).slideUp(remove);
            }
        },
    });
});




var room = 1;

function education_fields() {
    room++;
    var objTo = document.getElementById("education_fields");
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "mb-3 removeclass" + room);
    var rdiv = "removeclass" + room;
    divtest.innerHTML =
        '<form class="row"><div class="col-sm-6"><div class="form-group"> <textarea name="pertanyaan" id="pertanyaan" cols="40" rows="1" placeholder="Pertanyaan" class="form-control" style="resize: none"></textarea></div></div><div class="col-sm-4"> <div class="form-group"> <select class="form-control" id="educationDate" name="educationDate"><option selected disabled >Status</option> <option value="fav">Favorite</option> <option value="unfav">Tidak Favorite</option> </select> </div></div><div class="col-sm-2"> <div class="form-group text-center"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
        room +
        ');"> <i class="ti ti-minus"></i> </button> </div></div></form>';

    objTo.appendChild(divtest);
}

function remove_education_fields(rid) {
    $(".removeclass" + rid).remove();
}
