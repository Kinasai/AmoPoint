$(function () {

    function updateFields() {

        var value = $('[name="type_val"]').val();

        $('p').hide();

        $('[name="type_val"]').closest('p').show();

        $('[name*="' + value + '"]').closest('p').show();
    }

    $('[name="type_val"]').on('change', updateFields);

    updateFields();
});