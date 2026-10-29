<?php
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Registration Result</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eef2f7; margin: 0; padding: 30px; }
        .container { max-width: 720px; margin: auto; background: #ffffff; padding: 25px 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.15); }
        h1 { text-align: center; color: #1f3a5f; margin-top: 0; }
        .error { background: #fdecea; border: 1px solid #f5c2c0; color: #a12622; padding: 10px 15px; border-radius: 4px; }
        .success { background: #e6f4ea; border: 1px solid #b7dfc2; color: #1e6b34; padding: 10px 15px; border-radius: 4px; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #c9d1dc; padding: 8px 10px; text-align: left; }
        th { background: #1f3a5f; color: #ffffff; width: 45%; }
        tr:nth-child(even) td { background: #f5f8fc; }
        a.back { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #1f6feb; color: #ffffff; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
<div class="container">
<h1>Employee Registration Result</h1>
<?php
if (isset($_POST['submit'])) {

    // ---------- 1. RETRIEVE THE FORM DATA ($_POST) ----------
    $fullName       = $_POST['fullName'];
    $employeeId     = $_POST['employeeId'];
    $department     = $_POST['department'];
    $basicSalary    = $_POST['basicSalary'];
    $allowance      = $_POST['allowance'];
    $deduction      = $_POST['deduction'];
    $yearsOfService = $_POST['yearsOfService'];

    // Radio buttons are missing from $_POST when nothing is selected, so use isset()
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = "";
    }
    if (isset($_POST['employmentType'])) {
        $employmentType = $_POST['employmentType'];
    } else {
        $employmentType = "";
    }

    // Holds all error messages (each one is added as an HTML list item)
    $errorMessages = "";
    // Becomes false if a number or the employment type is invalid (calculations need them)
    $validNumbers = true;

    // ---------- 2. VALIDATE THE FORM DATA ----------

    // Rule 1: Employee Name and ID must not be empty
    if (empty($fullName)) {
        $errorMessages .= "<li>Employee Full Name must not be empty.</li>";
    }
    if (empty($employeeId)) {
        $errorMessages .= "<li>Employee ID must not be empty.</li>";
    }

    // Rule 2: Gender, Department and Employment Type must be selected
    if (empty($gender)) {
        $errorMessages .= "<li>Please select a Gender.</li>";
    }
    if (empty($department)) {
        $errorMessages .= "<li>Please select a Department.</li>";
    }
    if (empty($employmentType)) {
        $errorMessages .= "<li>Please select an Employment Type.</li>";
        $validNumbers = false;
    }

    // Rule 3: Basic Salary must be greater than zero
    // (empty() also catches "0", which is correct here because zero is not allowed)
    if (empty($basicSalary) || $basicSalary <= 0) {
        $errorMessages .= "<li>Basic Salary must be greater than zero.</li>";
        $validNumbers = false;
    }

    // Rule 4: Allowance, Deduction and Years of Service cannot be negative.
    // Zero is valid, so empty() is NOT used here (empty("0") is true). Compare with "" instead.
    if ($allowance === "") {
        $errorMessages .= "<li>Allowance must be entered (use 0 if there is none).</li>";
        $validNumbers = false;
    } elseif ($allowance < 0) {
        $errorMessages .= "<li>Allowance cannot be negative.</li>";
        $validNumbers = false;
    }

    if ($deduction === "") {
        $errorMessages .= "<li>Deduction must be entered (use 0 if there is none).</li>";
        $validNumbers = false;
    } elseif ($deduction < 0) {
        $errorMessages .= "<li>Deduction cannot be negative.</li>";
        $validNumbers = false;
    }

    // Rules 4 and 5: Years of Service cannot be negative and must be a whole number
    if ($yearsOfService === "") {
        $errorMessages .= "<li>Years of Service must be entered (use 0 if less than a year).</li>";
        $validNumbers = false;
    } elseif ($yearsOfService < 0) {
        $errorMessages .= "<li>Years of Service cannot be negative.</li>";
        $validNumbers = false;
    } elseif ($yearsOfService != (int)$yearsOfService) {
        $errorMessages .= "<li>Years of Service must be a whole number.</li>";
        $validNumbers = false;
    }

    // ---------- 3. CALCULATIONS (only when the numbers are valid) ----------
    if ($validNumbers) {
        $grossSalary         = calculateGrossSalary($basicSalary, $allowance);
        $bonus               = calculateBonus($basicSalary);
        $serviceBenefit      = calculateServiceBenefit($basicSalary, $yearsOfService);
        $employmentAllowance = calculateEmploymentAllowance($basicSalary, $employmentType);
        $totalBenefits       = calculateTotalBenefits($bonus, $serviceBenefit, $employmentAllowance);

        // Rule 6: Deduction cannot exceed Gross Salary plus Total Benefits
        if ($deduction > $grossSalary + $totalBenefits) {
            $errorMessages .= "<li>Deduction cannot exceed Gross Salary plus Total Benefits ($" . ($grossSalary + $totalBenefits) . ").</li>";
        } else {
            $netSalary    = calculateNetSalary($grossSalary, $totalBenefits, $deduction);
            $salaryStatus = checkSalaryStatus($netSalary);
            $annualSalary = calculateAnnualSalary($netSalary);   // default argument: 12 months
        }
    }

    // ---------- 4. DOCUMENT UPLOAD ($_FILES) ----------
    $maxFileSize = 2 * 1024 * 1024;     // 2 MB in bytes

    // Rule 7: an employee document must be selected
    if (!empty($_FILES['document']['name'])) {

        // Retrieve the file information
        $fileName = $_FILES['document']['name'];       // original file name
        $fileSize = $_FILES['document']['size'];       // size in bytes
        $fileType = $_FILES['document']['type'];       // file type
        $fileTmp  = $_FILES['document']['tmp_name'];   // temporary location

        // Reject documents larger than 2 MB
        if ($fileSize > $maxFileSize) {
            $errorMessages .= "<li>Upload error: the file " . $fileName . " is too big. The maximum size is 2 MB.</li>";
        }
        // Do not overwrite: reject a file name that already exists in uploads/
        elseif (file_exists("uploads/" . $fileName)) {
            $errorMessages .= "<li>Upload error: the file " . $fileName . " already exists. Please rename it and try again.</li>";
        }
    } else {
        $errorMessages .= "<li>An employee document must be selected.</li>";
    }

    // Save the document only when everything else is valid
    if ($errorMessages == "") {
        if (move_uploaded_file($fileTmp, "uploads/" . $fileName)) {
            $uploadStatus = "Uploaded successfully";
        } else {
            $errorMessages .= "<li>Upload error: the document could not be saved. Check that the uploads folder exists.</li>";
        }
    }

    // ---------- 5. DISPLAY: errors OR results ----------
    if ($errorMessages != "") {

        // Validation or upload failed: show every error message
        echo "<div class='error'><strong>Please fix the following errors:</strong><ul>" . $errorMessages . "</ul></div>";

    } else {

        echo "<div class='success'>Validation passed. Document " . $fileName . " has been uploaded successfully.</div>";

        echo "<table>";

        // Employee information
        echo "<tr><th>Employee Name</th><td>" . $fullName . "</td></tr>";
        echo "<tr><th>Employee ID</th><td>" . $employeeId . "</td></tr>";
        echo "<tr><th>Gender</th><td>" . $gender . "</td></tr>";
        echo "<tr><th>Department</th><td>" . $department . "</td></tr>";
        echo "<tr><th>Employment Type</th><td>" . $employmentType . "</td></tr>";
        echo "<tr><th>Years of Service</th><td>" . $yearsOfService . "</td></tr>";

        // Salary information
        echo "<tr><th>Basic Salary</th><td>$" . $basicSalary . "</td></tr>";
        echo "<tr><th>Allowance</th><td>$" . $allowance . "</td></tr>";
        echo "<tr><th>Gross Salary</th><td>$" . $grossSalary . "</td></tr>";
        echo "<tr><th>Bonus</th><td>$" . $bonus . "</td></tr>";
        echo "<tr><th>Service Benefit</th><td>$" . $serviceBenefit . "</td></tr>";
        echo "<tr><th>Employment Allowance</th><td>$" . $employmentAllowance . "</td></tr>";
        echo "<tr><th>Total Benefits</th><td>$" . $totalBenefits . "</td></tr>";
        echo "<tr><th>Deduction</th><td>$" . $deduction . "</td></tr>";
        echo "<tr><th>Net Salary</th><td>$" . $netSalary . "</td></tr>";
        echo "<tr><th>Salary Status</th><td>" . $salaryStatus . "</td></tr>";
        echo "<tr><th>Annual Salary</th><td>$" . $annualSalary . "</td></tr>";

        // Uploaded document information
        echo "<tr><th>Uploaded Document Name</th><td>" . $fileName . "</td></tr>";
        echo "<tr><th>Document Type</th><td>" . $fileType . "</td></tr>";
        echo "<tr><th>Document Size</th><td>" . $fileSize . " bytes</td></tr>";
        echo "<tr><th>Upload Status</th><td>" . $uploadStatus . "</td></tr>";

        echo "</table>";
    }

} else {
    // The page was opened directly without submitting the form
    echo "<div class='error'>No form data received. Please use the registration form.</div>";
}
?>
<a class="back" href="index.html">Back to Registration Form</a>
</div>
</body>
</html>
