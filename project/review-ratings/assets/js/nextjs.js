 // Animation On Load
         window.onload = () => {
         document.querySelectorAll('.fade-in').forEach((el, i) => {
         setTimeout(() => {
         el.classList.add('show');
         }, i * 200);
         });
         };
         
         document.addEventListener("DOMContentLoaded", function () {
         
         const ctx = document.getElementById("ovwChart");
         
         if (!ctx) {
         console.error("Canvas not found!");
         return;
         }
         
         new Chart(ctx, {
         type: "line",
         data: {
            labels: ["Mon", "Wed", "Fri", "Sun"],
            datasets: [{
                label: "PSI",
                data: [6.5, 7.8, 7.2, 8.7],
                borderWidth: 3,
                borderColor: "#0085ff",
                tension: 0.4,
                fill: false,
                pointRadius: 0,
            }]
         },
         options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false }},
            scales: {
                y: { display: false },
                x: {
                    ticks: { font: { size: 12 }},
                    grid: { display: false }
                }
            }
         }
         });
         
         });
         
         
         document.addEventListener("DOMContentLoaded", () => {
         
         const tabButtons = document.querySelectorAll(".vs-filter-btn");
         const tabPanes = document.querySelectorAll(".vs-tab-pane");
         
         tabButtons.forEach(btn => {
         btn.addEventListener("click", () => {
         
            // remove active
            tabButtons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
         
            const target = btn.getAttribute("data-target");
         
            // hide all
            tabPanes.forEach(p => p.style.display = "none");
         
            // show selected
            document.getElementById(target).style.display = "block";
         });
         });
         
         });
         
         
         const openPoll = document.getElementById("openPollPopup");
         const pollOverlay = document.getElementById("pollPopupOverlay");
         const pollBox = document.getElementById("pollPopupBox");
         const closePoll = document.getElementById("closePollPopup");
         
         openPoll.addEventListener("click", () => {
         pollBox.style.display = "block";
         pollPopupOverlay.style.display = "block";
         pollBox.classList.add("active");
         });
         
         closePoll.addEventListener("click", () => {
         pollOverlay.style.display = "none";
         pollBox.classList.remove("active");
         });
         
         pollOverlay.addEventListener("click", () => {
         pollOverlay.style.display = "none";
         pollBox.classList.remove("active");
         });
         
         const frames = document.querySelectorAll(".open-video");
         const popupOverlay = document.getElementById("videoPopupOverlay");
         const popupBox = document.getElementById("videoPopupBox");
         const popupVideo = document.getElementById("popupVideoFrame");
         const closePopup = document.getElementById("closeVideoPopup");
         
         frames.forEach(frame => {
         frame.addEventListener("click", () => {
         popupOverlay.style.display = "block";
         popupBox.style.display = "block";
         
         setTimeout(() => {
            popupBox.classList.add("active");
         }, 50);
         
         popupVideo.src = frame.src + "?autoplay=1";
         });
         });
         
         closePopup.addEventListener("click", () => {
         popupOverlay.style.display = "none";
         popupBox.classList.remove("active");
         setTimeout(() => {
         popupBox.style.display = "none";
         }, 200);
         
         popupVideo.src = "";
         });
         
         popupOverlay.addEventListener("click", () => {
         popupOverlay.style.display = "none";
         popupBox.classList.remove("active");
         setTimeout(() => {
         popupBox.style.display = "none";
         }, 200);
         
         popupVideo.src = "";
         });
         
         
         const ctx = document.getElementById("cryptoChart");
         
         let chart = new Chart(ctx, {
         type: "line",
         data: {
         labels: ["1", "2", "3", "4", "5", "6"],
         datasets: [
         {
         data: [10, 14, 12, 18, 15, 20],
         borderWidth: 2,
         tension: 0.4,
         fill: true,
         },
         ],
         },
         options: {
         responsive: true,
         plugins: { legend: { display: false } },
         scales: { x: { display: false }, y: { display: false } },
         },
         });
         
         // Data sets for each coin
         const coinData = {
         bitcoin: [10, 14, 12, 18, 15, 20],
         ethereum: [5, 8, 6, 10, 9, 14],
         solana: [3, 4, 3, 5, 6, 8],
         tether: [1, 1, 1, 1, 1, 1],
         };
         
         // Change Coin on Radio Select
         document.querySelectorAll("input[name='crypto']").forEach((radio) => {
         radio.addEventListener("change", () => {
         let selected = radio.id;
         
         chart.data.datasets[0].data = coinData[selected];
         chart.update();
         
         // Move slider
         const slider = document.querySelector(".slider");
         const index = Array.from(document.querySelectorAll("input[name='crypto']")).indexOf(radio);
         slider.style.transform = `translateX(${index * 105}%)`;
         });
         });