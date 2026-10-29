# Week 5: PHP File Uploads

This lesson demonstrates uploading a file through an HTML form and processing it in PHP. The example in [`index.php`](index.php) accepts a file, lets the user provide a new base name, checks the destination and a few file restrictions, then moves the uploaded file.

## 1. Upload form

The form uses `method="post"` and `enctype="multipart/form-data"`, which are required for sending uploaded files. The file input is named `stdimages`; the text input named `filename` supplies the new base name.

```html
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="stdimages" id="stdimages">
    <input type="text" name="filename" id="filename" placeholder="Enter File Name">
    <input type="submit" value="Upload">
</form>
```

## 2. Reading upload information

PHP makes file upload details available in `$_FILES`. This example displays the original filename, browser-reported content type, file size, and temporary path. The uploaded file is initially stored in PHP's temporary upload location.

## 3. Renaming and moving the file

The script extracts the original extension, combines it with the name from `$_POST["filename"]`, and builds a destination path. It uses `move_uploaded_file()` to move the temporary upload to that destination. The output indicates whether the upload succeeded or failed.

## 4. Checks in the example

Before moving the file, the example:

- Checks whether a file with the destination name already exists.
- Allows files smaller than 100 KB.
- Allows only the `jpg` and `pdf` extensions (case-insensitive).
- Displays a message when no file is selected or a check fails.

## 5. Running the example

Run the project through a PHP web server such as Apache in XAMPP; do not open the PHP file directly from the filesystem. The destination directory is hard-coded in `index.php` as `C:/Users/Mohamed Abdirahim/Documents/php-files/`. Create that folder or change the path to a suitable folder on your computer before uploading. Ensure the web server can write to the destination and that PHP's upload size settings allow the file.

## Practice and safety note

This is a basic learning example, not production-ready upload handling. The destination path is machine-specific, the provided filename is not sanitized, and the displayed upload metadata should not be treated as trusted input. Production code should validate upload errors, generate or safely normalize destination filenames, verify file content rather than trusting the submitted extension or browser-reported type, restrict storage and access, and handle filesystem errors.

## Screenshots

Suggested screenshot names, code ranges, and descriptions are in [`screenshots/README.md`](screenshots/README.md).