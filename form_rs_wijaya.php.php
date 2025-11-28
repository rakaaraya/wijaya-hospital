<?php

<div class="footer">Tips: untuk produksi, ganti penyimpanan file dengan database dan aktifkan pengiriman email jika diperlukan.</div>
</div>

<div class="card">
<form id="laporForm" method="post" action="" novalidate>
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">


<label for="fullname">NAMA</label>
<input id="fullname" name="fullname" class="input" type="text" value="<?php echo htmlspecialchars($old['fullname']); ?>" placeholder="Nama lengkap Anda">


<label for="email">EMAIL</label>
<input id="email" name="email" class="input" type="email" value="<?php echo htmlspecialchars($old['email']); ?>" placeholder="email@domain.com">


<label for="message">LAPOR WIJAYA</label>
<textarea id="message" name="message" class="input" rows="4" placeholder="Tulis laporan atau pesan Anda..."><?php echo htmlspecialchars($old['message']); ?></textarea>


<div class="row center">
<button type="submit" class="submit">KIRIM LAPORAN</button>
<div class="note">Kami menghargai umpan balik Anda.</div>
</div>
</form>


<div style="margin-top:12px; font-size:12px; opacity:0.8">Data tersimpan di <code>submissions.csv</code>. File ini dibuat otomatis saat pertama submit (pastikan permission folder).</div>
</div>
</div>


<script>
// Client-side validation + UX
(function(){
const form = document.getElementById('laporForm');
form.addEventListener('submit', function(e){
const name = document.getElementById('fullname');
const email = document.getElementById('email');
const msg = document.getElementById('message');
let clientErrors = [];
if (name.value.trim() === '') clientErrors.push('Nama wajib diisi.');
if (email.value.trim() === '') clientErrors.push('Email wajib diisi.');
else {
// simple email regex
const re = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
if (!re.test(email.value)) clientErrors.push('Format email tidak valid.');
}
if (msg.value.trim() === '') clientErrors.push('Isi laporan wajib diisi.');


if (clientErrors.length) {
e.preventDefault();
// show simple alert-styled box
const tmp = document.createElement('div');
tmp.className = 'error';
tmp.innerHTML = '<strong>Periksa kembali:</strong><ul style="margin:8px 0 0 18px;padding:0">' + clientErrors.map(function(x){return '<li>'+x+'</li>';}).join('') + '</ul>';


// remove existing if present
const exist = document.querySelector('.card .error');
if (exist) exist.remove();


form.parentNode.insertBefore(tmp, form);
// scroll to top of card
tmp.scrollIntoView({behavior:'smooth', block:'center'});
}
});
})();
</script>
</body>
</html>