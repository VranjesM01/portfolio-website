<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'momcilo') or die('connection failed!');


if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name ='$name' AND email='$email' AND number='$number' AND message = '$msg'") or die('query failed');

    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'message sent already';
    } else {
        mysqli_query($conn, "INSERT INTO `contact_form`(name,email,number,message) VALUES ('$name','$email', '$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Momčilo Vranješ</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- aos css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="images/favico.png">

</head>

<body>


    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '
      <div class="message" data-aos="zoom-out">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
        }
    }

    ?>
    <!-- header section starts -->

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#home" class="logo">Momčilo</a>

        <nav class="navbar">
            <a href="#home" class="active">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#portfolio">portfolio</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="follow">
            <a href="https://www.facebook.com/momcilo.m.vranjes/" target="_blank" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/SkiM2222" target="_blank" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/vranjess.m/?hl=sr" target="_blank" class="fab fa-instagram"></a>
            <a href="https://www.linkedin.com" class="fab fa-linkedin" target="_blank"></a>
            <a href="https://github.com/VranjesM01" target="_blank" class="fab fa-github"></a>
        </div>

    </header>

    <!-- header section ends-->
    <!-- hello user starts-->
    <section>
        <div class="content ">
            <h1> Welcome <?php echo $_SESSION['username']; ?></h1>

        </div>

    </section>
    <!-- hello user ends-->
    <!-- home section statrts-->
    <section class="home" id="home">
        <div class="image" data-aos="fade-right">
            <img src="images/maturska.jpg" alt="">
        </div>

        <div class="content">
            <h3 data-aos="fade-up">Hello, My name is Momčilo Vranješ</h3>
            <span data-aos="fade-up">web designer & developer</span>
            <p data-aos="fade-up">I am a junior web developer, learning web-programming languages: JavaScript, PHP, SQL, and object-oriented languages: Java, Python, C#.</p>
            <a data-aos="fade-up" href="#about" class="btn">about me</a>
        </div>
    </section>
    <!-- home section ends-->

    <!-- about section starts-->

    <section class="about" id="about">
        <h1 class="heading" data-aos="fade-up"><span>biography</span></h1>
        <div class="biography">
            <p data-aos="fade-up">I was born in 2001. in Novi Sad, Serbia. I am final year of studies.</p>

            <div class="bio">
                <h3 data-aos="zoom-in"><span>name : </span> momčilo varnješ </h3>
                <h3 data-aos="zoom-in"><span>email : </span> petefi.momcilovranjes@gmail.com </h3>
                <h3 data-aos="zoom-in"> <span>address : </span> novi sad, serbia </h3>
                <h3 data-aos="zoom-in"><span>phone : </span> +381 63 12344 42 </h3>
                <h3 data-aos="zoom-in"><span>age : </span> 21 </h3>
                <h3 data-aos="zoom-in"><span>education : </span> highschool, applied informatics study</h3>
            </div>

            <a href="CV.docx" class="btn" data-aos="fade-up">download CV</a>

        </div>

        <div class="skills" data-aos="fade-up">

            <h1 class="heading"> <span>skills</span></h1>

            <div class="progress">
                <div class="bar" data-aos="fade-left">
                    <h3><span>HTML</span><span>95%</span></h3>
                </div>
                <div class="bar" data-aos="fade-right">
                    <h3><span>CSS</span><span>80%</span></h3>
                </div>
                <div class="bar" data-aos="fade-left">
                    <h3><span>JavaScript</span><span>65%</span></h3>
                </div>
                <div class="bar" data-aos="fade-right">
                    <h3><span>PHP</span><span>80%</span></h3>
                </div>
            </div>

            <div class="edu-exp">
                <h1 class="heading" data-aos="fade-up"><span>education & experience</span></h1>

                <div class="row">

                    <div class="box-container">
                        <h3 class="title" data-aos="fade-right">education</h3>

                        <div class="box" data-aos="fade-right">
                            <span>(2016-2020)</span>
                            <h3>Electrotechincal highschool "Mihajlo Pupin"</h3>
                            <p>Profile: Multimedia electrical technician
                                I have learned about web design, web programming, photo and video editing...
                            </p>
                        </div>

                        <div class="box" data-aos="fade-right">
                            <span>(2020-PRESENT)</span>
                            <h3>Novi Sad school of business </h3>
                            <p>Course: Applied informatics
                                I have learned about object-oriented programming, Java, Python, web programming(HTML,CSS,PHP,JavaScript), work with databases(MySQL)...
                            </p>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </section>
    <!-- about section ends-->

    <!-- services section starts-->
    <section class="services" id="services">

        <h1 class="heading" data-aos="fade-up"> <span>services</span> </h1>

        <div class="box-container">

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-code"></i>
                <h3>web development</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-paint-brush"></i>
                <h3>graphic design</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fab fa-bootstrap"></i>
                <h3>bootstrap</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-chart-line"></i>
                <h3>seo marketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-bullhorn"></i>
                <h3>digital marketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fab fa-wordpress"></i>
                <h3>wordpress</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
            </div>

        </div>

    </section>
    <!-- services section ends-->

    <!-- portfolio section starts-->
    <section class="portfolio" id="portfolio">

        <h1 class="heading" data-aos="fade-up"> <span>portfolio</span> </h1>

        <div class="box-container">

            <div class="box" data-aos="zoom-in">
                <img src="images/webdev.png" alt="">
                <h3>web development</h3>
                <span>( 2019 - PRESENT )</span>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="images/oop.jpg" alt="">
                <h3>object-oriented programming</h3>
                <span>( 2020 - PRESENT)</span>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="images/ps.jpg" alt="">
                <h3>photo editing</h3>
                <span>( 2016 - 2020 )</span>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="images/pr.jpg" alt="">
                <h3>video editing</h3>
                <span>( 2016 - 2020 )</span>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="images/bs.png" alt="">
                <h3>bootstrap</h3>
                <span>( 2019 - PRESENT )</span>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="images/wp.png" alt="">
                <h3>wordpress</h3>
                <span>( 2022 - PRESENT )</span>
            </div>

        </div>

    </section>
    <!--portfolio section ends-->

    <!--contact section starts-->
    <section class="contact" id="contact">

        <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

        <form action="" method="post">
            <div class="flex">
                <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
                <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
            </div>
            <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
            <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
            <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
        </form>

        <div class="box-container">

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-phone"></i>
                <h3>phone</h3>
                <p>+381 63 12344 42</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-envelope"></i>
                <h3>email</h3>
                <p>petefi.momcilovranjes@gmail.com</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-map-marker-alt"></i>
                <h3>address</h3>
                <p>novi sad, serbia - 21000</p>
            </div>

        </div>

    </section>


    <!--contact section ends-->

    <!-- login section starts-->

    <!-- <section class="contact" id="contact">

        <h1 class="heading" data-aos="fade-up"> <span>LogIn</span> </h1>

        <form action="" method="post">
            <div class="flex">
                <input data-aos="fade-right" type="email" name="username" placeholder="enter your username" class="box" required>
                <input data-aos="fade-left" type="password" name="password" placeholder="enter your password" class="box" required>
            </div>

            <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
        </form>
    </section> -->
    <section class="contact" id="contact">

        <h1 class="heading" data-aos="fade-up"> <span>LogIn</span> </h1>
        <div class="flex">
            <a id="login-button" ms-hide-element="true" href="login.php" class="btn" data-aos="fade-left">Log In</a>
        </div>
    </section>

    <section class="contact" id="contact">

        <h1 class="heading" data-aos="fade-up"> <span>Register</span> </h1>
        <div class="flex">
            <a id="login-button" ms-hide-element="true" href="sign.php" class="btn" data-aos="fade-up">Register</a>
        </div>
    </section>

    <section class="contact" id="contact">

        <h1 class="heading" data-aos="fade-up"><span>LogOut</span></h1>
        <div class="flex">
            <a id="logout-button" ms-hide-element="true" href="logout.php" class="btn" data-aos="fade-right">Log Out</a>
        </div>
    </section>

    <!-- login section ends-->

    <div class="credit"> &copy; copyright <?php echo date('Y'); ?> by <span>MomčiloVranješ</span> </div>

    <!-- custom js file link  -->
    <script src="script.js"></script>

    <!-- aos js link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        AOS.init({
            duration: 800,
            delay: 300
        });
    </script>
</body>

</html>