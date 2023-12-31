function message(mes, bgcolor, textcolor, icn, head) {
    $.toast({
        text: mes,
        loader: false,
        allowToastClose: true,
        heading: head,
        position: "top-right",
        hideAfter: 5000,
        showHideTransition: "slide",
        bgColor: bgcolor,
        textColor: textcolor,
        icon: icn,
    });
}
function initCap(value) {
    return value
        .toLowerCase()
        .replace(/(?:^|[^a-zØ-öø-ÿ])[a-zØ-öø-ÿ]/g, function (m) {
            return m.toUpperCase();
        });
}

function isValidEmailAddress(dv) {
    var reexp =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var eID = $(dv).attr("id");
    var rvar = $("#" + eID).val();

    if (reexp.test(rvar) == true) {
        $("#" + eID).css("color", "green");
    } else {
        $("#" + eID).css("color", "red");
    }
}

function isValidmobile(mNum) {
    var pattern = new RegExp(/^(?:\+88|88)?(01[3-9]\d{8})$/);
    return pattern.test(mNum);
}

function MobileCountValidate(thisval) {
    var tID = $(thisval).attr("id");

    $("#" + tID).val(
        $("#" + tID)
            .val()
            .replace(/[^0-9.]/g, "")
            .replace(/(\..*?)\..*/g, "$1")
    );

    if ($("#" + tID).val().length == 11) {
        $("#" + tID).css("color", "green");
    } else {
        $("#" + tID).css("color", "red");
    }
}

function EmptyValueFocus(params) {
    for (i = 0; i < params.length; i++) {
        var vName = $("#" + params[i]).val();
        if (vName == "") {
            message(
                "Need " + params[i] + " Value",
                "#FF0000",
                "white",
                "error",
                "Error"
            );
            $("#" + params[i]).focus();
            return false;
        }
    }
    return true;
}

function editValuePst(keysArray, valuesArray) {
    for (var i = 0; i < keysArray.length; i++) {
        $("#" + keysArray[i]).val(
            valuesArray[i] == "null" ? "" : valuesArray[i]
        );
    }
}
