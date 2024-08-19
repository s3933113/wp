document.querySelector('.dropdown').addEventListener('change', function() {
    var selectedOption = this.value;
    if (selectedOption) {
        location.href = selectedOption;
    }
});
