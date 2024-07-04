
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/grow_up.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="assets/img/brand/favicon-bar.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>RFID ATTENDANCE</title>

        <style type="text/css">
 
    </style>
</head>

<body onload="startTime()">

        <nav class="navbar navbar-expand-lg navbar-light py-2" style="height: 1%;border-bottom: 1px solid #FBC257;margin-bottom: 5%;padding: 15px!important;">

        <div class="container">
               <a class="navbar-brand" href="index">
                <img src="assets/img/nav_brand/logo.png" alt="brand" style="height: 90px" id="imgs">
                <span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                   
                    </li>
                        <li class="nav-item" style="border: 1px solid #ffc107;;background-color:#ffc107;border-radius: 7% ;max-width: 100px!important;margin-right: 2%">
                     <a class="nav-link" href="attendance">&nbsp;&nbsp;&nbsp;&nbsp;<font color=" #FFF">VISITOR</font></a>

                    </li>
                      <li class="nav-item" style="border: 1px solid #ffc107;;background-color:#e35c30;border-radius: 7% ;max-width: 100px!important;">
                     <a class="nav-link" href="employee-login">&nbsp;&nbsp;&nbsp;&nbsp;<font color=" #FFF">REPORT</font></a>

                    </li>
    
                </ul>

            </div>
        </div>
    </nav>

    <!-- Section -->
    <section class="hero" style="margin-top: 0%">
        <div class="container">
                <center>
                    <div id="clockdate" style="border: 1px solid #f5af5b;background-color: #f5af5b">
                        <div class="clockdate-wrapper">
                            <div id="clock" style="font-weight: bold; color: #fff;font-size: 60px"></div>
                            <div id="date" style="color: #fff"><i class="fas fa-calendar"></i> June 27, 2024</div>
                        </div>
                    </div>
                </center><br><Br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                         <p class="card-text">
                          <div id="mgs-add"></div>
                         <input type="text" class="form-control" name="" id="rfidcard">
                       
                          <center><img class="w-100" height="170px" alt="img"  src="assets/img/section//istockphoto-1184670010-612x612.jpg" id="img"></center>
                    
                          <div class="card-body">
                             <p id="fname"></p>
                             <p id="lname"></p>
                          </div>
                        
                      </p>      
                      </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-warning" role="alert">
                        Just tap the rfid card on the RFID Reader for it to time in and time out.
                     </div>
                       <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Photo</th>
                          <th scope="col">Employee ID</th>
                          <th scope="col">Time In</th>
                          <th scope="col">Time Out</th>
                          <th scope="col">Date logged</th>
                        </tr>
                      </thead>
                      <tbody>
                          	 


                        <tr>
                          <td><center><img src="../uploads/download.jpg" width="50px" height="50px" ></center></td>
                          <td>LANCE ALARILLA</td>
                         <td>8:41 am</td>
                          <td>
                             8:41 am</td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/download.jpg" width="50px" height="50px" ></center></td>
                          <td>LANCE ALARILLA</td>
                         <td>8:42 am</td>
                          <td>
                             8:42 am</td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/download.jpg" width="50px" height="50px" ></center></td>
                          <td>LANCE ALARILLA</td>
                         <td>2:34 pm</td>
                          <td>
                             </td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px" ></center></td>
                          <td>ARIANE CALVADORES</td>
                         <td>5:42 pm</td>
                          <td>
                             5:43 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px" ></center></td>
                          <td>ARIANE CALVADORES</td>
                         <td>5:43 pm</td>
                          <td>
                             6:10 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px" ></center></td>
                          <td>ARIANE CALVADORES</td>
                         <td>6:11 pm</td>
                          <td>
                             </td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px" ></center></td>
                          <td>ARIANE CALVADORES</td>
                         <td>3:23 pm</td>
                          <td>
                             </td>

                          <td>Mar 17, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px" ></center></td>
                          <td>APRIL JOHN</td>
                         <td>5:34 pm</td>
                          <td>
                             5:42 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px" ></center></td>
                          <td>APRIL JOHN</td>
                         <td>5:42 pm</td>
                          <td>
                             5:43 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px" ></center></td>
                          <td>APRIL JOHN</td>
                         <td>5:43 pm</td>
                          <td>
                             5:44 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px" ></center></td>
                          <td>APRIL JOHN</td>
                         <td>5:44 pm</td>
                          <td>
                             5:44 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px" ></center></td>
                          <td>APRIL JOHN</td>
                         <td>6:09 pm</td>
                          <td>
                             </td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px" ></center></td>
                          <td>APRIL JOHN</td>
                         <td>3:03 pm</td>
                          <td>
                             </td>

                          <td>Mar 17, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>6:07 am</td>
                          <td>
                             6:07 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>12:04 pm</td>
                          <td>
                             12:04 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>12:05 pm</td>
                          <td>
                             12:07 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>12:09 pm</td>
                          <td>
                             12:09 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>12:54 pm</td>
                          <td>
                             12:54 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>5:42 pm</td>
                          <td>
                             5:42 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>6:08 pm</td>
                          <td>
                             6:09 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>11:13 pm</td>
                          <td>
                             11:13 pm</td>

                          <td>Mar 17, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>11:15 pm</td>
                          <td>
                             11:20 pm</td>

                          <td>Mar 17, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>11:20 pm</td>
                          <td>
                             </td>

                          <td>Mar 17, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>4:06 am</td>
                          <td>
                             4:06 am</td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>4:09 am</td>
                          <td>
                             4:09 am</td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>5:56 am</td>
                          <td>
                             5:57 am</td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px" ></center></td>
                          <td>Lester Bailon</td>
                         <td>5:57 am</td>
                          <td>
                             </td>

                          <td>Mar 18, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>4:59 am</td>
                          <td>
                             4:59 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:03 am</td>
                          <td>
                             5:03 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:15 am</td>
                          <td>
                             5:15 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:16 am</td>
                          <td>
                             5:16 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:46 am</td>
                          <td>
                             5:46 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>6:07 am</td>
                          <td>
                             6:07 am</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>12:01 pm</td>
                          <td>
                             12:05 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>12:06 pm</td>
                          <td>
                             12:06 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>12:08 pm</td>
                          <td>
                             12:09 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>12:54 pm</td>
                          <td>
                             12:54 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>12:55 pm</td>
                          <td>
                             12:55 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>4:11 pm</td>
                          <td>
                             4:11 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:25 pm</td>
                          <td>
                             5:25 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:25 pm</td>
                          <td>
                             5:25 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:25 pm</td>
                          <td>
                             5:25 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:42 pm</td>
                          <td>
                             6:09 pm</td>

                          <td>Mar 16, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>3:04 pm</td>
                          <td>
                             3:26 pm</td>

                          <td>Mar 17, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:39 pm</td>
                          <td>
                             5:39 pm</td>

                          <td>Feb 06, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:40 pm</td>
                          <td>
                             5:40 pm</td>

                          <td>Feb 06, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:43 pm</td>
                          <td>
                             5:44 pm</td>

                          <td>Feb 06, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:45 pm</td>
                          <td>
                             5:45 pm</td>

                          <td>Feb 06, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>5:45 pm</td>
                          <td>
                             5:45 pm</td>

                          <td>Feb 06, 2024</td>
                        </tr>
                                                 <tr>
                          <td><center><img src="" width="50px" height="50px" ></center></td>
                          <td></td>
                         <td>2:26 am</td>
                          <td>
                             2:26 am</td>

                          <td>Sep 15, 2023</td>
                        </tr>
                                               </tbody>
                    </table>
                  </div>
              </div>
            </div>
        </div>
    </section>
  <!-- end Section -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <script src="assets/custom/js/scan_rfid.js"></script>
        <script src="script.js"></script>
    <script>
        AOS.init();
    </script>
 <script type="text/javascript">
    // Disable right-click
    document.addEventListener('contextmenu', (e) => e.preventDefault());

    function ctrlShiftKey(e, keyCode) {
      return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
    }

    document.onkeydown = (e) => {
      // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
      if (
        event.keyCode === 123 ||
        ctrlShiftKey(e, 'I') ||
        ctrlShiftKey(e, 'J') ||
        ctrlShiftKey(e, 'C') ||
        (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
      )
        return false;
    };
  </script>
  <script>
      $('body').keydown(function(e) {
        if(e.which==123){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 73){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 75){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 67){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 74){
            e.preventDefault();
        }
    });
!function() {
        function detectDevTool(allow) {
            if(isNaN(+allow)) allow = 100;
            var start = +new Date();
            debugger;
            var end = +new Date();
            if(isNaN(start) || isNaN(end) || end - start > allow) {
                console.log('DEVTOOLS detected '+allow);
            }
        }
        if(window.attachEvent) {
            if (document.readyState === "complete" || document.readyState === "interactive") {
                detectDevTool();
              window.attachEvent('onresize', detectDevTool);
              window.attachEvent('onmousemove', detectDevTool);
              window.attachEvent('onfocus', detectDevTool);
              window.attachEvent('onblur', detectDevTool);
            } else {
                setTimeout(argument.callee, 0);
            }
        } else {
            window.addEventListener('load', detectDevTool);
            window.addEventListener('resize', detectDevTool);
            window.addEventListener('mousemove', detectDevTool);
            window.addEventListener('focus', detectDevTool);
            window.addEventListener('blur', detectDevTool);
        }
    }();
  </script>

</body>

</html>