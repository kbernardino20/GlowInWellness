// JavaScript code to display login date and time
document.addEventListener("DOMContentLoaded", function() {
    var loginTimeElement = document.getElementById("loginTime");

    // Get the current date and time
    var currentDate = new Date();

    // Format the date and time
    var options = {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true  // Include AM/PM indicator
    };
    var formattedDate = new Intl.DateTimeFormat('en-GB', options).format(currentDate);

    // Convert the entire formatted date and time to uppercase
    formattedDate = formattedDate.toUpperCase();

    // Display the login date and time in the specified format
    var loginTimeText = "Login Time: " + formattedDate;
    
    // Update the content of the element with the login time
    loginTimeElement.textContent = loginTimeText;
});