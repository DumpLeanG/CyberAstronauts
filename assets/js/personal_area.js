function openForm() {
    document.querySelector(".personal_area_block_form").style.display = "flex";
    document.querySelector(".personal_area_block_bookings").style.display = "none";
    document.getElementById("personal_form").classList.add("personal_area_block_list_current_item");
    document.getElementById("personal_bookings").classList.remove("personal_area_block_list_current_item");
}
function openBookings() {
    document.querySelector(".personal_area_block_bookings").style.display = "flex";
    document.querySelector(".personal_area_block_form").style.display = "none";
    document.getElementById("personal_form").classList.remove("personal_area_block_list_current_item");
    document.getElementById("personal_bookings").classList.add("personal_area_block_list_current_item");
}