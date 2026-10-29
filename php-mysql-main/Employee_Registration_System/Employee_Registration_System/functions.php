<?php
// Gross Salary = Basic Salary + Allowance
function calculateGrossSalary($basicSalary, $allowance)
{
    return $basicSalary + $allowance;
}

// Bonus: 10% (>= 1000), 5% (>= 500), else 0
function calculateBonus($basicSalary)
{
    if ($basicSalary >= 1000) {
        return $basicSalary * 0.10;
    } elseif ($basicSalary >= 500) {
        return $basicSalary * 0.05;
    } else {
        return 0;
    }
}

// Service benefit: 8% (5+ years), 5% (3+ years), else 0
function calculateServiceBenefit($basicSalary, $yearsOfService)
{
    if ($yearsOfService >= 5) {
        return $basicSalary * 0.08;
    } elseif ($yearsOfService >= 3) {
        return $basicSalary * 0.05;
    } else {
        return 0;
    }
}

// Employment allowance: 6% Full-Time, 3% Part-Time
function calculateEmploymentAllowance($basicSalary, $employmentType)
{
    if ($employmentType == "Full-Time") {
        return $basicSalary * 0.06;
    } elseif ($employmentType == "Part-Time") {
        return $basicSalary * 0.03;
    } else {
        return 0;
    }
}

// Total Benefits = Bonus + Service Benefit + Employment Allowance
function calculateTotalBenefits($bonus, $serviceBenefit, $employmentAllowance)
{
    return $bonus + $serviceBenefit + $employmentAllowance;
}

// Net Salary = Gross Salary + Total Benefits - Deduction
function calculateNetSalary($grossSalary, $totalBenefits, $deduction)
{
    return $grossSalary + $totalBenefits - $deduction;
}

// Salary status: High (>= 1500), Medium (>= 800), Low
function checkSalaryStatus($netSalary)
{
    if ($netSalary >= 1500) {
        return "High Salary";
    } elseif ($netSalary >= 800) {
        return "Medium Salary";
    } else {
        return "Low Salary";
    }
}

// Annual Salary = Net Salary x months (default 12)
function calculateAnnualSalary($netSalary, $months = 12)
{
    return $netSalary * $months;
}