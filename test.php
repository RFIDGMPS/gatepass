<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chatbot {
            display: none;
        }
        .chatbot-toggler {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #FBC257;
            border: none;
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
            cursor: pointer;
        }
    </style>
</head>
<body>

<button class="chatbot-toggler">
    <i class="fa fa-exclamation-triangle"></i>
    <i class="fa fa-times"></i>
</button>

<div class="chatbot">
    <header style="background:#FBC257;">
        <h2>Lost Card</h2>
        <span class="close-btn material-symbols-outlined"><i class="fa fa-times" aria-hidden="true"></i></span>
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

                        <!-- Dropdown for Live Search Results -->
                        <select id="searchResults" class="form-select mb-4" size="5" onchange="selectPersonell(this)">
                            <option value="">Select a name...</option>
                        </select>
                        
                        <button type="submit" name="send" id="login-button" class="alert alert-primary py-3 w-100 mb-4"><b>Send</b></button>
                    </form>
                    
                    <!-- Table to display selected personnel -->
                    <table id="selectedPersonelTable" class="table table-bordered mt-4" style="display:none;">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Department</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="selectedRow">
                                <td><img id="selectedPhoto" src="" width="50" height="50" alt="Photo"></td>
                                <td id="selectedDepartment"></td>
                                <td id="selectedName"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add JavaScript for Search Functionality -->
<script>
    document.querySelector('.chatbot-toggler').addEventListener('click', function() {
        const chatbot = document.querySelector('.chatbot');
        chatbot.style.display = chatbot.style.display === 'none' || chatbot.style.display === '' ? 'block' : 'none';
    });

    function searchPersonell(query) {
        if (query.length === 0) {
            document.getElementById("searchResults").innerHTML = "<option value=''>Select a name...</option>";
            document.getElementById("selectedPersonelTable").style.display = 'none';
            return;
        }
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("searchResults").innerHTML = xhr.responseText;
                document.getElementById("selectedPersonelTable").style.display = 'none';
            }
        };
        xhr.open("GET", "search_personnel.php?q=" + encodeURIComponent(query), true);
        xhr.send();
    }

    function selectPersonell(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        if (selectedOption.value) {
            const department = selectedOption.getAttribute('data-department');
            const photo = selectedOption.getAttribute('data-photo');
            const name = selectedOption.value;

            document.getElementById("selectedDepartment").textContent = department;
            document.getElementById("selectedName").textContent = name;
            document.getElementById("selectedPhoto").src = photo;
            document.getElementById("selectedPersonelTable").style.display = 'table';
        } else {
            document.getElementById("selectedPersonelTable").style.display = 'none';
        }
    }
</script>

</body>
</html>
