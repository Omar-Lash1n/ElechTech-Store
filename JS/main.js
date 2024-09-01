function updateTime() {
    const timee = new Date();
    const formattedDate = timee.toLocaleDateString();
    const formattedTime = timee.toLocaleTimeString();
    document.getElementById('date').innerHTML = formattedDate;
    document.getElementById('time').innerHTML = formattedTime;
}

// Initial call to display the date and time immediately
updateTime();

// Update the date and time every second
setInterval(updateTime, 1000);



