document.getElementById("spinner").style.display ="none";
const url = "./api/log.php";

function callApi(url) {
  fetch(url)
    .then(function (response) {
      return response.json();
    })
    .then(function (jsonData) {
      console.log(jsonData);
      let text = document.getElementById('jmopt').innerHTML;
      document.getElementById('jmopt').innerHTML = `${JSON.stringify(jsonData.output).split('"').join('')}`;
    });
}

function loading(e) {
	const spinner = document.getElementById("spinner");
    const run = document.getElementById("run");
    spinner.style.display ="block";
    run.style.display ="none";
    setInterval("callApi(url)", 100);
 };