function validateScore(event) {
    var keyCode = event.keyCode || event.which;
    var input = document.getElementById("score");
    var score = parseInt(input.value + String.fromCharCode(keyCode));

    if (isNaN(score) || score < 1 || score > 5) {
      event.preventDefault();
      return false;
    }
  }