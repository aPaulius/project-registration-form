module.exports = function() {
    var $measure = $('#project_measure');

    $measure.change(function () {
        var $form = $(this).closest('form');
        var data = {};
        data[$measure.attr('name')] = $measure.val();
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: data,
            success: function (html) {
                $('#project_measureValues').replaceWith(
                    $(html).find('#project_measureValues')
                );
                $('.measure-value-error').remove();
            }
        });
    });
};