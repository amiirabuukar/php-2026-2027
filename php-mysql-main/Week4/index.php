<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 4 Practice - PHP Forms &amp; Validation</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6fa; margin: 0; padding: 30px; }
        h1 { color: #1f5fbf; }
        ul { list-style: none; padding: 0; max-width: 560px; }
        li { margin: 6px 0; }
        a { display: block; padding: 10px 14px; background: #fff; border-radius: 6px; color: #222; text-decoration: none; box-shadow: 0 1px 3px rgba(0,0,0,.15); }
        a:hover { background: #e3edff; }
    </style>
</head>
<body>
    <h1>Chapter 4 - Advanced PHP Forms, Validation &amp; Application Workflow</h1>
    <ul>
        <?php
        $files = glob("[0-9][0-9]_*.php");
        sort($files);
        foreach ($files as $file) {
            $title = str_replace("_", " ", substr($file, 3, -4));
            echo "<li><a href=\"" . rawurlencode($file) . "\">" . substr($file, 0, 2) . " - " . htmlspecialchars($title) . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>
