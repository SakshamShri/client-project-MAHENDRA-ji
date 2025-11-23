// (function(){
//   const track = document.getElementById('pcTrack');
//   const cards = Array.from(track.children);
//   const prevBtn = document.querySelector('.pc-btn-prev');
//   const nextBtn = document.querySelector('.pc-btn-next');
//   const dotsWrap = document.getElementById('pcDots');
//   const viewport = document.querySelector('.pc-slider-viewport');

//   let index = 0;
//   let cardWidth;

//   // Clone first + last slides for smooth infinite loop
//   const firstClone = cards[0].cloneNode(true);
//   const lastClone = cards[cards.length - 1].cloneNode(true);

//   track.appendChild(firstClone);
//   track.insertBefore(lastClone, cards[0]);

//   const allSlides = Array.from(track.children);

//   function updateCardWidth(){
//     cardWidth = allSlides[0].getBoundingClientRect().width + parseInt(getComputedStyle(track).gap || 18);
//   }

//   function goTo(i){
//     index = i;
//     track.style.transition = "transform 0.4s ease";
//     track.style.transform = `translateX(-${index * cardWidth}px)`;
//   }

//   track.addEventListener("transitionend", () => {
//     if(index === allSlides.length - 1){   // reached cloned first
//       track.style.transition = "none";
//       index = 1;
//       track.style.transform = `translateX(-${index * cardWidth}px)`;
//     }
//     if(index === 0){   // reached cloned last
//       track.style.transition = "none";
//       index = allSlides.length - 2;
//       track.style.transform = `translateX(-${index * cardWidth}px)`;
//     }
//   });

//   // Buttons
//   prevBtn.onclick = ()=>{
//     goTo(index - 1);
//     resetAuto();
//   };
//   nextBtn.onclick = ()=>{
//     goTo(index + 1);
//     resetAuto();
//   };

//   let auto;
//   function startAuto(){
//     auto = setInterval(()=> goTo(index + 1), 3000);
//   }
//   function resetAuto(){
//     clearInterval(auto);
//     startAuto();
//   }

//   updateCardWidth();
//   goTo(1);
//   startAuto();

//   // Resize → recalc card width
//   window.addEventListener("resize", ()=>{
//     updateCardWidth();
//     goTo(index);
//   });
// })();




// (function(){
//   const track = document.getElementById('ipoXTrack');
//   const cards = Array.from(track.children);
//   const prev = document.querySelector('.ipoX-btn-prev');
//   const next = document.querySelector('.ipoX-btn-next');
//   const dotsWrap = document.getElementById('ipoXDots');

//   let index = 0;
//   let cardWidth;

//   // Clone first & last for infinite loop
//   const firstClone = cards[0].cloneNode(true);
//   const lastClone = cards[cards.length - 1].cloneNode(true);

//   track.appendChild(firstClone);
//   track.insertBefore(lastClone, cards[0]);

//   const allSlides = Array.from(track.children);

//   // Create dots
//   for(let i=0; i < cards.length; i++){
//     let dot = document.createElement('div');
//     dot.className = "ipoX-dot";
//     dot.onclick = ()=>{ goTo(i+1); resetAuto(); };
//     dotsWrap.appendChild(dot);
//   }

//   const dots = dotsWrap.querySelectorAll('.ipoX-dot');

//   function updateDots(){
//     dots.forEach(d=>d.classList.remove('active'));
//     dots[index-1]?.classList.add('active');
//   }

//   function updateWidth(){
//     cardWidth = allSlides[0].getBoundingClientRect().width + 18;
//   }

//   function goTo(i){
//     index = i;
//     track.style.transition = "0.4s ease";
//     track.style.transform = `translateX(-${index * cardWidth}px)`;
//     updateDots();
//   }

//   track.addEventListener("transitionend", ()=>{
//     if(index === allSlides.length - 1){
//       track.style.transition = "none";
//       index = 1;
//       track.style.transform = `translateX(-${index * cardWidth}px)`;
//     }
//     if(index === 0){
//       track.style.transition = "none";
//       index = allSlides.length - 2;
//       track.style.transform = `translateX(-${index * cardWidth}px)`;
//     }
//   });

//   prev.onclick = ()=>{ goTo(index - 1); resetAuto(); };
//   next.onclick = ()=>{ goTo(index + 1); resetAuto(); };

//   let auto;
//   function startAuto(){
//     auto = setInterval(()=> goTo(index + 1), 3000);
//   }
//   function resetAuto(){
//     clearInterval(auto);
//     startAuto();
//   }

//   updateWidth();
//   goTo(1);
//   updateDots();
//   startAuto();

//   window.addEventListener("resize", ()=>{
//     updateWidth();
//     goTo(index);
//   });
// })();



