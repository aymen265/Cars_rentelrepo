document.getElementById('mobile').oninput = function () {
    let val = this.value.replace(/\D/g, '');
    if (val.length > 0 && !/^[67]/.test(val)) {
      val = '';
    }
    this.value = val.slice(0, 9);
  };
  
  document.getElementById('submitBtn').onclick = function () {
    const number = document.getElementById('mobile').value;
    const full = '+212' + number;
  
    if (/^+212[67]\d{8}$/.test(full)) {
      alert("Valid number: " + full);
    } else {
      alert("Invalid number. Must start with 6 or 7 and have 9 digits total.");
    }
  };
  