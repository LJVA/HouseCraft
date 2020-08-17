<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/menuLateral.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="banner">
            <h2 id="text">House Craft</h2>
            <div class="clouds">
                <img src="Assets/Css/Img/cloud1.png" style="--𝒾:1;">
                <img src="Assets/Css/Img/cloud2.png" style="--𝒾:2;">
                <img src="Assets/Css/Img/cloud3.png" style="--𝒾:3;">
                <img src="Assets/Css/Img/cloud4.png" style="--𝒾:4;">
                <img src="Assets/Css/Img/cloud5.png" style="--𝒾:5;">
                <img src="Assets/Css/Img/cloud1.png" style="--𝒾:10;">
                <img src="Assets/Css/Img/cloud2.png" style="--𝒾:9;">
                <img src="Assets/Css/Img/cloud3.png" style="--𝒾:8;">
                <img src="Assets/Css/Img/cloud4.png" style="--𝒾:7;">
                <img src="Assets/Css/Img/cloud5.png" style="--𝒾:6;">
            </div>
        </div>
        
        
        
        <script type="text/javascript">
            let text = document.getElementById('text');
            window.addEventListener('scroll', function(){
                let value = window.scrollY;
                text.style.marginBottom = value * 2 + 'px';
            })
        </script>
        <div class="toggle"></div>
        <div class="overlay"></div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?c=housecraft&a=viewLogin">Login</a></li>
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.toggle').click(function(){
                    $('.toggle').toggleClass('active')
                    $('.overlay').toggleClass('active')
                    $('.menu').toggleClass('active')
                })
            })
        </script>