// Open popup
document.querySelector(".search-btn-unique").addEventListener("click", function () {
    document.querySelector(".search-popup-unique").style.display = "flex";
    document.querySelector(".search-input-unique").focus();
});

// Close popup
document.querySelector(".close-btn-unique").addEventListener("click", function () {
    document.querySelector(".search-popup-unique").style.display = "none";
    document.querySelector(".search-results-unique").innerHTML = "";
});

// Updated dummy user list with image + role + status
const userListUnique = [
    {
        name: "Ajinkya McMohan",
        role: "Jr. Software Engineer",
        img: "https://i.pravatar.cc/150?img=11",
        online: true
    },
    {
        name: "Emily Carter",
        role: "Project Manager",
        img: "https://i.pravatar.cc/150?img=32",
        online: true
    },
    {
        name: "Sara Wilson",
        role: "Lead UX Designer",
        img: "https://i.pravatar.cc/150?img=48",
        online: true
    },
    {
        name: "Michael Ross",
        role: "Sr. Marketing Head",
        img: "https://i.pravatar.cc/150?img=21",
        online: true
    }
];

// Live search (UPDATED UI)
document.querySelector(".search-input-unique").addEventListener("input", function () {

    const query = this.value.toLowerCase();

    const filtered = userListUnique.filter(user =>
        user.name.toLowerCase().includes(query)
    );

    const resultsList = document.querySelector(".search-results-unique");
    resultsList.innerHTML = "";

    filtered.forEach(user => {

        const li = document.createElement("li");

        li.innerHTML = `
            <img src="${user.img}" class="result-user-img">
            
            <div class="result-user-text">
                <p class="result-user-name">${user.name}</p>
                <p class="result-user-role">${user.role}</p>
            </div>

            <div class="result-online-status">
                Online <span class="result-online-dot"></span>
            </div>
        `;

        li.addEventListener("click", () => {
            alert("You selected: " + user.name);
            document.querySelector(".search-popup-unique").style.display = "none";
            resultsList.innerHTML = "";
        });

        resultsList.appendChild(li);
    });

});



// ========= BUTTON ACTIVE TOGGLE (Rank / Score) =========
const lbRankBtn = document.getElementById("lbRankBtn");
const lbScoreBtn = document.getElementById("lbScoreBtn");

lbRankBtn.addEventListener("click", () => {
    lbRankBtn.classList.add("lb-btn-active");
    lbScoreBtn.classList.remove("lb-btn-active");
});

lbScoreBtn.addEventListener("click", () => {
    lbScoreBtn.classList.add("lb-btn-active");
    lbRankBtn.classList.remove("lb-btn-active");
});


// ========= TABS ACTIVE TOGGLE (All / Follow) =========
const lbTabAll = document.getElementById("lbTabAll");
const lbTabFollow = document.getElementById("lbTabFollow");

lbTabAll.addEventListener("click", () => {
    lbTabAll.classList.add("lb-tab-active");
    lbTabFollow.classList.remove("lb-tab-active");
    applyFilters(); // tab switch = re-filter
});

lbTabFollow.addEventListener("click", () => {
    lbTabFollow.classList.add("lb-tab-active");
    lbTabAll.classList.remove("lb-tab-active");
    applyFilters();
});


// ========= FILTERS =========
const regionDropdown = document.getElementById("lbRegion");
const metricDropdown = document.getElementById("lbMetric");

regionDropdown.addEventListener("change", applyFilters);
metricDropdown.addEventListener("change", applyFilters);


// ========= MAIN FILTER FUNCTION =========
function applyFilters() {

    const selectedRegion = regionDropdown.value;
    const selectedMetric = metricDropdown.value;

    const showFollowOnly = lbTabFollow.classList.contains("lb-tab-active");

    // Get all tracks/cards
    const tracks = document.querySelectorAll(".ipoX-slider-track");

    tracks.forEach(track => {

        const cardRegion = track.dataset.region;      // india / usa / uk
        const cardMetric = track.dataset.metric;      // coding / design
        const isFollowed = track.dataset.followed;    // yes / no

        let visible = true;

        // REGiON FILTER
        if (selectedRegion !== "all" && selectedRegion !== cardRegion) {
            visible = false;
        }

        // METRIC FILTER
        if (selectedMetric !== "all" && selectedMetric !== cardMetric) {
            visible = false;
        }

        // FOLLOW FILTER
        if (showFollowOnly && isFollowed !== "yes") {
            visible = false;
        }

        // APPLY VISIBILITY
        track.style.display = visible ? "flex" : "none";
    });
}



// Buttons
const tpBtnRegion = document.getElementById("tpBtnRegion");
const tpBtnCategory = document.getElementById("tpBtnCategory");
const tpBtnActive = document.getElementById("tpBtnActive");
const tpPeriod = document.getElementById("tpPeriod");

// Cards
const tpCards = document.querySelectorAll(".tp-card");

