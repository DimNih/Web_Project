
function confirmDelete(event) {
    event.preventDefault(); 
    const url = event.currentTarget.getAttribute('href'); 

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda tidak akan dapat memulihkan data ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, batalkan!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Dihapus!", "Data Anda telah dihapus.", "success").then(() => {
                window.location.href = url; 
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Dibatalkan", "Data Anda aman :)", "error");
        }
    });
}

function confirmEdit(event) {
    event.preventDefault(); 
    const url = event.currentTarget.getAttribute('href'); 

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan mengedit data ini.",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, edit!",
        cancelButtonText: "Tidak, batalkan!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Sekali Lagi!", " Apakah Anda Yakin?").then(() => {
                window.location.href = url; // Awal
            });
        }
    });
}

function confirmDeleteAll(event) {
    event.preventDefault(); 

    const checkboxes = document.querySelectorAll('input[name="selected_ids[]"]:checked');
    if (checkboxes.length === 0) {
        Swal.fire({
            icon: "warning",
            title: "Tidak ada data yang dipilih",
            text: "Silakan pilih data untuk dihapus."
        });
        return; // Stop 
    }

    // Meth Konfirmasi
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda tidak akan dapat memulihkan data ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, batalkan!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Berhasil!", "Data telah dihapus.", "success").then(() => {
                event.target.submit(); // Masuk
            });
        } else {
            Swal.fire("Dibatalkan", "Data Anda aman :)", "error");
        }
    });
}
function showAlert(message) {
    if (typeof Swal !== 'undefined') {  // ngecek
        Swal.fire({
            icon: 'info',
            title: message,
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6',
        });
    } else {
        console.error("SweetAlert library is not loaded.");
    }
}

