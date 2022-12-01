document.getElementById("spinner").style.display ="none";
const url = "api.php";

function callApi(url) {
  fetch(url)
    .then(function (response) {
      return response.json();
    })
    .then(function (json_data) {
      console.log(json_data);
    });
}

function loading(e) {
	const spinner = document.getElementById("spinner");
    const run = document.getElementById("run");
    spinner.style.display ="block";
    run.style.display ="none";
    //setInterval("callApi(url)", 1000);
 };