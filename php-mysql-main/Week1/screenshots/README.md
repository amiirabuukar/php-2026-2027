# Week 1: PHP Basics and Control Flow

This README explains the PHP and HTML example in `index.php`. It is intended for class review, practice, and exam preparation.

## Project Overview

The page demonstrates these PHP basics:

1. `echo` and `print`
2. Variables
3. Constants using `define()`
4. `if`, `elseif`, and `else`
5. `switch` statements
6. A grade checker using conditions
7. A grade checker using `switch`

## Requirements

- A code editor such as Visual Studio Code
- PHP installed on your computer, or XAMPP with Apache
- A web browser

## Project Structure

```text
Week1/
├── index.php
└── README.md
```

## 1. PHP inside HTML

PHP code is written between `<?php` and `?>`. The server runs the PHP and sends the resulting page to the browser.

```php
<?php
echo "Welcome to PHP";
?>
```

Finish PHP statements with a semicolon (`;`).

## 2. `echo` and `print`

Both commands display output.

```php
echo "Welcome to PHP";
print "Hello World";
```

- `echo` is commonly used to display output.
- `print` displays a string and returns `1`.
- `echo "<br>";` adds a line break to the HTML output.

## 3. Variables

Variables begin with `$`.

```php
$name = "Fuaad";
$age = 20;

echo "My name is $name";
echo "My age is $age";
```

In this example, `$name` stores text and `$age` stores a number.

## 4. Constants

A constant stores a value that is referenced by its name without `$`.

```php
define("COUNTRY", "Somalia");
echo "Country: " . COUNTRY;
```

The dot (`.`) joins strings and values together.

## 5. `if`, `elseif`, and `else`

These statements choose which message to display based on a condition.

```php
$age = 20;

if ($age >= 18) {
    echo "You are an Adult";
} elseif ($age >= 13) {
    echo "You are a Teenager";
} else {
    echo "You are a Child";
}
```

With `$age = 20`, the page displays `You are an Adult`. The first true condition is used.

## 6. `switch`

A `switch` statement checks a value against different `case` options.

```php
$answer = "N";

switch ($answer) {
    case "Y":
    case "y":
        echo "The answer was yes";
        break;

    case "N":
    case "n":
        echo "The answer was no";
        break;

    default:
        echo "Invalid answer";
        break;
}
```

- `case` defines a possible match.
- `break` stops the switch after a match.
- `default` runs if no case matches.

With `$answer = "N"`, the page displays `The answer was no`.

## 7. Grade Checker with `if` / `elseif` / `else`

```php
$marks = 87;

if ($marks >= 90) {
    echo "Excellent";
} elseif ($marks >= 80) {
    echo "Very Good";
} elseif ($marks >= 70) {
    echo "Good";
} else {
    echo "Fail";
}
```

With `$marks = 87`, the output is `Very Good`.

## 8. Grade Checker with `switch`

```php
$score = 80;

switch ($score) {
    case 100:
    case 90:
        echo "Grade A";
        break;

    case 80:
        echo "Grade B";
        break;

    case 70:
        echo "Grade C";
        break;

    case 60:
        echo "Grade D";
        break;

    default:
        echo "Fail";
        break;
}
```

With `$score = 80`, the output is `Grade B`.

**Note:** This `switch` checks exact values (100, 90, 80, 70, and 60). A score such as 87 will reach `default` and display `Fail`. If you want grade ranges, use `if` / `elseif` or a `switch (true)` structure.

## How to Run the Project

### Option A: XAMPP

1. Install and open XAMPP.
2. Start **Apache**.
3. Copy the project folder into XAMPP's `htdocs` folder. For example:

   ```text
   C:\xampp\htdocs\Week1\
   ```

4. Save the PHP code as `index.php` inside that folder.
5. Open your browser and visit:

   ```text
   http://localhost/Week1/
   ```

### Option B: PHP built-in development server

If PHP is installed and available in your terminal:

1. Open the project folder in VS Code.
2. Open **Terminal → New Terminal**.
3. Run:

   ```bash
   php -S localhost:8000
   ```

4. Open this address in your browser:

   ```text
   http://localhost:8000
   ```

Do not open the PHP file by double-clicking it or using a `file:///` URL; PHP needs a server to execute.

## Expected Output

The page should display these messages, each on its own line:

```text
Welcome to PHP
Hello World
My name is Fuaad
My age is 20
Country: Somalia
You are an Adult
The answer was no
Very Good
Grade B
```

## Important Correction

Make sure the title tag in `index.php` is written correctly:

```html
<title>PHP</title>
```

The provided code currently has a typo: `<title>PHp/title>`. Also, if you change the name in the PHP code, update the expected output in this README.

## Learning Goals

After practicing this file, you should be able to display text, create variables and constants, use conditions, and select cases with a `switch` statement.
