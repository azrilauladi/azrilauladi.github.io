let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
}

const sr = ScrollReveal({
    distance: '60px',
    duration: 2500,
    delay: 400,
    reset: true
});

sr.reveal('.text', {delay: 200, origin: 'top'});
sr.reveal('.form-container form', {delay: 800, origin: 'left'});
sr.reveal('.heading', {delay: 800, origin: 'top'});
sr.reveal('.ride-container .box', {delay: 600, origin: 'top'});
sr.reveal('.services-container .box', {delay: 600, origin: 'top'});
sr.reveal('.reviews-container', {delay: 600, origin: 'top'});
sr.reveal('.newsletter .box', {delay: 400, origin: 'bottom'});

document.getElementById('about-link').addEventListener('click', function(event) {
    // Mencegah link langsung membuka halaman
    event.preventDefault();
    
    // Menampilkan konfirmasi pop-up
    let userConfirmation = confirm('Apakah Anda yakin ingin mengunjungi halaman portfolio?');
    
    // Jika pengguna memilih 'OK', arahkan ke halaman
    if (userConfirmation) {
        window.location.href = this.href;
    }
    // Jika memilih 'Cancel', tidak ada yang terjadi
});




document.getElementById('rentalForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah reload halaman

    // Ambil data dari form
    var location = document.getElementById('location').value;
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;

    // Cek apakah data ada
    console.log("Location: " + location);
    console.log("Start Date: " + startDate);
    console.log("End Date: " + endDate);

    // Kirim data sebagai x-www-form-urlencoded
    var params = 'location=' + encodeURIComponent(location) + 
                 '&start_date=' + encodeURIComponent(startDate) + 
                 '&end_date=' + encodeURIComponent(endDate);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response);

            document.getElementById('modalLocation').innerText = response.location || 'No location';
            document.getElementById('modalStartDate').innerText = response.start_date || 'No start date';
            document.getElementById('modalEndDate').innerText = response.end_date || 'No end date';

            // Tampilkan modal
            document.getElementById('popupModal').style.display = 'flex';
        }
    };
    xhr.send(params); // Kirim data ke PHP
});






// $(document).ready(function() {
//     $('form').on('submit', function(e) {
//         e.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url: 'process.php',
//             data: $(this).serialize(),
//             dataType: 'json',
//             success: function(response) {
//                 if (response.success) {
//                     showPopup(response.message);
//                 }
//             }
//         });
//     });

//     function showPopup(message) {
//         $('body').append('<div id="popup" class="popup"><div class="popup-content"><span class="close">&times;</span>' + message + '</div></div>');
//         $('.close').on('click', function() {
//             $('#popup').remove();
//         });
//     }
// });
