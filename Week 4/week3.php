<?php
require("week4Functions.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <script src="./jquery/jquery-3.6.0.min.js"></script>
		<link rel="stylesheet" href="./foundation/css/foundation.css">

        <style>
            .cell{
                border: 1px solid black;
            }
            #sidebar{
                padding: 10px;
                background-color: lightyellow;
            }
            #body {
                padding:10px;
            }
            .nav{
                margin:10px;
            }
            #full-page{
                margin:10px;
            }
            #design{
                margin-top: 20px;
                margin-right: 10px;
                float: right;
            }
            #copyright{
                margin-top: 20px;
                margin-left: 10px;
            }

            #header-img{
                height: 200px;
            }

            #body{
                height: 440px;
            }
        </style>

        <script>
            $(document).ready(function() {
                $("#alert").on("click", showAlert);
                $("#update").on("click", updateBody);

                function showAlert(){
                    alert("Pretty sunset, right?");

                }

                function updateBody(){
                    $("#body").html("Hawaii has the prettiest sunsets!");

                }
        });
        </script>

    </head>


    <body>
        <div id=full-page> 
            <div class= grid-x>
                <div id=header class = "cell small-12 medium-12 large-12 text-right">
                    <button id=alert class = "button nav">Alert</button>
                    <button id=update class = "button nav">Update Body</button>
                </div>
            </div>
            <div> <img id=header-img class="cell small-12 medium-12 large-12" src=sunset.jpg></div>
            <div class= grid-x>
                <div id=sidebar class ="cell small-12 medium-4 large-4">
                    Lorem Ipsum is simply dummy text of the printing and typesetting 
                    industry. Lorem Ipsum has been the industry's standard dummy text 
                    ever since the 1500s, when an unknown printer took a galley of type 
                    and scrambled it to make a type specimen book. It has survived not 
                    only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with 
                    the release of Letraset sheets containing Lorem Ipsum passages, and more 
                    recently with desktop publishing software like Aldus PageMaker including 
                    versions of Lorem Ipsum.
                </div>

                <div id=body class = "cell small-12 medium-8 medium-8">Pink sunsets are often called Alpenglows!
                    <?php
                        PrintDateAndTime();
                    ?>
                </div>
                

            </div>

            <div class= grid-x>
                <div id=footer class = "cell small-12 medium-12 large-12">
                        <p id=design>Designed by Morgan Warren<p>    
                        <p id=copyright>&copy; 2022 Morgan Warren, All Rights Reserved<p></p>
                    
                </div>
            </div>
        </div> 
    </body>

</html>