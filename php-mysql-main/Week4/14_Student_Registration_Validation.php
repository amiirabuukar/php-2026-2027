<?php
// Student Registration Form - full validation checklist (Chapter 4)
$errors = [];
$success = "";
$uploaded = [];

// Sticky values (keep form data after submit)
$fullName  = $_POST['fullName'] ?? "";
$gender    = $_POST['gender'] ?? "";
$courses   = $_POST['courses'] ?? [];
$pob       = $_POST['pob'] ?? "";
$residence = $_POST['residence'] ?? [];
$comment   = $_POST['comment'] ?? "";

if (isset($_POST['submit'])) {

    // empty() -> textbox, password, dropdown, listbox, textarea
    if (empty($fullName))        $errors[] = "Full name is required.";
    if (empty($_POST['password'])) $errors[] = "Password is required.";
    if (empty($pob))             $errors[] = "Please select place of birth.";
    if (empty($residence))       $errors[] = "Please select at least one residence.";
    if (empty($comment))         $errors[] = "Comment is required.";

    // isset()/empty() -> radio button and checkbox
    if (empty($gender))          $errors[] = "Please select gender.";
    if (empty($courses))         $errors[] = "Please select at least one course.";

    // File upload validation: selected, extension, size, exists, rename, multiple
    $allowed = ["jpg", "jpeg", "png", "pdf"];
    $maxSize = 200 * 1024; // 200 KB

    if (empty($_FILES['images']['name'][0])) {
        $errors[] = "Please upload at least one file.";
    } else {
        foreach ($_FILES['images']['name'] as $i => $name) {
            $ext  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $size = $_FILES['images']['size'][$i];

            if (!in_array($ext, $allowed)) {
                $errors[] = "$name: extension .$ext is not allowed.";
            } elseif ($size > $maxSize) {
                $errors[] = "$name: file is too big (max 200 KB).";
            } else {
                $target = "Docs/" . strtolower(str_replace(" ", "_", $fullName)) . "_" . ($i + 1) . "." . $ext;
                if (file_exists($target)) {
                    $errors[] = "$name: file already exists.";
                } elseif (move_uploaded_file($_FILES['images']['tmp_name'][$i], $target)) {
                    $uploaded[] = $target;
                } else {
                    $errors[] = "$name: upload failed (check the Docs folder).";
                }
            }
        }
    }

    if (empty($errors)) {
        $success = "Registration completed successfully.";
    }
}

// Clear button -> reload page with empty data
if (isset($_POST['clear'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

function checked($value, $selected) { return in_array($value, (array)$selected) ? "checked" : ""; }
function selected($value, $selected) { return in_array($value, (array)$selected) ? "selected" : ""; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eef2f7; margin: 0; padding: 30px; }
        .card { max-width: 560px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,.15); }
        h2 { margin-top: 0; color: #1f5fbf; }
        label { display: block; margin: 14px 0 5px; font-weight: bold; }
        input[type=text], input[type=password], select, textarea { width: 100%; padding: 9px; box-sizing: border-box; border: 1px solid #aaa; border-radius: 5px; }
        .inline label { display: inline; font-weight: normal; margin-right: 12px; }
        .btn { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 18px; color: #fff; }
        .btn-primary { background: #1f5fbf; } .btn-gray { background: #666; }
        .error { background: #fde8e8; color: #b00020; padding: 10px 15px; border-radius: 5px; margin-bottom: 10px; }
        .ok { background: #e6f6ea; color: #1b7a34; padding: 10px 15px; border-radius: 5px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Student Registration Form</h2>

    <?php if ($errors): ?>
        <div class="error"><?php foreach ($errors as $e) echo "&bull; " . htmlspecialchars($e) . "<br>"; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="ok"><?= htmlspecialchars($success) ?></div>
        <?php foreach ($uploaded as $file): ?>
            <?php if (preg_match('/\.(jpg|jpeg|png)$/', $file)): ?>
                <img src="<?= htmlspecialchars($file) ?>" alt="uploaded" width="120">
            <?php else: ?>
                <p><?= htmlspecialchars($file) ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label>Full Name:</label>
        <input type="text" name="fullName" value="<?= htmlspecialchars($fullName) ?>">

        <label>Password:</label>
        <input type="password" name="password">

        <label>Gender:</label>
        <div class="inline">
            <input type="radio" name="gender" value="male" <?= checked("male", $gender) ?>> <label>Male</label>
            <input type="radio" name="gender" value="female" <?= checked("female", $gender) ?>> <label>Female</label>
        </div>

        <label>Select Courses:</label>
        <div class="inline">
            <?php foreach (["PHP", "Java", "Python"] as $c): ?>
                <input type="checkbox" name="courses[]" value="<?= $c ?>" <?= checked($c, $courses) ?>> <label><?= $c ?></label>
            <?php endforeach; ?>
        </div>

        <label>Place of Birth:</label>
        <select name="pob">
            <option value="">Select City</option>
            <?php foreach (["Muqdisho", "Hargeysa", "Kismayo", "Marko"] as $city): ?>
                <option value="<?= $city ?>" <?= selected($city, $pob) ?>><?= $city ?></option>
            <?php endforeach; ?>
        </select>

        <label>Select Residence:</label>
        <select name="residence[]" multiple size="4">
            <?php foreach (["Muqdisho", "Hargeysa", "Kismayo", "Marko"] as $city): ?>
                <option value="<?= $city ?>" <?= selected($city, $residence) ?>><?= $city ?></option>
            <?php endforeach; ?>
        </select>

        <label>Comment:</label>
        <textarea name="comment" rows="4"><?= htmlspecialchars($comment) ?></textarea>

        <label>Upload Images:</label>
        <input type="file" name="images[]" multiple>

        <button class="btn btn-primary" type="submit" name="submit">Register</button>
        <button class="btn btn-gray" type="submit" name="clear" formnovalidate>Clear Form</button>
    </form>
</div>
</body>
</html>
