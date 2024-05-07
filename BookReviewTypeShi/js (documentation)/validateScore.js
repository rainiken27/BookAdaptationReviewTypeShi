//checks if user input is an integer between 1-5
function validateScore(event) {

    //stores character code of key that triggers keyboard event
    var keyCode = event.keyCode || event.which;
    var input = document.getElementById("score");

    /* inside the outer parenthesis is a concatenated string composed of 
       the current value of score in the HTML review form and the 
       character that corresponds to the character code in keycode, it then
       attempts to convert this string into int and stores its value in the variable
       In the event that it is not a valid integer like "4A", it returns NaN (not a number)*/
    var score = parseInt(input.value + String.fromCharCode(keyCode));

    //executes if variable is NaN or an integer not within 1-5 inclusively
    if (isNaN(score) || score < 1 || score > 5) {
      event.preventDefault();
      return false;
    }
  }