let budgetInput = $("#budget-input");
let calculateBtn = $("#budget-submit");
let expenseInput = $("#expense-input");
let amountInput = $("#amount-input");
let addExpense = $("#expense-submit");
let budget = $("#budget-amount");
let expense = $("#expense-amount");
let balance = $("#balance-amount");
let budgetError = $(".budget-feedback");
let tempAmount = 0;
let expenseError = $(".expense-feedback");
let totalExpenses = [];
let focusForm = $("#budget-form");

calculateBtn.click(function (event) {
  event.preventDefault();
  tempAmount = budgetInput.val();

  if (tempAmount === "" || tempAmount <= 0) {
    budgetError.css("display", "block");
  } else {
    budgetError.css("display", "none");
    budget.text(+tempAmount);
    calculateBalance();
  }
});

focusForm.mouseenter(function () {
  budgetError.css("display", "none");
});

addExpense.click(function (event) {
  event.preventDefault();
  let expenseTitle = expenseInput.val();
  let expenseAmountValue = parseFloat(amountInput.val());

  if (
    expenseTitle.trim() !== "" &&
    !isNaN(expenseAmountValue) &&
    expenseAmountValue > 0
  ) {
    updateExpenseTable(expenseTitle, expenseAmountValue);

    expenseInput.val("");
    amountInput.val("");
    expenseError.css("display", "none");
  } else {
    expenseError.css("display", "block");
  }
});

function calculateBalance() {
  let budgetAmount = tempAmount;
  let totalExpense = totalExpenses.reduce((acc, value) => acc + value, 0);

  expense.text(totalExpense);
  balance.text(+budgetAmount - totalExpense);
}

function updateExpenseTable(expenseTitle, expenseAmountValue) {
  const newRow = `<tr>
      <td>${expenseTitle.toUpperCase()}</td>
      <td>$${expenseAmountValue}</td>
      <td>
        <button class="edit-icon" style="border: none; margin-right:10px">
          <i class="fa fa-spinner" aria-hidden="true" ></i>
        </button>
        <button class="delete-icon" style="border: none;">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </td>
    </tr>`;

  const tableRow = $(newRow);

  tableRow.find(".delete-icon").click(function () {
    tableRow.remove();
    recalculateExpenses();
  });

  tableRow.find(".edit-icon").click(function () {
    const title = expenseTitle.toUpperCase();
    const amount = expenseAmountValue;

    tableRow.remove();

    $("#expense-input").val(title);
    $("#amount-input").val(amount);
  });

  $("#expense-table").append(tableRow);
  recalculateExpenses();
}

function recalculateExpenses() {
  totalExpenses = [];

  $("#expense-table tr").each(function () {
    const expenseValue = parseFloat(
      $(this).find("td:eq(1)").text().replace("$", "")
    );
    if (!isNaN(expenseValue)) {
      totalExpenses.push(expenseValue);
    }
  });

  calculateBalance();
}
