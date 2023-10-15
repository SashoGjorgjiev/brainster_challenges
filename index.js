class Book {
  constructor(title, author, maxPages, onPage) {
    this.title = title;
    this.author = author;
    this.maxPages = maxPages;
    this.onPage = onPage;
  }

  readStatus() {
    if (this.maxPages == this.onPage) {
      return `You already have read ${this.title} by ${this.author}`;
    } else {
      return `You still need to read ${this.title} by ${this.author}`;
    }
  }
}

const booksArray = [
  new Book("To Kill a Mockingbird", "Harper Lee", 281, 135),
  new Book("Harry Potter and the Sorcerers Stone", ": J.K. Rowling", 309, 98),
  new Book("The Great Gatsby", "F. Scott Fitzgerald", 281, 42),
  new Book("The Hobbit", " J.R.R. Tolkien", 310, 310),
  new Book("The Catcher in the Rye", "J.D. Salinger", 277, 162),
];

let newUl = document.createElement("ul");
newUl.style.listStyleType = "none";

booksArray.forEach((book) => {
  const bookInfo = document.createElement("li");
  bookInfo.textContent = `${book.title} by ${book.author}`;
  newUl.appendChild(bookInfo);
});
document.body.appendChild(newUl);

booksArray.forEach((book) => {
    const h4Tag = document.createElement("h4");
    h4Tag.textContent = book.readStatus();
    if (book.maxPages === book.onPage) {
        h4Tag.style.color = "green";
    } else {
        h4Tag.style.color = "red";
    }
    document.body.appendChild(h4Tag);
})






function createProgressBar(onPage, maxPages) {
    const progressBar = document.createElement("div");
    progressBar.classList.add("progress");

    const progressFill = document.createElement("div");
    progressFill.classList.add("progress-bar");
    const percentage = Math.round((onPage / maxPages) * 100);
    progressFill.style.width = `${percentage}%`;
    progressFill.textContent = `${percentage}%`; 
    progressBar.appendChild(progressFill);

    return progressBar;
}

function addBookToTable(book, index) {
    const table = document.getElementById("bookList");
    const row = table.insertRow();
    row.insertCell(0).textContent = index + 1; 1
    row.insertCell(1).textContent = book.title;
    row.insertCell(2).textContent = book.author;
    row.insertCell(3).textContent = book.maxPages;
    row.insertCell(4).textContent = book.onPage;
    const progressBarCell = row.insertCell(5);
    progressBarCell.appendChild(createProgressBar(book.onPage, book.maxPages));
}

booksArray.forEach(addBookToTable);

const bookForm = document.getElementById("bookForm");
bookForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const title = document.getElementById("title").value;
    const author = document.getElementById("author").value;
    const maxPages = parseInt(document.getElementById("maxPages").value);
    const onPage = parseInt(document.getElementById("onPage").value);

    booksArray.push({ title, author, maxPages, onPage });

    localStorage.setItem('booksArray', JSON.stringify(booksArray));

    addBookToTable(booksArray[booksArray.length - 1], booksArray.length - 1);

    document.getElementById("title").value = "";
    document.getElementById("author").value = "";
    document.getElementById("maxPages").value = "";
    document.getElementById("onPage").value = "";
});