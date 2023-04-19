function sendReq2JMstop() {
    const url = "./api/jmstop.php";

    fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        console.log(data);
      })
      .catch(function(error) {
        console.log('Error:', error);
      });
}