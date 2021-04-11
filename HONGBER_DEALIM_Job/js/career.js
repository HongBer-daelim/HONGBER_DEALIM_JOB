function pickFunction() {
    document.getElementById("picked_id").style.display = "block";
    document.getElementById("ing_id").style.display = "none";
    document.getElementById("finish_id").style.display = "none";
}

function ingFunction() {
    document.getElementById("picked_id").style.display = "none";
    document.getElementById("ing_id").style.display = "block";
    document.getElementById("finish_id").style.display = "none";
}

function finFunction() {
    document.getElementById("picked_id").style.display = "none";
    document.getElementById("ing_id").style.display = "none";
    document.getElementById("finish_id").style.display = "block";
}