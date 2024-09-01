// Define an array containing CSS class names for dark modes
const darkModeClasses = ['dark-mode', 'dark-mode1', 'dark-mode2', 'dark-mode3','dark-mode4'];

// Add an event listener to listen for changes in the checkbox state
document.getElementById('mode-toggle').addEventListener('change', function() {
  // Toggle the dark mode classes based on the checkbox state
  darkModeClasses.forEach(className => {
    document.body.classList.toggle(className, this.checked);
    // Store the checkbox state in local storage
    localStorage.setItem(className, this.checked);
  });
});

// Retrieve the checkbox state from local storage when the page loads
window.addEventListener('load', function() {
  darkModeClasses.forEach(className => {
    const darkModeEnabled = localStorage.getItem(className) === 'true';
    // Set the checkbox state based on the value retrieved from local storage
    document.getElementById('mode-toggle').checked = darkModeEnabled;
    // Apply dark mode if it was enabled
    if (darkModeEnabled) {
      document.body.classList.add(className);
    }
  });
});



window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  var scrollToTopBtn = document.getElementById("scrollToTopBtn");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopBtn.classList.add("show");
  } else {
    scrollToTopBtn.classList.remove("show");
  }
}

document.getElementById("scrollToTopBtn").onclick = function() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
};
