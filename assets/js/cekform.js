function cekdaftar() {
    if (!$('#email1').val()) {
        alert('Email tidak boleh kosong  ');
        $("#email1").focus();
        return false;
    }
    if (!$('#phone').val()) {
        alert('No hp tidak boleh kosong  ');
        $("#phone").focus();
        return false;
    }
    var nomor_hp = document.forms["daftar"]["phone"].value;
    var number = /^[0-9]+$/;
    if (!nomor_hp.match(number)) {
        alert("No Hp harus angka !");
        $("#phone").focus();
        return false;
    }

    if (nomor_hp.length < 11) {
        alert("No Hp Minimal 11 Digit");
        $("#phone").focus();
        return false;
    }
    if (!$('#password1').val()) {
        alert('Password tidak boleh kosong  ');
        $("#password1").focus();
        return false;
    }
    if ($('#password1').val().length < 6) {
        alert('Password minimal 6 karakter');
        $("#password1").focus();
        return false;
    }
}

function cekedituser() {
    if (!$('#emailu').val()) {
        alert('Email tidak boleh kosong  ');
        $("#emailu").focus();
        return false;
    }
    if (!$('#phoneu').val()) {
        alert('No Hp tidak boleh kosong  ');
        $("#phoneu").focus();
        return false;
    }
}

function ceklogin() {
    if (!$('#email').val()) {
        alert('Email tidak boleh kosong  ');
        $("#email").focus();
        return false;
    }
    if ($('#email').val().length < 5) {
        alert('Email Minimal 6 karakter  ');
        $("#email").focus();
        return false;
    }
    if (!$('#password').val()) {
        alert('Password tidak boleh kosong  ');
        $("#password").focus();
        return false;
    }
    if ($('#password').val().length < 6) {
        alert('Password minimal 6 karakter');
        $("#password").focus();
        return false;
    }
}