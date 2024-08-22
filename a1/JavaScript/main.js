document.querySelector('.dropdown').addEventListener('change', function() {
    var selectedOption = this.value;
    console.log("Selected option: " + selectedOption);
    if (selectedOption) {
        location.href = selectedOption;
    }
});