// ===========================
// APPLY FILTERS
// ===========================
function applyTPFilters() {

    const regionActive = tpBtnRegion.classList.contains("lb-btn-active");
    const categoryActive = tpBtnCategory.classList.contains("lb-btn-active");
    const activeFilter = tpBtnActive.classList.contains("lb-btn-active");

    const periodValue = tpPeriod.value;

    tpCards.forEach(card => {

        const cardRegion = card.dataset.region;
        const cardCategory = card.dataset.category;
        const cardActive = card.dataset.active;

        let show = true;

        // Category A filter
        if (categoryActive && cardCategory !== "a") {
            show = false;
        }

        // Active filter
        if (activeFilter && cardActive !== "yes") {
            show = false;
        }

        // Period (future use)
        // if (periodValue !== "all") { ... }

        card.style.display = show ? "block" : "none";
    });
}


// ===========================
// BUTTON CLICKS
// ===========================
tpBtnRegion.onclick = () => {
    tpBtnRegion.classList.toggle("lb-btn-active");
    applyTPFilters();
};

tpBtnCategory.onclick = () => {
    tpBtnCategory.classList.toggle("lb-btn-active");
    applyTPFilters();
};

tpBtnActive.onclick = () => {
    tpBtnActive.classList.toggle("lb-btn-active");
    applyTPFilters();
};

tpPeriod.onchange = applyTPFilters;


/* ---------- configuration (change these values) ---------- */
  const psiScore = 72;   // 0..100
  const smpsScore = 64;  // 0..100

  /* ---------- gauge logic ---------- */
  // We will animate the colored arc stroke-dasharray to reveal percent of semi-circle
  // The arc path approx length (semi-circle): compute from radius ~48 -> length = pi*r = 3.1416*48 ~150.8
  // But because viewbox scaling, we'll use measurement via getTotalLength.

  document.addEventListener("DOMContentLoaded", () => {
    const arc = document.getElementById('as-gauge-arc-fill');
    const needle = document.getElementById('as-needle');
    const psiValueEl = document.getElementById('psi-value');
    const smpsValueEl = document.getElementById('smps-value');

    // display numeric values
    psiValueEl.firstChild.nodeValue = psiScore;
    smpsValueEl.firstChild.nodeValue = smpsScore;

    // animate arc fill
    if(arc){
      const pathLen = arc.getTotalLength();
      // set up dash
      arc.style.strokeDasharray = `0 ${pathLen}`;
      arc.style.transition = 'stroke-dasharray 900ms cubic-bezier(.2,.9,.2,1)';
      // percentage across semi-circle
      const pct = Math.max(0, Math.min(100, psiScore)) / 100;
      // reveal length
      const reveal = pathLen * pct;
      // delay small
      setTimeout(()=> {
        arc.style.strokeDasharray = `${reveal} ${pathLen}`;
      }, 140);
    }

    // animate needle angle: map 0..100 to -90deg..90deg (semi circle)
    const angle = (Math.max(0,Math.min(100, psiScore)) / 100) * 180 - 90;
    needle.style.transform = `rotate(${angle}deg)`;

    // some accessible focus/hover style for vote button
    const voteBtn = document.getElementById('as-vote-btn');
    voteBtn.addEventListener('mouseenter', ()=> {
      voteBtn.style.transform = 'translateY(-2px)';
    });
    voteBtn.addEventListener('mouseleave', ()=> {
      voteBtn.style.transform = '';
    });

    // small click animation and a demo toast (optional)
    voteBtn.addEventListener('click', (e) => {
      // quick pulse
      voteBtn.animate([
        { transform: 'scale(1)' },
        { transform: 'scale(0.96)' },
        { transform: 'scale(1)' }
      ], { duration: 260, easing: 'ease-out' });
      // simple visual feedback: change text briefly
      const old = voteBtn.textContent;
      voteBtn.textContent = 'Voted ✓';
      setTimeout(()=> voteBtn.textContent = old, 1100);
    });
  });


const selectedIds = new Set();
const btns = document.querySelectorAll('.as-compare-icon-btn');
const popupBtn = document.getElementById('compare-popup-btn-uniq');
const countSpan = document.getElementById('as-cart-count-uniq');

btns.forEach(btn => {
  btn.addEventListener('click', function() {
    if (btn.disabled || btn.classList.contains('selected')) return;
    const pid = btn.getAttribute('data-id');
    selectedIds.add(pid);
    btn.classList.add('selected');
    btn.disabled = true;

    updateCartDisplay();
  });
});

function updateCartDisplay() {
  if (selectedIds.size > 0) {
    popupBtn.style.display = "flex";
    countSpan.innerText = selectedIds.size;
  } else {
    popupBtn.style.display = "none";
    countSpan.innerText = 0;
  }
}

