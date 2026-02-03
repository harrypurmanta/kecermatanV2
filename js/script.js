 // MODAL
 document.getElementById("open-modal-btn").addEventListener("click", function() {
    document.getElementById("modal-wrapper").classList.remove("hidden");
    });

    document.getElementById("close-modal-btn").addEventListener("click", function() {
    document.getElementById("modal-wrapper").classList.add("hidden");
    });

  // button humberger
    const btn = document.querySelector(".mobile-menu-button");
    const sidebar = document.querySelector(".sidebar");

    btn.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
    })

    // dropdown
    function dropDown() {
        document.querySelector('#submenu').classList.toggle('hidden')
        document.querySelector('#arrow').classList.toggle('rotate-0')
    }
    dropDown()