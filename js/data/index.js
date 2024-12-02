document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll("input[name='selected_ids[]']");
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
};
