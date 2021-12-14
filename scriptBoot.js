let inputSubmit = document.getElementById('inputSubmit');
let inputChoice = document.getElementById('inputChoice');
let inputDate = document.getElementById('inputDate');
let inputQty = document.getElementById('inputQty');

let tbodyBibi = document.getElementById('tbodyBibi')
let tbodyPipi = document.getElementById('tbodyPipi');
let tbodyPopo = document.getElementById('tbodyPopo');

let date;
let qty;

let bibi = {};
let bibiResult = [];
let idBibi = 0;

let pipiResult = [];
let idPipi = 0;

let popoResult = [];
let idPopo = 0;


function createRowBibi(classColor) {
    let tr = document.createElement('tr');
    tr.setAttribute('class', classColor);
    tbodyBibi.appendChild(tr);

    let th = document.createElement('th');
    th.setAttribute('scope', 'row');
    th.innerHTML = idBibi + 1;
    tr.appendChild(th);

    let td = document.createElement('td');
    td.innerHTML = bibiResult[idBibi].date;
    tr.appendChild(td);

    let td1 = document.createElement('td');
    td1.innerHTML = bibiResult[idBibi].qty;
    tr.appendChild(td1);
}

function createRowPipiPopo(classColor, tbody, id) {
    let tr = document.createElement('tr');
    tr.setAttribute('class', classColor);
    tbody.appendChild(tr);

    let th = document.createElement('th');
    th.setAttribute('scope', 'row');
    th.innerHTML = id + 1;
    tr.appendChild(th);

    let td = document.createElement('td');
    td.innerHTML = pipiResult[id];
    tr.appendChild(td);
}

function addBibi(idBibi, date, qty) {
    bibi = { idBibi, date, qty };
    bibiResult[idBibi] = bibi;
}

function addPipi(date) {
    pipiResult.push(date);
}

function addPopo(date) {
    pipiResult.push(date);
}


inputSubmit.addEventListener('click', () => {
    date = inputDate.value;
    qty = inputQty.value; 
    if (inputChoice.value == 'bibi') {
        addBibi(idBibi, date, qty);
        if (idBibi % 2 == 0) {
            let colorRowBibi1='table-info';
            createRowBibi(colorRowBibi1);
        } else {
            let colorRowBibi2='table-success';
            createRowBibi(colorRowBibi2);
        }
        idBibi++;
    } else if (inputChoice.value == 'pipi') {
        addPipi(date);
        if (idPipi % 2 == 0) {
            let colorRowPipi1='table-danger';
            createRowPipiPopo(colorRowPipi1, tbodyPipi, idPipi);
        } else {
            let colorRowPipi2='table-success';
            createRowPipiPopo(colorRowPipi2, tbodyPipi, idPipi);
        }
        idPipi++;
    } else if (inputChoice.value == 'popo') {
        addPopo(date);
        if (idPopo % 2 == 0) {
            let colorRowPopo1='table-info';
            createRowPipiPopo(colorRowPopo1, tbodyPopo, idPopo);
        } else {
            let colorRowPopo2='table-warning';
            createRowPipiPopo(colorRowPopo2, tbodyPopo, idPopo);
        }
        idPopo++;
    } else {
        console.log('ERROR');
    }
})