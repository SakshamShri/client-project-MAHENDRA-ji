// Initial poll type
let pollType = 'open';
function setPollType(type) {
  pollType = type;
  document.getElementById('pt-open').classList.remove('wizard-pt-active-uniq');
  document.getElementById('pt-invite').classList.remove('wizard-pt-active-uniq');
  if(type === 'open'){
    document.getElementById('pt-open').classList.add('wizard-pt-active-uniq');
  } else {
    document.getElementById('pt-invite').classList.add('wizard-pt-active-uniq');
  }
}

// Campaign options logic
function removeOption(btn){
  let wrap = document.getElementById('wizard-options-wrap');
  if(wrap.children.length > 1) btn.closest('.wizard-option-row-uniq').remove();
}
function addOption(){
  let wrap = document.getElementById('wizard-options-wrap');
  let row = document.createElement('div');
  row.className = 'wizard-option-row-uniq';
  row.innerHTML = `<input class="wizard-input-uniq" value=""/> <button class="wizard-remove-opt-uniq" onclick="removeOption(this)"><i class="fa-solid fa-xmark"></i></button>`;
  wrap.appendChild(row);
}

// Verification fields logic
function removeVerif(btn){
  let wrap = document.getElementById('wizard-verif-wrap');
  if(wrap.children.length > 1) btn.closest('.wizard-verif-row-uniq').remove();
}
function addVerif(){
  let wrap = document.getElementById('wizard-verif-wrap');
  let field = document.createElement('div');
  field.className = 'wizard-verif-row-uniq';
  field.innerHTML = `New Field <button class="wizard-xbtn-uniq" onclick="removeVerif(this)"><i class="fa-solid fa-xmark"></i></button>`;
  wrap.appendChild(field);
}

// Wizard navigation logic
let currentStep = 1; // Start from first step (step-1)
function nextStep(n){
  document.querySelectorAll('.wizard-step-uniq').forEach(s => s.style.display='none');
  let nxt = document.getElementById('step-'+n);
  if(nxt) nxt.style.display = 'block';
  currentStep = n;
  updateBackBtn();
}
function prevStep(){
  if(currentStep > 1){
    nextStep(currentStep - 1);
  }
}
// Show/hide back button as per step
function updateBackBtn(){
  document.querySelectorAll('.wizard-back-btn-uniq').forEach(btn => {
    btn.style.display = currentStep <= 1 ? 'none' : 'inline-block';
  });
}

// Initialization (run after DOM is loaded)
document.addEventListener('DOMContentLoaded', function(){
  nextStep(currentStep);
  updateBackBtn();
});


function setPollType(type) {
  pollType = type;
  document.getElementById('pt-open').classList.remove('wizard-pt-active-uniq');
  document.getElementById('pt-invite').classList.remove('wizard-pt-active-uniq');

  // Show/hide campaign sections
  const openCampaign = document.getElementById('opencampaign');
  const inviteOnlyCampaign = document.getElementById('inviteeonlycampaign');
  const nextBtn = document.getElementById('inviteeonlycampaignbutton');

  if(type === 'open') {
    document.getElementById('pt-open').classList.add('wizard-pt-active-uniq');
    openCampaign.style.display = 'block';
    inviteOnlyCampaign.style.display = 'none';
    nextBtn.style.display = 'none';
  } else {
    document.getElementById('pt-invite').classList.add('wizard-pt-active-uniq');
    openCampaign.style.display = 'none';
    inviteOnlyCampaign.style.display = 'block';
    nextBtn.style.display = 'inline-block';
  }
}

// Initialize: Default show open campaign, hide invite-only campaign
document.addEventListener("DOMContentLoaded", function() {
  setPollType('open');
});
