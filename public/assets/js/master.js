var addWarning = function (content) {
    $("#warnings").append('<div class="alert alert-warning"><strong>Uwaga! </strong>' + content + '</div>');
};

var addImportantWarning= function (content) {
    $("#warnings").append('<div class="alert alert-danger"><strong>Uwaga! </strong>' + content + '</div>');
};

var checkDate = function(date){
  return new Date(date) > new Date();
};

var getOdczynniki = function () {
    $.get("odczynniki/closeToExpirationDate", function (data) {
        data.forEach(function (item, index) {
            if(checkDate(item.data_waznosci)) {
                addWarning("Zbliża się data (" + item.data_waznosci +") ważności odczynnika \"<a href='odczynniki/" + item.ID + "'>" + item.nazwa + '</a>\".');
            }
            else{
                addImportantWarning("Minęła data (" + item.data_waznosci +") ważności odczynnika \"<a href='odczynniki/" + item.ID + "'>" + item.nazwa + '</a>\".');
            }
        });
    });
};

var getUrzadzenia = function () {
    $.get("urzadzenia/closeToExpirationDate", function (data) {
        data.forEach(function (item, index) {
            if(checkDate(item.data_wymiany_filtr)) {
                addWarning("Zbliża się data (" + item.data_wymiany_filtr +") wymiany filtra w urządzeniu \"<a href='urzadzenia/" + item.ID + "'>" + item.nazwa + '</a>\".');
            }
            else{
                addImportantWarning("Minęła data (" + item.data_wymiany_filtr +") wymiany filtra w urządzeniu \"<a href='urzadzenia/" + item.ID + "'>" + item.nazwa + '</a>\".');
            }
        });
    });
};

var getSprzetJednorazowy= function () {
    $.get("sprzet_jednorazowy/closeToExpirationDate", function (data) {
        data.forEach(function (item, index) {
            if(checkDate(item.data_wymiany_filtr)) {
                addWarning("Zbliża się data (" + item.data_wymiany_filtr +") wymiany filtra w \"<a href='sprzet_jednorazowy/" + item.ID + "'>" + item.nazwa + '</a>\".');
            }
            else{
                addImportantWarning("Minęła data (" + item.data_wymiany_filtr +") wymiany filtra w \"<a href='sprzet_jednorazowy/" + item.ID + "'>" + item.nazwa + '</a>\".');
            }
        });
    });
};

$(document).ready(function () {
    getOdczynniki();
    getUrzadzenia();
    getSprzetJednorazowy();
});