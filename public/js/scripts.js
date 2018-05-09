/**
 * Created by luisfernando on 10/25/17.
 */
var characteristic_amount = $('#amount_charac').val();
var x = typeof characteristic_amount === 'undefined' ? 1 : characteristic_amount;

$(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".wrapper-form");
    var add_button = $(".add-form-field");

    $(add_button).click(function (e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            var id = 'id=field'+x;
            var function_ = 'onclick="delete_(' + x + ')"';
            $(wrapper).append('<div ' + id + ' class="input-group"> <textarea rows="2"  name="characteristic[]"  class="form-control" placeholder="Característica"></textarea><span class="input-group-btn">'+
                '<a style="height: 54px;" href="#" class="btn btn-danger" ' + function_ + '><i class="fa fa-minus" aria-hidden="true"></i></a></span></div>'); //add input box
        }
        else {
            bootbox.alert('Limite máximo de ' + max_fields + ' campos.');
        }

    });
});

function delete_($id) {
    $('#field' + $id).remove();
    x--;
}