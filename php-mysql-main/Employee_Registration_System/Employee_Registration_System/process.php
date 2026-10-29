
<?php
require_once "functions.php";

// CHAPTER 4: Retrieving Form Data Using POST
$fullname = "";
$employeeId = "";
$gender = "";
$department = "";
$employmentType = "";
$basicSalary = "";
$allowance = "";
$deduction = "";
$years = "";

if (isset($_POST["submit"])) {
    if (isset($_POST["fullname"])) {
        $fullname = $_POST["fullname"];
    }

    if (isset($_POST["employee_id"])) {
        $employeeId = $_POST["employee_id"];
    }

    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }

    if (isset($_POST["department"])) {
        $department = $_POST["department"];
    }

    if (isset($_POST["employment_type"])) {
        $employmentType = $_POST["employment_type"];
    }

    if (isset($_POST["basic_salary"])) {
        $basicSalary = $_POST["basic_salary"];
    }

    if (isset($_POST["allowance"])) {
        $allowance = $_POST["allowance"];
    }

    if (isset($_POST["deduction"])) {
        $deduction = $_POST["deduction"];
    }

    if (isset($_POST["years_of_service"])) {
        $years = $_POST["years_of_service"];
    }
}

// CHAPTER 4: Form Validation Using empty()
$errors = "";

if (empty($fullname)) {
    $errors .= "<li>Employee name is required.</li>";
}

if (empty($employeeId)) {
    $errors .= "<li>Employee ID is required.</li>";
}

if (empty($gender)) {
    $errors .= "<li>Please select gender.</li>";
}

if (empty($department)) {
    $errors .= "<li>Please select a department.</li>";
}

if (empty($employmentType)) {
    $errors .= "<li>Please select employment type.</li>";
}

// Basic salary must be greater than zero.
if ($basicSalary == "") {
    $errors .= "<li>Basic salary is required.</li>";
} elseif ($basicSalary <= 0) {
    $errors .= "<li>Basic salary must be greater than zero.</li>";
}

// Allowance may be zero.
if ($allowance == "") {
    $errors .= "<li>Allowance is required.</li>";
} elseif ($allowance < 0) {
    $errors .= "<li>Allowance cannot be negative.</li>";
}

// Deduction may be zero.
if ($deduction == "") {
    $errors .= "<li>Deduction is required.</li>";
} elseif ($deduction < 0) {
    $errors .= "<li>Deduction cannot be negative.</li>";
}

// Years of service may be zero.
if ($years == "") {
    $errors .= "<li>Years of service is required.</li>";
} elseif ($years < 0) {
    $errors .= "<li>Years of service cannot be negative.</li>";
}

// CHAPTER 3: Calling Functions and Using Return Values
if ($errors == "") {
    $grossSalary = calculateGrossSalary(
        $basicSalary,
        $allowance
    );

    $bonus = calculateBonus($basicSalary);

    $serviceBenefit = calculateServiceBenefit(
        $basicSalary,
        $years
    );

    $employmentAllowance = calculateEmploymentAllowance(
        $basicSalary,
        $employmentType
    );

    $totalBenefits = calculateTotalBenefits(
        $bonus,
        $serviceBenefit,
        $employmentAllowance
    );

    // Validate deduction against gross salary and benefits.
    if ($deduction > $grossSalary + $totalBenefits) {
        $errors .= "<li>Deduction cannot exceed gross salary plus benefits.</li>";
    }
}

// CHAPTER 4: File Upload Using $_FILES
$maxSize = 2 * 1024 * 1024;
$uploadDir = "uploads/";

$fileName = "";
$fileSize = 0;
$fileType = "";
$tempPath = "";
$targetPath = "";
$uploadStatus = "Not uploaded";

if (isset($_FILES["document"])) {
    if (empty($_FILES["document"]["name"])) {
        $errors .= "<li>Please select an employee document.</li>";
    } else {
        $fileName = $_FILES["document"]["name"];
        $fileSize = $_FILES["document"]["size"];
        $fileType = $_FILES["document"]["type"];
        $tempPath = $_FILES["document"]["tmp_name"];

        $targetPath = $uploadDir . $fileName;
        $fileParts = explode(".", $fileName);
        $extension = strtolower(end($fileParts));

        if ($fileSize > $maxSize) {
            $errors .= "<li>The document cannot exceed 2 MB.</li>";
        } elseif (
            $extension != "pdf" &&
            $extension != "doc" &&
            $extension != "docx" &&
            $extension != "jpg" &&
            $extension != "jpeg" &&
            $extension != "png"
        ) {
            $errors .= "<li>File type is not allowed.</li>";
        } elseif (file_exists($targetPath)) {
            $errors .= "<li>This document already exists.</li>";
        }
    }
}

// CHAPTER 4: Uploading the File
if ($errors == "") {
    if (move_uploaded_file($tempPath, $targetPath)) {
        $uploadStatus = "Upload successful";
    } else {
        $errors .= "<li>Document upload failed.</li>";
    }
}

// CHAPTER 3: Calling the Remaining Functions
if ($errors == "") {
    $netSalary = calculateNetSalary(
        $grossSalary,
        $totalBenefits,
        $deduction
    );

    $salaryStatus = checkSalaryStatus($netSalary);

    // Uses the default argument defined in functions.php.
    $annualSalary = calculateAnnualSalary($netSalary);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Registration Result</title>
</head>
<body>

<h1>Employee Registration Result</h1>

<?php
// CHAPTER 4: Displaying Validation Errors
if ($errors != "") {
    echo "<h2>Registration Failed</h2>";
    echo "<ul>" . $errors . "</ul>";
} else {
    // Display employee information and calculation results.
    echo "<h2>Employee Details</h2>";

    echo "<table border='1' cellpadding='8'>";

    echo "<tr><th>Employee Name</th><td>$fullname</td></tr>";
    echo "<tr><th>Employee ID</th><td>$employeeId</td></tr>";
    echo "<tr><th>Gender</th><td>$gender</td></tr>";
    echo "<tr><th>Department</th><td>$department</td></tr>";
    echo "<tr><th>Employment Type</th><td>$employmentType</td></tr>";
    echo "<tr><th>Years of Service</th><td>$years</td></tr>";

    echo "<tr><th>Basic Salary</th><td>$basicSalary</td></tr>";
    echo "<tr><th>Allowance</th><td>$allowance</td></tr>";
    echo "<tr><th>Gross Salary</th><td>$grossSalary</td></tr>";
    echo "<tr><th>Bonus</th><td>$bonus</td></tr>";
    echo "<tr><th>Service Benefit</th><td>$serviceBenefit</td></tr>";
    echo "<tr><th>Employment Allowance</th><td>$employmentAllowance</td></tr>";
    echo "<tr><th>Total Benefits</th><td>$totalBenefits</td></tr>";
    echo "<tr><th>Deduction</th><td>$deduction</td></tr>";
    echo "<tr><th>Net Salary</th><td>$netSalary</td></tr>";
    echo "<tr><th>Salary Status</th><td>$salaryStatus</td></tr>";
    echo "<tr><th>Annual Salary</th><td>$annualSalary</td></tr>";

    echo "<tr><th>Document Name</th><td>$fileName</td></tr>";
    echo "<tr><th>Document Type</th><td>$fileType</td></tr>";
    echo "<tr><th>Document Size</th><td>$fileSize bytes</td></tr>";
    echo "<tr><th>Upload Status</th><td>$uploadStatus</td></tr>";

    echo "</table>";
}
?>

<p><a href="index.html">Back to Registration Form</a></p>

</body>
</html>
