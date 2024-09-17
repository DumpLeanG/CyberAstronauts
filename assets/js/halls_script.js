function openSTANDARDhall() {
    document.getElementById("STANDARD").style.display = "block";
    document.getElementById("GOLD").style.display = "none";
    document.getElementById("PLATINUM").style.display = "none";
    document.getElementById("DIAMOND").style.display = "none";
    document.getElementById("VR").style.display = "none";
    document.getElementById("PS5").style.display = "none";
    document.getElementById("STANDARD_btn").classList.add('halls_block_buttons_current_btn');
    document.getElementById("GOLD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PLATINUM_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("DIAMOND_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("VR_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PS5_btn").classList.remove('halls_block_buttons_current_btn');
}

function openGOLDhall() {
    document.getElementById("STANDARD").style.display = "none";
    document.getElementById("GOLD").style.display = "block";
    document.getElementById("PLATINUM").style.display = "none";
    document.getElementById("DIAMOND").style.display = "none";
    document.getElementById("VR").style.display = "none";
    document.getElementById("PS5").style.display = "none";
    document.getElementById("STANDARD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("GOLD_btn").classList.add('halls_block_buttons_current_btn');
    document.getElementById("PLATINUM_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("DIAMOND_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("VR_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PS5_btn").classList.remove('halls_block_buttons_current_btn');
}

function openPLATINUMhall() {
    document.getElementById("STANDARD").style.display = "none";
    document.getElementById("GOLD").style.display = "none";
    document.getElementById("PLATINUM").style.display = "block";
    document.getElementById("DIAMOND").style.display = "none";
    document.getElementById("VR").style.display = "none";
    document.getElementById("PS5").style.display = "none";
    document.getElementById("STANDARD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("GOLD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PLATINUM_btn").classList.add('halls_block_buttons_current_btn');
    document.getElementById("DIAMOND_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("VR_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PS5_btn").classList.remove('halls_block_buttons_current_btn');
}

function openDIAMONDhall() {
    document.getElementById("STANDARD").style.display = "none";
    document.getElementById("GOLD").style.display = "none";
    document.getElementById("PLATINUM").style.display = "none";
    document.getElementById("DIAMOND").style.display = "block";
    document.getElementById("VR").style.display = "none";
    document.getElementById("PS5").style.display = "none";
    document.getElementById("STANDARD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("GOLD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PLATINUM_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("DIAMOND_btn").classList.add('halls_block_buttons_current_btn');
    document.getElementById("VR_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PS5_btn").classList.remove('halls_block_buttons_current_btn');
}

function openPS5hall() {
    document.getElementById("STANDARD").style.display = "none";
    document.getElementById("GOLD").style.display = "none";
    document.getElementById("PLATINUM").style.display = "none";
    document.getElementById("DIAMOND").style.display = "none";
    document.getElementById("VR").style.display = "none";
    document.getElementById("PS5").style.display = "block";
    document.getElementById("STANDARD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("GOLD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PLATINUM_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("DIAMOND_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("VR_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PS5_btn").classList.add('halls_block_buttons_current_btn');
}

function openVRhall() {
    document.getElementById("STANDARD").style.display = "none";
    document.getElementById("GOLD").style.display = "none";
    document.getElementById("PLATINUM").style.display = "none";
    document.getElementById("DIAMOND").style.display = "none";
    document.getElementById("VR").style.display = "block";
    document.getElementById("PS5").style.display = "none";
    document.getElementById("STANDARD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("GOLD_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("PLATINUM_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("DIAMOND_btn").classList.remove('halls_block_buttons_current_btn');
    document.getElementById("VR_btn").classList.add('halls_block_buttons_current_btn');
    document.getElementById("PS5_btn").classList.remove('halls_block_buttons_current_btn');
}