var addWarning = function (content) {
    $("#warnings").append('<div class="alert alert-warning"><strong>Uwaga! </strong>' + content + '</div>');
};

var getOdczynniki = function () {
    $.get("odczynniki/closeToExpirationDate", function (data) {
        data.forEach(function (item, index) {
           addWarning("W krótce kończy się data ważności odczynnika \"<a href='odczynniki/" + item.ID + "'>" + item.nazwa + '</a>\".');
        });
    });
};

var getUrzadzenia = function () {
    $.get("urzadzenia/closeToExpirationDate", function (data) {
        data.forEach(function (item, index) {
            addWarning("Zbliża się data wymiany filtra w urządzeniu \"<a href='urzadzenia/" + item.ID + "'>" + item.nazwa + '</a>\".');
        });
    });
};


$(document).ready(function () {
    getOdczynniki();
    getUrzadzenia();
});