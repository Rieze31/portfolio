document.addEventListener("DOMContentLoaded", function () {
  const themeToggle = document.getElementById("on");  // Desktop switch
  const mobileThemeToggle = document.getElementById("mobile-on");  // Mobile switch

  // Check for saved theme preference
  if (localStorage.getItem("darkMode") === "enabled") {
    document.body.classList.add("dark-mode");
    themeToggle.checked = true;
    mobileThemeToggle.checked = true;
  }

  // Function to toggle dark mode
  function toggleDarkMode(isEnabled) {
    document.body.classList.toggle("dark-mode", isEnabled);
    localStorage.setItem("darkMode", isEnabled ? "enabled" : "disabled");
  }

  // Event listeners for both switches
  themeToggle.addEventListener("change", function () {
    toggleDarkMode(this.checked);
    mobileThemeToggle.checked = this.checked; // Sync mobile switch
  });

  mobileThemeToggle.addEventListener("change", function () {
    toggleDarkMode(this.checked);
    themeToggle.checked = this.checked; // Sync desktop switch
  });
});


//Contact Form Validation

const contactForm = document.getElementById("contactForm");

const formMessage = document.getElementById("formMessage");

contactForm.addEventListener("submit", (e) => {

e.preventDefault();

const name = document.getElementById("name").value;

const email = document.getElementById("email").value;

const message = document.getElementById("message").value;

if (name && email && message) {
formMessage.textContent = "Thank you for your message!"; 
formMessage.style.color = "green";
contactForm.reset(); 
} else {
forsMessage.textContent = "Please fill out all fields.";
formMessage.style.color="red";
}

});
function toggleMenu() {
  let hamburger = document.getElementById('hamburger');
  hamburger.classList.toggle('active');
  
}
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobile-menu");

  hamburger.addEventListener("click", function () {
    mobileMenu.classList.toggle("active");
  });
});

