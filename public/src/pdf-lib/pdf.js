function is_null(a){
    if (a === null) { return true; }
    return false;
}

function addZero(i) {
    if (is_null(i)) {i = "00"}
    else if (i < 10 ) {i = "0" + i}
    return i;
}

function time_format(a,b){
    if(is_null(a) & is_null(b)){
        a=0
        b=0
        return [a, b];
    } else {
        a = addZero(a);
        b = addZero(b);
        return [a, b];
    }
}

async function fillForm(dataset, url, name, elogbook_id, tahun, bulan) {

    const custom_form_data = {
        "logbook_id":elogbook_id,
        "name":name,
        "month":bulan,
        "year":tahun
    }

    const text_field = {
        "morning_ctr":"morning_ctr",
        "morning_ass":"morning_ass",
        "morning_rest":"morning_rest",
        "afternoon_ctr":"afternoon_ctr",
        "afternoon_ass":"afternoon_ass",
        "afternoon_rest":"afternoon_rest",
        "night_ctr":"night_ctr",
        "night_ass":"night_ass",
        "night_rest":"night_rest",
    };

    const checkbox = {
        'adc':"adc",
        'app':"app",
        'app surv':"app_surv",
        'comb adc app':"comb_adc_app",
        'acc': "acc",
        'acc surv':"acc_surv",
    };

    const formUrl = url;
    const formPdfBytes = await fetch(formUrl).then((res) => res.arrayBuffer());
    const pdfDoc = await PDFLib.PDFDocument.load(formPdfBytes);
    const form = pdfDoc.getForm();
    for (custom_name in custom_form_data) {
        custom_field = form.getTextField(custom_name);
        custom_field.setText(custom_form_data[custom_name])
    }
    for (i in dataset) {
        for (fields in text_field) {
            var col = text_field[fields]
            field = form.getTextField(col + dataset[i].day);
            var hour = dataset[i][col+"_hour"]
            var minute =  dataset[i][col+"_minute"]
            timedata = time_format(hour,minute)
            if (timedata[0] == 0 & timedata[1] == 0) { 
            } else { 
                let time = timedata[0] + ":" + timedata[1];
                field.setText(time);
            }
            
        }
        field = form.getCheckBox(checkbox[dataset[i].unit]+dataset[i].day);
        field.check();
    }

    form.flatten();

    const pdfBytes = await pdfDoc.save();
    return pdfBytes;
}

async function savetoPDF(dataset, url, name, elogbook_id, tahun, bulan) {
    const bytePDF = await fillForm(dataset, url, name, elogbook_id, tahun, bulan);
    var blob = new Blob([bytePDF], { type: "application/pdf" });
    var link = document.createElement("a");
    link.href = window.URL.createObjectURL(blob);
    link.download = "pdf-test";
    link.click();
}
