var dateControl = document.querySelector('input[type="date"]');

var date = new Date().toJSON().slice(0, 10);
dateControl.value = date;
