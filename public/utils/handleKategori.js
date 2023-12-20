const handleKriteria = (kriteria,nilai) =>{

    for (const index in kriteria) {
        const key = kriteria[index];
        // console.log(key);
        if( nilai <= key.nilaiMaks  && nilai > key.nilaiMin){
            return elementKriteria(key.style,key.text)
        }
    }

}

const elementKriteria = (style,text) =>{
    if(style == "hijau"){
        const element = `
        <span class="badge bg-light-success text-success">
            ${text}
        </span>
        `
        return element
    }
    if(style == "merah"){
        const element = `
        <span class="badge bg-light-danger text-danger">
            ${text}
        </span>
        `
        return element
    }
    if(style == "kuning"){
        const element = `
        <span class="badge bg-light-kuning text-kuning">
            ${text}
        </span>
        `
        return element
    }
    if(style == "biru"){
        const element = `
        <span class="badge bg-light-primary text-primary">
            ${text}
        </span>
        `
        return element
    }
}
