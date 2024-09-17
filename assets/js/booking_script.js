function openBookingForm() {
    document.getElementById("booking_form").style.display = "block";
}
function closeBookingForm() {
    document.getElementById("booking_form").style.display = "none";
}

function openFirstStep() {
    document.querySelector(".form_box3_booking_services").style.display = "flex";
    document.querySelector(".form_box3_booking_devices").style.display = "none";
    document.getElementById("step2").classList.remove("form_box3_booking_steps_active_item");
    document.getElementById("step1").classList.add("form_box3_booking_steps_active_item");
    document.getElementById("step1").classList.remove("form_box3_booking_steps_completed_item");
}

function openSecondStep() {
    var service_radio = $('input[name=service_radio]:checked').val();
    if(service_radio != undefined) {
        document.querySelector(".form_box3_booking_services").style.display = "none";
        document.querySelector(".form_box3_booking_devices").style.display = "flex";
        document.querySelector(".form_box3_booking_halls").style.display = "none";
        document.getElementById("step3").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step2").classList.add("form_box3_booking_steps_active_item");
        document.getElementById("step1").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step1").classList.add("form_box3_booking_steps_completed_item");
        document.getElementById("step2").classList.remove("form_box3_booking_steps_completed_item");
        if(service_radio == 'booking') {
            document.getElementById('booking_variants').classList.add("active");
            document.getElementById('rental_variants').classList.remove("active");
        } else if(service_radio == 'rental') {
            document.getElementById('rental_variants').classList.add("active");
            document.getElementById('booking_variants').classList.remove("active");
        }
    } else {
        alert('Выберите услугу!');
    }
}
function openThirdStep() {
    var device_radio = $('input[name=device_radio]:checked').val();
    var service_radio = $('input[name=service_radio]:checked').val();
    document.getElementById("info").style.display = "none";
    document.getElementById("inforental").style.display = "none";
    if(device_radio != undefined) {
        document.querySelector(".form_box3_booking_devices").style.display = "none";
        document.querySelector(".form_box3_booking_halls").style.display = "flex";
        document.querySelector(".form_box3_booking_info").style.display = "none";
        document.getElementById("step4").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step3").classList.add("form_box3_booking_steps_active_item");
        document.getElementById("step2").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step2").classList.add("form_box3_booking_steps_completed_item");
        document.getElementById("step3").classList.remove("form_box3_booking_steps_completed_item");
        if((device_radio == 'PC') && (service_radio == 'booking')) {
            document.getElementById('pc_variants').classList.add("active");
            document.getElementById('ps5_variants').classList.remove("active");
            document.getElementById('vr_variants').classList.remove("active");
            document.getElementById('pcr_variants').classList.remove("active");
            document.getElementById('ps5r_variants').classList.remove("active");
            document.getElementById('vrr_variants').classList.remove("active");
        } else if((device_radio == 'PS5') && (service_radio == 'booking')) {
            document.getElementById('ps5_variants').classList.add("active");
            document.getElementById('pc_variants').classList.remove("active");
            document.getElementById('vr_variants').classList.remove("active");
            document.getElementById('pcr_variants').classList.remove("active");
            document.getElementById('ps5r_variants').classList.remove("active");
            document.getElementById('vrr_variants').classList.remove("active");
        } else if((device_radio == 'VR') && (service_radio == 'booking')) {
            document.getElementById('vr_variants').classList.add("active");
            document.getElementById('ps5_variants').classList.remove("active");
            document.getElementById('pc_variants').classList.remove("active");
            document.getElementById('pcr_variants').classList.remove("active");
            document.getElementById('ps5r_variants').classList.remove("active");
            document.getElementById('vrr_variants').classList.remove("active");
        } else if((device_radio == 'PC') && (service_radio == 'rental')) {
            document.getElementById('pc_variants').classList.remove("active");
            document.getElementById('ps5_variants').classList.remove("active");
            document.getElementById('vr_variants').classList.remove("active");
            document.getElementById('pcr_variants').classList.add("active");
            document.getElementById('ps5r_variants').classList.remove("active");
            document.getElementById('vrr_variants').classList.remove("active");
        } else if((device_radio == 'PS5') && (service_radio == 'rental')) {
            document.getElementById('ps5_variants').classList.remove("active");
            document.getElementById('pc_variants').classList.remove("active");
            document.getElementById('vr_variants').classList.remove("active");
            document.getElementById('pcr_variants').classList.remove("active");
            document.getElementById('ps5r_variants').classList.add("active");
            document.getElementById('vrr_variants').classList.remove("active");
        } else if((device_radio == 'VR') && (service_radio == 'rental')) {
            document.getElementById('vr_variants').classList.remove("active");
            document.getElementById('ps5_variants').classList.remove("active");
            document.getElementById('pc_variants').classList.remove("active");
            document.getElementById('pcr_variants').classList.remove("active");
            document.getElementById('ps5r_variants').classList.remove("active");
            document.getElementById('vrr_variants').classList.add("active");
        }
    } else {
        alert('Выберите устройство!');
    }
}
function openFourthStep() {
    var service_radio = $('input[name=service_radio]:checked').val();
    var hall_radio = $('input[name=hall_radio]:checked').val();
    if(hall_radio != undefined) {
        document.querySelector(".form_box3_booking_halls").style.display = "none";
        document.getElementById("step5").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step4").classList.add("form_box3_booking_steps_active_item");
        document.getElementById("step3").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step3").classList.add("form_box3_booking_steps_completed_item");
        document.getElementById("step4").classList.remove("form_box3_booking_steps_completed_item");
        if(service_radio == 'booking') {
            document.getElementById("info").style.display = "flex";
            document.getElementById("info2").style.display = "none";
            document.getElementById("inforental").style.display = "none";
            document.getElementById("inforental2").style.display = "none";
        } else if(service_radio == 'rental') {
            document.getElementById("info").style.display = "none";
            document.getElementById("info2").style.display = "none";
            document.getElementById("inforental").style.display = "flex";
            document.getElementById("inforental2").style.display = "none";
        }
    } else {
        alert('Выберите тариф!');
    }
}

