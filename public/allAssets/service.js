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
  const button =
  button.addEventListener("mousedown", () => button.classList.add("clicked"));


  //inner tabs button js is here
  function toggleCheckbox(event) {
    // Uncheck all checkboxes and remove 'active' class
    const checkboxes = document.querySelectorAll('.checkbox-input');
    checkboxes.forEach((checkbox) => {
      checkbox.checked = false;
      checkbox.closest('.custom-form-check').classList.remove('active');
    });

    // Toggle the clicked checkbox and add 'active' class
    const checkbox = event.currentTarget.querySelector('.checkbox-input');
    checkbox.checked = !checkbox.checked;
    if (checkbox.checked) {
      event.currentTarget.classList.add('active');
    } else {
      event.currentTarget.classList.remove('active');
    }
  }

