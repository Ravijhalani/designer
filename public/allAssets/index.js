function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main-left-panel").style.marginLeft = "250px";
  if (window.innerWidth <= 600) {
    document.getElementById("main-left-panel").style.marginLeft = "0";
  }
  document.getElementById("toggleButton").classList.remove("closed");
  document.getElementById("searchBox").style.marginLeft = "0"; // Reset margin when sidebar is open
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main-left-panel").style.marginLeft = "0";
  document.getElementById("toggleButton").classList.add("closed");
  document.getElementById("searchBox").style.marginLeft = "60px"; // Set margin when sidebar is closed
}

function toggleNav() {
  if (document.getElementById("mySidebar").style.width === "250px") {
    closeNav();
  } else {
    openNav();
  }
}

// Adjust sidebar based on window size
function adjustSidebar() {
  if (window.innerWidth > 600) {
    openNav();
  } else {
    closeNav();
  }
}

// Close or open sidebar on window resize
window.addEventListener('resize', adjustSidebar);

// Close or open sidebar initially based on screen size
adjustSidebar();


//  search bar css from here
const button = button.addEventListener("mousedown", () => button.classList.add("clicked"));


//inner tabs button js is here
function activateTab(element) {
  var tabs = document.querySelectorAll('.tab-parent-inner ');
  tabs.forEach(function (tab) {
    tab.classList.remove('active');
  });
  element.classList.add('active');
}


//form js is from here
document.querySelector('.js-switch').addEventListener('click', () => {
  document.querySelector('.main-content').classList.toggle('as-card');
});

document.querySelector('#image-input').addEventListener('change', function () {
  const reader = new FileReader();
  reader.onload = (e) => {
    document.querySelector('#imager').src = e.target.result;
    document.querySelector('#imager').style.visibility = 'visible';
  };
  if (this.files && this.files[0]) {
    reader.readAsDataURL(this.files[0]);
  }
});
