//Part1
let number = 42;
let numberTwo = 49;

if (number % 2 === 0) {
  console.log(`The Number ${number} is even.`);
} else {
  console.log(`The Number ${number} is not even.`);
}

if (numberTwo % 2 === 0) {
    console.log(`The Number ${numberTwo} is even`);
} else {
    console.log(`The Number ${numberTwo} is not even`);
}

// Part2
for (let i = 10; i <= 100; i++) {
    if (i % 2 === 0 && i % 3 === 0) {
      console.log(`The Number ${i} is even and divisible by 3.`);
    }
  }


  // Part 3 

  function isPrime(num) {
    if (num <= 1) return false;
    if (num <= 3) return true;
    if (num % 2 === 0 || num % 3 === 0) return false;
    let i = 5;
    while (i * i <= num) {
      if (num % i === 0 || num % (i + 2) === 0) return false;
      i += 6;
    }
    return true;
  }
  
  function findSmallestAndLargest(numbers) {
    let smallest = numbers[0];
    let largest = numbers[0];
  
    for (let i = 1; i < numbers.length; i++) {
      if (numbers[i] < smallest) {
        smallest = numbers[i];
      }
      if (numbers[i] > largest) {
        largest = numbers[i];
      }
    }
  
    return { smallest, largest };
  }
  
  const number1 = 17;
  const number2 = 28;
  const number3 = 50;
  
  const numbers = [number1, number2, number3];
  const { smallest, largest } = findSmallestAndLargest(numbers);
  
  console.log(`Smallest - ${smallest}, Largest - ${largest}`);
  
  if (isPrime(smallest)) {
    console.log(`The smallest number ${smallest} is prime.`);
  } else {
    console.log(`The smallest number ${smallest} is not prime.`);
  }
  
  if (isPrime(largest)) {
    console.log(`The largest number ${largest} is prime.`);
  } else {
    console.log(`The largest number ${largest} is not prime.`);
  }
  