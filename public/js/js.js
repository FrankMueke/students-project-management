function copyText() {
    var copyText = document.getElementById("classcode");

    copyText.select();
    document.execCommand("copy");


    alert("Code copied: " + copyText.value);
}