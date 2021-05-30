function update(kdPengguna, alamat) {
    Swal.fire({
        title: 'Yakin Ingin Mengupadate data?',
        text: "Tekan Iya jika yakin!",
        icon: 'question',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Iya'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = alamat+"/"+kdPengguna;
        }
    })
}

function hapus(alamat,kolom, kdData, tabel, alamatKembali) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus data?',
        text: "Tekan Iya jika yakin!",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Iya'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = alamat+"/"+kolom+"/"+kdData+"/"+tabel+"/"+alamatKembali;
        }
    })
}