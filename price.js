


function calculate() {
  let start = document.getElementById("pickup-date").value;
  let end = document.getElementById("return-date").value;

  if (!start || !end) {
    document.getElementById("result").innerText = "Please choose dates.";
    return;
  }

  let startDate = new Date(start);
  let endDate = new Date(end);

  let diffTime = endDate - startDate;
  let days = Math.round(diffTime / (1000 * 60 * 60 * 24)) + 1;

  if (days < 1) {
    document.getElementById("result").innerText = "End date must be after start date.";
    return;
  }

  let price = 2500;
  let total = days * price;



  let final = total; 

  document.getElementById("result").innerText =
    "Days: " + days + " - Total: " + Math.round(final) + " MAD";
}