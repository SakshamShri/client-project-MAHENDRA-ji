// Filtering logic
    document.querySelectorAll('.mvx-tab-btn').forEach(btn => {
      btn.onclick = function() {
        document.querySelectorAll('.mvx-tab-btn').forEach(e => e.classList.remove('mvx-active'));
        btn.classList.add('mvx-active');
        let tab = btn.getAttribute("data-tab");
        document.querySelectorAll('.mvx-card').forEach(card => {
          // Remove any previous visibility
          card.classList.remove('mvx-visible');
          // If the card has the data-tab for this or "All", show it
          let tabs = card.getAttribute('data-tab').split(' ');
          if (tabs.includes(tab) || tab === "All" && tabs.includes("All")) {
            card.classList.add('mvx-visible');
          }
        });
      }
    });
    // Default: show Today
    window.onload = () => {
      document.querySelector('.mvx-tab-btn.mvx-active').click();
    };