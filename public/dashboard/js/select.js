const checkAll = document.getElementById("checkAll");
const checkboxes = document.querySelectorAll(".item");
checkAll.addEventListener("change", function() {
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});
checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", function() {
        if (!this.checked) {
            checkAll.checked = false;
        } 
        else if (document.querySelectorAll(".item:checked").length === checkboxes.length) {
            checkAll.checked = true;
        }
    });
});
