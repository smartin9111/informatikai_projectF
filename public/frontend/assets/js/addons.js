$(document).ready(function() {
    // filter input
    $('body').on('keyup', 'input.filter-input', function() {
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

    // multiselect
    $('select.multiselect').multiSelect({
        dblClick: true,
        selectableHeader: '<input type="text" class="filter-input form-control" data-target="#ms-parts-select .ms-selectable" data-items=".ms-elem-selectable:not(.ms-selected)" placeholder="Szűrés">',
        selectionHeader: '<input type="text" class="filter-input form-control" data-target="#ms-parts-select .ms-selection" data-items=".ms-elem-selection.ms-selected" placeholder="Szűrés">'
    });

    $('#new-offer-button').on('click', function() {
        $('#new-offer-modal').modal('show');
    });
    $('#to-worksheet-button').on('click', function() {
        $('#to-worksheet-modal').modal('show');
    });
    $('#to-invoice-button').on('click', function() {
        $('#to-invoice-modal').modal('show');
    });
});
