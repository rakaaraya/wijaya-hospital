<?php


$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = htmlspecialchars($_POST["fullname"]);
    $email    = htmlspecialchars($_POST["email"]);
    $message  = htmlspecialchars($_POST["message"]);

    if ($fullname && $email && $message) {
        $success = "Laporan berhasil dikirim! Terima kasih, <b>$fullname</b> 🙌";
    } else {
        $error = "Harap isi semua field dengan benar!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Lapor Wijaya</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<style>
    body{
        margin:0;
        padding:0;
        font-family:"Poppins", sans-serif;
        background: linear-gradient(135deg, #0051ff, #00c8ff);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card{
        width: 420px;
        padding: 30px;
        background: rgba(255,255,255,0.15);
        border-radius: 18px;
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(8px);
        color:white;
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity:0; transform: translateY(20px); }
        to   { opacity:1; transform: translateY(0); }
    }

    h2{
        text-align:center;
        letter-spacing:2px;
        font-weight:700;
        margin-bottom:20px;
    }

    label{
        display:block;
        margin-top:12px;
        font-size:14px;
        font-weight:500;
    }

    .form-control{
        width:100%;
        padding:12px;
        border-radius:10px;
        border:none;
        margin-top:5px;
        outline:none;
        background:rgba(255,255,255,0.82);
        font-size:14px;
    }

    textarea{
        resize:none;
    }

    .submit-btn{
        margin-top:20px;
        background:#000000;
        color:white;
        border:none;
        padding:12px;
        border-radius:10px;
        cursor:pointer;
        font-weight:700;
        transition:0.3s;
    }

    .submit-btn:hover{
        background:#333333;
        transform:scale(1.03);
    }

    .alert{
        padding:12px;
        border-radius:10px;
        margin-bottom:15px;
        animation:fadeIn 0.5s ease;
    }

    .success{ background:#28a745; }
    .error{ background:#dc3545; }

    .warning{
        border:2px solid red !important;
    }
</style>

</head>

<body>

<div class="card">

    <h2>LAPOR WIJAYA</h2>

    <?php if ($success): ?>
        <div class="alert success"><?= $success ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert error"><?= $error ?></div>
    <?php endif; ?>


    <form id="wijayaForm" action="" method="post">
        <label>NAMA</label>
        <input name="fullname" type="text" class="form-control" id="fullname">

        <label>EMAIL</label>
        <input name="email" type="email" class="form-control" id="email">

        <label>LAPOR WIJAYA</label>
        <textarea name="message" rows="4" class="form-control" id="message"></textarea>

        <input type="submit" value="KIRIM LAPORAN" class="submit-btn">
    </form>
</div>


<script>
document.getElementById("wijayaForm").addEventListener("submit", function(e){
    let nama = document.getElementById("fullname");
    let email = document.getElementById("email");
    let pesan = document.getElementById("message");

    let inputs = [nama, email, pesan];
    let valid = true;

    inputs.forEach(input => input.classList.remove("warning"));

    inputs.forEach(input => {
        if (input.value.trim() === "") {
            input.classList.add("warning");
            valid = false;
        }
    });

    if (!valid) {
        alert("Harap isi semua data sebelum mengirim!");
        e.preventDefault();
    }

    let emailValue = email.value;
    if (emailValue && !emailValue.includes("@")) {
        alert("Format email tidak valid!");
        email.classList.add("warning");
        e.preventDefault();
    }
});
</script>

</body>
</html>