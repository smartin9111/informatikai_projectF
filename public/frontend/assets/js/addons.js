$(document).ready(function() {
    // filter input
    if ($('input.filter-input').length) {
        $('input.filter-input').on('keyup', function() {
            const target = $($(this).data('target'));
            const items = $(this).data('items');
            if (!target.length) {
                return;
            }
            const term = $(this).val().toLowerCase();
            console.log(term);
            target.find(items).filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(term) > -1)
            });
        });
    }

    // multiselect
    $('select.multiselect').multiSelect({
        dblClick: true
    });
});
