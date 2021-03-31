<?php
  session_start();
  include('../config/database_connect.php');
  error_reporting(E_ALL ^ E_WARNING); 
  
  if(isset($_SESSION['Student_ID'])){
    $StudentID=$_SESSION['Student_ID'];
    //Retreive Data Base on the Student_ID
    $Query="SELECT * FROM student_personal_info WHERE Student_ID=$StudentID";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    $First_Name = $r['First_Name'];
    $Last_Name  = $r['Last_Name'];
  }else{
    header('Location:Register_page.php ');
  }

?>


<html>
  <head>
        <meta charset="UTF-8">
      
      <!-------- link for CSS   --------->
        <link rel="stylesheet" href="main.css">
      
      
      
      <!-------- link for SLIDES SHOW   --------->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
      
      
      <!-------- link for FOOTER   --------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      

      <!--- logo --->
      <div 
           class="logo">
      </div>
      
  </head>

  <body>
      
    <!-- Start Code for Slides --->
    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
            </div>

            <div class="swiper-slide">
            </div>

            <div class="swiper-slide">
            </div>

            <div class="swiper-slide">
            </div>

        </div>
        
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>


    </div>
      
      
      
<!---
After slideshow
info and buttons
--->
 
    <div class=back>
    <br> 
        <section class="container">
            <div class="left-half">
            <article>
                <h4>About Us</h4>
                <p class=info>
                    <div class = a>
                        At the University of Nottingham we are committed to the provision of an excellent educational experience in a campus environment led by academic staff who are themselves leading research that will address some of the major challenges confronting our global society.
                    </div>
                    <br>
                    <div class = a>
                        Consistently ranked in the top 100 Universities worldwide, we offer a range of study opportunities for students from foundation level courses through to doctoral degrees. A broad range of undergraduate and postgraduate programmes are available from different specialist schools and departments across the Faculties of Arts and Social Sciences, Engineering and Science. 
                    </div>
                    <br>
                    <div class = a>
                        The campus provides excellent teaching, learning and research facilities including a well equipped library, dedicated study areas and computer, language, and science and engineering laboratories. All of our students have access to a great range of leisure and well-being facilities including a purpose built sports complex and a superb swimming pool. 
                    </div>
                    <br>
                    <div class = a>
                        We host a community of around 5000 students from over 85 different countries worldwide who work with and receive a world-class higher education experience from leading academics in their field.
                    </div>
                    <br>
                
            </article>
            </div>
            
          <div class="right-half">
            <article>
              <!--<h9>Right Half</h9> -->
                <br>
                <div class  = "welcome_word">
                    Welcome <?php echo $Last_Name;?> <?php echo $First_Name; ?><br>
                    How can we assist you ?
                </div>
                <br>
                
                <div class = "menu_button">
                    
                    <button type="button" class = "newbutton" onclick = "window.location.href='chatbot.php'">
                        Chat with us 
                    </button>
                    
                    <a href="../src/Insert_Queue.php">
                    <button type="button" class = "newbutton">
                        See a counsellor
                    </button> 
                    </a>
                    
                    <button type="button" class = "newbutton" target="_blank" onclick = "window.open('https://www.nottingham.edu.my/index.aspx','_blank')" >
                        Visit Official Website 
                    </button>
                </div>
                <br>
            </article>
          </div>
    </section>
        <br>
    </div>
      
     
<!---- Start Footer ------>
      
  <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h7>Address </h7>
                        <p class="lead mb-0">
                            University of Nottingham Malaysia <br>
                            Jalan Broga, 43500 Semenyih <br>
                            Selangor Darul Ehsan <br>
                            Malaysia <br>
                        </p>
                       
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h7>About</h7>
                        <ul>
                            <li class="lead mb-0"><a href="https://www.nottingham.edu.my/index.aspx">Visit Our Official Website <br><br></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h7>Contact Us</h7>
                        <p class="lead mb-0">
                            telephone: +6 (03) 8924 8000 <br>
                            fax: +6 (03) 8924 8001 <br> 
                        </p>
                    </div>
                    <div class="col-lg-3 item social">
                        <a href="https://www.facebook.com/UoNMalaysia"><i class="icon ion-social-facebook"></i>
                        </a>
                        <a href="https://twitter.com/UoNMalaysia"><i class="icon ion-social-twitter"></i>
                        </a>
                        <a href="#"><i class="icon ion-social-youtube"></i>
                        </a>
                        <ul>
                            <li class="copyright"><a href="https://www.nottingham.edu.my/Utilities/Copyright.aspx">Copyright  </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
      
      
<!---- End Footer ------>
      
      
      
      
<!--- 
      
javascript for slideshow 

--->
      <script
                src="https://unpkg.com/swiper/swiper-bundle.js">
      </script>
    
      <script 
                src="https://unpkg.com/swiper/swiper-bundle.min.js">
      </script>
      
      <script>
        var swiper = new Swiper('.swiper-container', {
        // Optional parameters
          loop: false,

        // If we need pagination
          pagination: {
            el: '.swiper-pagination',
          },

        //
         autoplay: {
           delay: 2500,
         },
          
        // Navigation arrows
         /*
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          */

        });
          
     </script>
      
      
<!--- 
      
javascript for footer 

--->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
      </script>
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js">
      </script>
      
      
      
      
  </body>
    
</html>


