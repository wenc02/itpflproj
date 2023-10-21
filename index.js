const pay = document.querySelector('.pay');
const rec = document.querySelector('.rec');
const state = document.querySelector('.state');
const ledg = document.querySelector('.ledg');
const tablew = document.querySelector('.table-wrapper');
const payable = document.querySelector('.payable');
const table2 = document.querySelector('.table2');
const table3 = document.querySelector('.table3');
const table4 = document.querySelector('.table4');
const button = document.querySelector('.nav-links button');

$(document).ready(function() {
    $('#table').dataTable();
});

function initializeDataTables(tableId) {
    $(tableId).dataTable();
}

table2.remove();
table3.remove();
table4.remove();

rec.addEventListener('click', () => {
    tablew.append(table2);
    payable.remove();
    table3.remove();
    table4.remove();
    initializeDataTables('#table2');
});

pay.addEventListener('click', () => {
    tablew.append(payable);
    table2.remove();
    table3.remove();
    table4.remove();
    initializeDataTables('#table');
});

state.addEventListener('click', () => {
    tablew.append(table3);
    payable.remove();
    table2.remove();
    table4.remove();
    initializeDataTables('#table3');
});

ledg.addEventListener('click', () => {
    tablew.append(table4);
    payable.remove();
    table2.remove();
    table3.remove();
    initializeDataTables('#table4');
});

button.addEventListener('click', () => {
    window.location.href = "login.php";
});

