const handleFormatDate = (tanggal) =>{
    // Membuat objek Date dari string tanggal
    var date = new Date(tanggal);

    // Membuat array nama bulan
    var namaBulan = [
      "Januari", "Februari", "Maret", "April", "Mei", "Juni",
      "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    // Mengambil tanggal, bulan, dan tahun dari objek Date
    var tanggalBaru = date.getDate().toString().padStart(2, '0');
    var bulanBaru = namaBulan[date.getMonth()];
    var tahunBaru = date.getFullYear();

    // Menggabungkan hasil menjadi format yang diinginkan
    var formatBaru = tanggalBaru + ' ' + bulanBaru + ' ' + tahunBaru;

    return formatBaru;
}

