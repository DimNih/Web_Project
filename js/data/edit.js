window.onload = function() {
    updateProdukOptions();
};

function updateProdukOptions() {
    var jenis = document.getElementById('jenis').value;
    var namaProduk = document.getElementById('nama_produk');
    namaProduk.innerHTML = '';
    var selectedNamaProduk = "<?php echo $baris['nama_produk']; ?>"; 
    
    var options = [];

    if (jenis === 'HP') {
        options = [
            'Samsung (HP)',
            'Apple (HP)',
            'Xiaomi (HP)',
            'Oppo (HP)',
            'Vivo (HP)'
        ];
    } else if (jenis === 'Laptop') {
        options = [
            'Acer (Laptop)',
            'Dell (Laptop)',
            'Asus (Laptop)',
            'HP (Laptop)',
            'Lenovo (Laptop)'
        ];
    } else if (jenis === 'Tablet') {
        options = [
            'iPad (Tablet)',
            'Samsung Galaxy Tab (Tablet)',
            'Microsoft Surface (Tablet)',
            'Lenovo Tab (Tablet)',
            'Huawei MediaPad (Tablet)'
        ];
    } else if (jenis === 'Smartwatch') {
        options = [
            'Apple Watch (Smartwatch)',
            'Samsung Galaxy Watch (Smartwatch)',
            'Fitbit (Smartwatch)',
            'Garmin (Smartwatch)',
            'Huawei Watch (Smartwatch)'
        ];
    } else if (jenis === 'Headphone') {
        options = [
            'Sony (Headphone)',
            'Bose (Headphone)',
            'JBL (Headphone)',
            'Beats (Headphone)',
            'Sennheiser (Headphone)'
        ];
    }

    options.forEach(function(option) {
        var newOption = document.createElement('option');
        var optionValue = option.split(' (')[0];
        newOption.value = optionValue; 
        newOption.textContent = option;

        if (optionValue === selectedNamaProduk) {
            newOption.selected = true;
        }
        namaProduk.appendChild(newOption);
    });
}
