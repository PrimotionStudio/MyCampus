<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pagetitle ?>MyCampus</title>
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/emoji.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <script>   
    if (localStorage.getItem("theme") == "light") {
        document.body.classList.remove("theme-dark");
    } else if (localStorage.getItem("theme") == "dark") {
        document.body.classList.add("theme-dark");
    } else {
        document.body.classList.remove("theme-dark");
    }
    </script>
</head>

<body class="color-theme-blue mont-font">