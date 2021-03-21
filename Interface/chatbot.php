<DOCTYPE html>
<html lang="en">

<?php
  echo '<link rel="stylesheet" href="stylishCB.css">';
?>

<head>

    <meta charset="UTF-8">
    <title>Chatbot</title>
    <h1> Chatbot</h1> 

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>

    <div class="wrapper">
        <div class="title">Chatbot</div>
        <div class="form">
            <div class="msg-header">
                <p>Hi, how may I be of service?</p>
            </div>
        </div>
        <div class="typing_space">
            <div class="input_data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send_btn">Send</button>
            </div>
        </div>

        <script>
            
            //Keyboard "Enter" button same fucntion as GUI "Send" button
            var input = document.getElementById("data");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById("send_btn").click();
                }
            });

            $(document).ready(function(){   //make function available after document is loaded
                $("#send_btn").on("click", function(){  //attach click event to the send_btn
                    $value = $("#data").val(); //get value from data
                    $msg = '<div class="msg_header"><p>'+ $value +'</p></div></div>';
                    $(".form").append($msg); //insert typed data after msg_header
                    $("#data").val(''); //remove typed data by user after sent
                    
                    //start ajax codes
                    $.ajax({
                        url: 'message.php', //retrieve data from message.php
                        type: 'POST', //submit data to be processed to a specified resource
                        data: 'text='+$value, //data send to the server when performing ajax request is 
                        success: function(result){ //call function 'result' when request succeed
                            $replay = '<div class="msg-header"><p>'+ result +'</p></div>';
                            $(".form").append($replay); //insert typed after msg_header
                        }
                    });    
                });
            });
        </script>
    </div> 

</body>
<html>