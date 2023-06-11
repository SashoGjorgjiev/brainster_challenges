document
  .querySelector("#filter-coding")
  .addEventListener("change", filterCoding);
document
  .querySelector("#filter-design")
  .addEventListener("change", filterDesign);
document
  .querySelector("#filter-marketing")
  .addEventListener("change", filterMarketing);

function filterCoding() {
  hideAllCards();

  if (document.querySelector("#filter-coding").checked) {
    var codingCards = document.querySelectorAll(".coding");
    codingCards.forEach((codingCard) => {
      codingCard.style.display = "inline-block";
    });

    document.querySelector("#filter-design").checked = false;
    document.querySelector("#filter-marketing").checked = false;
  } else {
    showAllCards();
  }
}

function filterMarketing() {
  hideAllCards();

  if (document.querySelector("#filter-marketing").checked) {
    var marketingCards = document.querySelectorAll(".marketing");
    marketingCards.forEach((marketingCard) => {
      marketingCard.style.display = "inline-block";
    });

    document.querySelector("#filter-design").checked = false;
    document.querySelector("#filter-coding").checked = false;
  } else {
    showAllCards();
  }
}
function filterDesign() {
  hideAllCards();

  if (document.querySelector("#filter-design").checked) {
    var designCards = document.querySelectorAll(".design");
    designCards.forEach((designCard) => {
      designCard.style.display = "inline-block ";
    });

    document.querySelector("#filter-coding").checked = false;
    document.querySelector("#filter-marketing").checked = false;
  } else {
    showAllCards();
  }
}

function hideAllCards() {
  var allCards = document.querySelectorAll(".card");

  allCards.forEach((card) => {
    card.style.display = "none";
  });
}

function showAllCards() {
  var allCards = document.querySelectorAll(".card");

  allCards.forEach((card) => {
    card.style.display = "inline-block";
  });
}
// select and options list
function toggleOptions() {
  var optionsList = document.getElementById("optionsList");
  optionsList.classList.toggle("active");
}

function selectOption(option) {
  var selectBtnText = document.querySelector(".sBtn-text");
  selectBtnText.textContent = option.textContent;
  toggleOptions();
}

document.addEventListener("click", function (event) {
  var selectBtn = document.querySelector(".select-btn");
  var optionsList = document.getElementById("optionsList");

  if (!selectBtn.contains(event.target)) {
    optionsList.classList.remove("active");
  }
});

const delay = 150; 

let charIndex = 0;
let timer;

function typeText() {
  if (charIndex < text.length) {
    document.getElementById("typing-text").textContent +=
      text.charAt(charIndex);
    charIndex++;
    timer = setTimeout(typeText, delay);
  }
}

typeText();
// FORM SUBMIT

function submitForm(event) {
  event.preventDefault();

  const alertMessageDiv = document.getElementById("alertMessage");
  alertMessageDiv.textContent = "Form submitted successfully!";
  alertMessageDiv.classList.remove("d-none");

}