function openFifthStep() {
    var service_radio = $('input[name=service_radio]:checked').val();
    var bname = $('input[name=bname]').val();
    var bphone = $('input[name=bphone]').val();
    var bdate = $('input[name=bdate]').val();
    var rname = $('input[name=rname]').val();
    var rphone = $('input[name=rphone]').val();
    var hall_radio = $('input[name=hall_radio]:checked').val();
    var device_radio = $('input[name=device_radio]:checked').val();
    if (((bname.length != 0) && (bphone.length != 0) && (bdate.length != 0)) || ((rname.length != 0) && (rphone.length != 0))) {
        document.querySelector(".form_box3_booking_halls").style.display = "none";
        document.getElementById("step5").classList.add("form_box3_booking_steps_active_item");
        document.getElementById("step4").classList.remove("form_box3_booking_steps_active_item");
        document.getElementById("step4").classList.add("form_box3_booking_steps_completed_item");
        document.getElementById("step5").classList.remove("form_box3_booking_steps_completed_item");
        if(service_radio == 'booking') {
            document.getElementById("info").style.display = "none";
            document.getElementById("info2").style.display = "flex";
            document.getElementById("inforental").style.display = "none";
            document.getElementById("inforental2").style.display = "none";
            document.querySelector('input[name=bstart]').setAttribute('required', true);
            document.querySelector('input[name=bend]').setAttribute('required', true);
            if(device_radio == 'PC') {
                if(hall_radio == 'STANDARD') {
                    document.getElementById("placestandard").style.display = "flex";
                    document.getElementById("placegold").style.display = "none";
                    document.getElementById("placeplatinum").style.display = "none";
                    document.getElementById("placediamond").style.display = "none";
                    document.getElementById("placeps5").style.display = "none";
                    document.getElementById("placevr").style.display = "none";
                } else if(hall_radio == 'GOLD') {
                    document.getElementById("placestandard").style.display = "none";
                    document.getElementById("placegold").style.display = "flex";
                    document.getElementById("placeplatinum").style.display = "none";
                    document.getElementById("placediamond").style.display = "none";
                    document.getElementById("placeps5").style.display = "none";
                    document.getElementById("placevr").style.display = "none";
                } else if(hall_radio == 'PLATINUM') {
                    document.getElementById("placestandard").style.display = "none";
                    document.getElementById("placegold").style.display = "none";
                    document.getElementById("placeplatinum").style.display = "flex";
                    document.getElementById("placediamond").style.display = "none";
                    document.getElementById("placeps5").style.display = "none";
                    document.getElementById("placevr").style.display = "none";
                } else if(hall_radio == 'DIAMOND') {
                    document.getElementById("placestandard").style.display = "none";
                    document.getElementById("placegold").style.display = "none";
                    document.getElementById("placeplatinum").style.display = "none";
                    document.getElementById("placediamond").style.display = "flex";
                    document.getElementById("placeps5").style.display = "none";
                    document.getElementById("placevr").style.display = "none";
                }
            } else if(device_radio == 'PS5') {
                if(hall_radio == 'PS5') {
                    document.getElementById("placestandard").style.display = "none";
                    document.getElementById("placegold").style.display = "none";
                    document.getElementById("placeplatinum").style.display = "none";
                    document.getElementById("placediamond").style.display = "none";
                    document.getElementById("placeps5").style.display = "flex";
                    document.getElementById("placevr").style.display = "none";
                }
            } else if(device_radio == 'VR') {
                if(hall_radio == 'VR') {
                    document.getElementById("placestandard").style.display = "none";
                    document.getElementById("placegold").style.display = "none";
                    document.getElementById("placeplatinum").style.display = "none";
                    document.getElementById("placediamond").style.display = "none";
                    document.getElementById("placeps5").style.display = "none";
                    document.getElementById("placevr").style.display = "flex";
                }
            }
        } else if(service_radio == 'rental') {
            document.getElementById("info").style.display = "none";
            document.getElementById("info2").style.display = "none";
            document.getElementById("inforental").style.display = "none";
            document.getElementById("inforental2").style.display = "flex";
            document.querySelector('input[name=rstart]').setAttribute('required', true);
            document.querySelector('input[name=rend]').setAttribute('required', true);
        }
    } else {
        alert('Введите данные!');
    }
}