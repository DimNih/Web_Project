function updateProdukOptions() {
    var jenis = document.getElementById('jenis').value;
    var namaProduk = document.getElementById('nama_produk');
    namaProduk.innerHTML = '';
    if (jenis === 'Hp') {
        var options = [
            'Samsung (HP)',
            'Apple (HP)',
            'Xiaomi (HP)',
            'Oppo (HP)',
            'Vivo (HP)'
        ];
    } else if (jenis === 'Laptop') {
        var options = [
            'Acer (Laptop)',
            'Dell (Laptop)',
            'Asus (Laptop)',
            'HP (Laptop)',
            'Lenovo (Laptop)'
        ];


        
    } else if (jenis === 'Tablet') {
        var options = [
            'iPad (Tablet)',
            'Samsung Galaxy Tab (Tablet)',
            'Microsoft Surface (Tablet)',
            'Lenovo Tab (Tablet)',
            'Huawei MediaPad (Tablet)'
        ];
    } else if (jenis === 'Smartwatch') {
        var options = [
            'Apple Watch (Smartwatch)',
            'Samsung Galaxy Watch (Smartwatch)',
            'Fitbit (Smartwatch)',
            'Garmin (Smartwatch)',
            'Huawei Watch (Smartwatch)'
        ];
    } else if (jenis === 'Headphone') {
        var options = [
            'Sony (Headphone)',
            'Bose (Headphone)',
            'JBL (Headphone)',
            'Beats (Headphone)',
            'Sennheiser (Headphone)'
        ];
    } else {
        var options = [];
    }
 options.forEach(function(option) {
        var newOption = document.createElement('option');
        newOption.value = option.split(' (')[0]; 
        newOption.textContent = option; 
        namaProduk.appendChild(newOption);
    });
}

function updateFileName() {
    var inputFile = document.getElementById('file-upload');
    var fileNameDisplay = document.getElementById('Nama JPG');
    var TextSukses = document.getElementById('Sukses')
    
    if (inputFile.files.length) { 
        fileNameDisplay.textContent = inputFile.files[0].name;
        TextSukses.textContent = 'Berhasil Memasukan';
    }
}



