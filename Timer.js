var timeLeft = 30; // Set timer to 30 seconds
var elem = document.getElementById('timer'); // Store value of timer in variable
var timerId = setInterval(countdown, 1000);  // Invoke method and store in variable

function countdown() { // Function to display number of seconds remaining
  if (timeLeft === 0) {
    clearTimeout(timerId);
  } else {
    elem.innerHTML = timeLeft + ' seconds remaining';
    timeLeft--;
  }
}