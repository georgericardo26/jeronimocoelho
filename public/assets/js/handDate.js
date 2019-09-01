function getDate(date) {
    let month = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
    let get_date = moment(date);
      
    return get_date.date()+ " "+month[get_date.month()]+", "+get_date.year();
}


const qtd_elem = document.getElementsByClassName("date-post").length;
for(let i = 0; i < qtd_elem; i++){
    let elem = document.getElementsByClassName("date-post").item(i);
    //elem.innerText = getDate(elem.innerText);
}
