document.addEventListener('DOMContentLoaded', function() {
  var address = document.getElementById('map').getAttribute('data-alamat');

  var url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
        var lat = data[0].lat;
        var lon = data[0].lon;
        var map = L.map('map').setView([lat, lon], 13); 

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([lat, lon]).addTo(map)
          .bindPopup("Lokasi: " + address)
          .openPopup();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Alamat tidak ditemukan',
          text: 'Tidak ada hasil untuk alamat yang dimasukkan.',
          showConfirmButton: true
        });
      }
    })
    .catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'Terjadi kesalahan',
        text: 'Terjadi kesalahan: ' + error,
        showConfirmButton: true
      });
    });
});
