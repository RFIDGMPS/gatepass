<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
    <!-- You may add your CSS links here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add any additional custom styles here */
        .chatbot {
            display: none; /* Hide initially, toggle with JavaScript */
        }
    </style>
</head>
<body>

<button class="chatbot-toggler" style="background:#FBC257;" onclick="toggleChatbot()">
    <span class="material-symbols-rounded"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
    <span class="material-symbols-outlined"><i class="fa fa-times" aria-hidden="true"></i></span>
</button>

<div class="chatbot">
    <header style="background:#FBC257;">
        <h2>Lost Card</h2>
        <span class="close-btn material-symbols-outlined" onclick="toggleChatbot()"><i class="fa fa-times" aria-hidden="true"></i></span>
    </header>
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12">
                <div class="rounded p-4">
                    <form role="form" id="logform" method="POST">
                        <div class="">
                            <center><span id="myalert2"></span></center>
                        </div>
                        <div id="myalert" style="display:none;">
                            <div class="">
                                <center><span id="alerttext"></span></center>
                            </div>
                        </div>
                        <div id="myalert3" style="display:none;">
                            <div class="">
                                <div class="alert alert-success" id="alerttext3"></div>
                            </div>
                        </div>
                        
                        <!-- Search Box -->
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="searchBox" name="pname" placeholder="Search Name" autocomplete="off" onkeyup="searchPersonell(this.value)">
                            <label for="searchBox">Search Name</label>
                        </div>

                        <!-- Live Search Results -->
                        <div id="searchResults"></div>
                        
                        <button type="submit" name="send" id="login-button" class="alert alert-primary py-3 w-100 mb-4"><b>Send</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-input" hidden>
        <textarea placeholder="Enter a message..." spellcheck="false" hidden></textarea>
        <span id="send-btn" class="material-symbols-rounded" hidden>send</span>
    </div>
</div>

<!-- Add JavaScript for Search Functionality -->
<script>
    function searchPersonell(query) {
        if (query.length === 0) {
            document.getElementById("searchResults").innerHTML = "";
            return;
        }
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("searchResults").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "search_personnel.php?q=" + encodeURIComponent(query), true);
        xhr.send();
    }

    function toggleChatbot() {
        const chatbot = document.querySelector('.chatbot');
        chatbot.style.display = chatbot.style.display === 'none' || chatbot.style.display === '' ? 'block' : 'none';
    }
</script>

</body>
</html>
