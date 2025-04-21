let today = new Date();
let y = today.getFullYear();
let m = String(today.getMonth() + 1).padStart(2, '0');
let d = String(today.getDate()).padStart(2, '0');
let minDate = y + "-" + m + "-" + d;
document.getElementById("pickup-date").min = minDate;

//hadi hia lkmala dyl lplan dyl ayam When start date changes, update min end date
document.getElementById("pickup-date").onchange = function () {
  let startDate = document.getElementById("pickup-date").value;
  document.getElementById("return-date").min = startDate;
  document.getElementById("return-date").value = ""; // clear old value
};