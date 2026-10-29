# CHAPTER 4 - ADVANCED PHP FORMS, VALIDATION & APPLICATION WORKFLOW

============================================

This folder follows the same practice style used in Chapter 3:

* One PHP file for each main concept/example.
* HTML document structure around PHP code.
* Simple comments.
* Examples are based on the Chapter 4 lecture slides.
* The `screenshots` folder contains the images used in the slides.

## FILES

### 01-06 - Form Controls
* 01 - Textbox and Password (`$_POST`, CSS)
* 02 - Textarea
* 03 - Radio Button (`isset` / `!empty`)
* 04 - Checkbox (`name[]`, `sort()`, full stop)
* 05 - Drop-down Menu (single choice)
* 06 - Listbox (multiple choice)

### 07-13 - File Upload
* 07 - `$_FILES` information (name, size, tmp_name, type)
* 08 - `move_uploaded_file()`
* 09 - Renaming the uploaded file
* 10 - `file_exists()`
* 11 - Check file size
* 12 - Limit file extensions (`explode`, `strtolower`, `end`, `in_array`)
* 13 - Upload multiple files

### 14 - Student Registration Form (Validation Checklist)
Complete example: `empty`, `isset`, extension, size, file exists, rename the file as
the user name, show image after upload, multiple files, keep form data after
submit and a button to clear the form.

### Docs/
Destination folder for uploaded files. It must exist and PHP must have permission to write in it.

## RUN

Place the folder inside your XAMPP `htdocs` folder:

    C:\xampp\htdocs\Chapter4 practice

Start **Apache**, then open:

    http://localhost/Chapter4%20practice/

## php.ini (for uploads)

    file_uploads = On
    upload_max_filesize = 40M
    max_file_uploads = 20
    post_max_size = 40M
    max_input_time = 60
    memory_limit = 512M
    max_execution_time = 120

Restart Apache after changing php.ini.

## PURPOSE

This project is created for educational and practical purposes as part of PHP & MySQL learning.
