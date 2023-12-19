const handleKriteria = (nilaiTertinggi,nilaiUser) =>{
    // kriteria bagus
    if(nilaiUser > (nilaiTertinggi * 0.75)){
        const element = `
        <span class="badge bg-light-success text-success">
            Bagus
        </span>
        `
        return element

    }
    // kriteria sedang
    if(nilaiUser < (nilaiTertinggi * 0.75) && nilaiUser > (nilaiTertinggi * 0.45)){
        const element = `
        <span class="badge bg-light-warning text-warning">
            Sedang
        </span>
        `
        return element
    }

    // kriteria Buruk
    if(nilaiUser < (nilaiTertinggi * 0.45)){
        const element = `
        <span class="badge bg-light-danger text-danger">
            Buruk
        </span>
        `
        return element
    }



}
