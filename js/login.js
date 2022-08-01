function get_ip() {

    fetch('https://api.ipify.org/').then(r => r.text())
    $.post("get_ip.php", {
        ip: r
    });
}