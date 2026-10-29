<?php
// 1. Gross Salary = Basic Salary + Allowance
function calculateGrossSalary($basicSalary, $allowance)
{
    return $basicSalary + $allowance;
}

// 2. Bonus is based on the Basic Salary
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

// 3. Service Benefit is based on the Years of Service
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

// 4. Employment Allowance is based on the Employment Type
function calculateEmploymentAllowance($basicSalary, $employmentType)
{
    if ($employmentType == "Full-Time") {
        return $basicSalary * 0.06;      // Full-Time -> 6%
    } elseif ($employmentType == "Part-Time") {
        return $basicSalary * 0.03;      // Part-Time -> 3%
    } else {
        return 0;
    }
}

// 5. Total Benefits = Bonus + Service Benefit + Employment Allowance
function calculateTotalBenefits($bonus, $serviceBenefit, $employmentAllowance)
{
    return $bonus + $serviceBenefit + $employmentAllowance;
}

// 6. qadaadiic saafiga ah = qadadiic guud + Wadarta gunnooyinka - kal jaridaa
function calculateNetSalary($grossSalary, $totalBenefits, $deduction)
{
    return $grossSalary + $totalBenefits - $deduction;
}

// 7. Xaaladda qadaadiic waxaa lagu go'aamiyaa qadaadiic saafiga ah
function checkSalaryStatus($netSalary)
{
    if ($netSalary >= 1500) {
        return "High Salary";            // $1,500 or more
    } elseif ($netSalary >= 800) {
        return "Medium Salary";          // $800 to less than $1,500
    } else {
        return "Low Salary";             // less than $800
    }
}
// 8. qadaadiic Sannadlaha ah =  qadaadiicsaafiga ah x 12 (qiimaha caadiga ah ee dood-halbeegga: $months = 12)
function calculateAnnualSalary($netSalary, $months = 12)
{
    return $netSalary * $months;
}
?>
