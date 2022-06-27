<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


include_once "functions.php";

$errors = ['name' => '', 'Number' => '', 'Order' => '', 'additional_food' => '', 'no_of_orders' => '', 'date' => '', 'address' => '', 'message' => ''];
if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $errors['name'] = 'Name field is empty';
    }else{
        $name = sanitize($_POST['name']);
    }
    if(empty($_POST['number'])){
        $errors['Number'] = 'Number is empty';
    }else{
         $Number = sanitize($_POST['number']);
    }
    if(empty($_POST['order'])){
        $errors['Order'] = 'order field is empty';
    }else{
         $Order = sanitize($_POST['order']);
    }
    if(empty($_POST['additional_food'])){
        $errors['additional_food'] = 'additional food field is empty';
    }else{
        $additional_food = sanitize($_POST['additional_food']);
    }
    if(empty($_POST['no_of_orders'])){
        $errors['no_of_orders'] = 'number of order feeds is empty';
    }else{
        $no_of_orders = sanitize($_POST['no_of_orders']);
    }
    if(empty($_POST['date'])){
        $errors['date'] = 'date field is empty';
    }else{
        $date = sanitize($_POST['date']);
    }
    if(empty($_POST['address'])){
        $errors['address'] = 'Address field is empty';
    }else{
        $address = sanitize($_POST['address']);
    }
    if(empty($_POST['message'])){
        $errors['message'] = 'message field is empty';
    }else{
        $body = sanitize($_POST['message']);
    }

    if(!array_filter($errors)){
        //Create an instance; passing `true` enables exceptions
//         $body = "<p> Phone Number: $Number <br>Order: $Order <br>Additional Foods: $additional_food <br>no_of_orders: $no_of_orders <br> date and Time: $date <br>Address: $address <br>message: $message <br></p>";
        
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = 2;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host      = 'smtp.mailgun.org';                     //Set the Yahoo SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'olawaleesan@ymail.com';                     //SMTP username
//     $mail->Password   = 'senater123';                           //SMTP password
//     $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
//     $mail->SMTPOptions = array(
//         'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//         )
//         );
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
//     $mail->setFrom('olawaleesan@ymail.com', '$name');
//     $mail->addAddress('elijahwalecodes@gmail.com', 'Olawale Esan');     //Add a recipient
//                //Name is optional
//     $mail->addReplyTo('walexy730@gmail.com', 'Information');

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Order from Hephzibah Page';
//     $mail->Body    = "$body";
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     $_SESSION['success'] = 'Message has been sent';
// } catch (Exception $e) {
//     $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
        $to = "walexy730@gmail.com";
        $subject = "Order for Hephzibah Foods";
        $message = "
        <html>
        <head>
        <title>Order Hephzibah FOods</title>
        </head>
        <body>
        <h1>Name of Customer: $name</h1>
        <p>Phone Number: $Number</p>
        <p>$Number</p>
        <p>$Number</p>
        <p>Order: $Order</p>
        <p>Additional Foods: $additional_food</p>
        <p>no_of_orders: $no_of_orders</p>
        <p>date and Time: $date</p>
        <p>Address: $address</p>
        <p>message: $body</p>
        </body>
        </html>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $email_sent = mail($to, $subject, $message, $headers);
        if($email_sent == true){
            $_SESSION['success'] = "message sent successfully";
        }else{
            $_SESSION['error'] = "message could not be sent";
        }
    }
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hephzibah Foods</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- header section -->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>Hephzibah</a>
        <nav class="navbar">
            <a href="#home" class="active">home</a>
            <a href="#dishes">dishes</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#order">order</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <!-- <i class="fas fa-moon" id="theme-toggler"></i> -->
            <i class="fas fa-search" id="search-icon"></i>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
        </div>
    </header>

    <!-- search form -->
    <form action="" id="search-form">
        <input type="search" placeholder="Search here.." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>

    <!-- home section  -->
    <section class="home" id="home">

        <div class="swiper home-slider">
    
            <div class="swiper-wrapper wrapper">
    
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special dish</span>
                        <h3>spicy noodles</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="assets/home-img-1.png" alt="">
                    </div>
                </div>
    
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special dish</span>
                        <h3>fried chicken</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="assets/home-img-2.png" alt="">
                    </div>
                </div>
    
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special dish</span>
                        <h3>hot pizza</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="assets/home-img-3.png" alt="">
                    </div>
                </div>
    
            </div>
    
            <div class="swiper-pagination"></div>
    
        </div>
    
    </section>

    <!-- dishes section -->
    <section class="dishes" id="dishes">
        <h3 class="sub-heading">our dishes</h3>
        <h1 class="heading">popular dishes</h1>

        <div class="box-container">
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="assets/dish-1.png" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="assets/dish-2.png" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="assets/dish-3.png" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="assets/dish-4.png" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="assets/dish-5.png" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="assets/dish-6.png" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>
    </section>

    <!-- about section -->
    <section class="about" id="about">
        <h3 class="sub-heading">about us</h3>
        <h1 class="heading">why choose us?</h1>
        <div class="row">
            <div class="image">
                <img src="assets/about-img.png" alt="">
            </div>
            <div class="content">
                <h3>best food in the country</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, quia! Nostrum alias corporis cum nihil numquam quisquam autem reiciendis officiis. Provident cumque dolor et saepe? Nulla sequi laudantium magni aliquam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quibusdam dolorum commodi nulla necessitatibus consectetur ipsa quos, dignissimos esse pariatur corporis eaque, ipsam sequi consequatur rem ullam iste culpa officia!</p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payments</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24/7 service</span>
                    </div>
                </div>
                <a href="" class="btn">learn more</a>
            </div>
        </div>
    </section>

    <!-- menu section -->
    <section class="menu" id="menu">
        <h3 class="sub-heading">our menu</h3>
        <h1 class="heading">today's speciality</h1>

        <div class="box-container">
             <div class="box">
                <div class="image">
                     <img src="assets/menu-1.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-2.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-3.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-4.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-5.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-6.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-7.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-8.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
             <div class="box">
                <div class="image">
                     <img src="assets/menu-9.jpg" alt="">
                     <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nobis blanditiis distinctio in, sed optio. </p>
                    <a href="" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
        </div>
    </section>

    <!-- review section -->
    <section class="review" id="review">
        <h3 class="sub-heading">our menu</h3>
        <h1 class="heading">today's speciality</h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="assets/pic-1.png" alt="">
                        <div class="user-info">
                            <h3>john doe</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet veritatis officiis ipsa molestias! Adipisci necessitatibus fugiat laborum deserunt quo incidunt eos, quas laboriosam quos maxime. </p>
                </div>
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="assets/pic-2.png" alt="">
                        <div class="user-info">
                            <h3>john doe</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet veritatis officiis ipsa molestias! Adipisci necessitatibus fugiat laborum deserunt quo incidunt eos, quas laboriosam quos maxime. </p>
                </div>
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="assets/pic-3.png" alt="">
                        <div class="user-info">
                            <h3>john doe</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet veritatis officiis ipsa molestias! Adipisci necessitatibus fugiat laborum deserunt quo incidunt eos, quas laboriosam quos maxime. </p>
                </div>
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="assets/pic-4.png" alt="">
                        <div class="user-info">
                            <h3>john doe</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet veritatis officiis ipsa molestias! Adipisci necessitatibus fugiat laborum deserunt quo incidunt eos, quas laboriosam quos maxime. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="order" id="order">
        <?php
    print_error();
    print_success();

        ?>
        <h3 class="sub-heading">order now</h3>
        <h1 class="heading">free and fast</h1>
        <form action="" method="POST">
            <div class="inputBox">
                <div class="input">
                    <label for="name">your name</label>
                    <input type="text" name="name" placeholder="enter your name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
                    <span class="red"><?= $errors['name'] ?></span>
                </div>
                <div class="input">
                    <label for="number">your number</label>
                    <input type="number" name="number" placeholder="enter your number" value="<?php if(isset($_POST['number'])) echo $_POST['number']; ?>">
                    <span class="red"><?= $errors['Number'] ?></span>
                    
                </div>
                <div class="input">
                    <label for="order">your order</label>
                    <input type="text" name="order" placeholder="enter food name" value="<?php if(isset($_POST['order'])) echo $_POST['order']; ?>"">
                    <span class="red"><?= $errors['Order'] ?></span>
                </div>
                <div class="input">
                    <label for="additional">Additional Food</label>
                    <input type="text" name="additional_food" placeholder="extra with food" value="<?php if(isset($_POST['additional_food'])) echo $_POST['additional_food']; ?>">
                    <span class="red"><?= $errors['additional_food'] ?></span>
                </div>
                <div class="input">
                    <label for="quantity">how much</label>
                    <input type="text" name="no_of_orders" placeholder="how many orders" value="<?php if(isset($_POST['no_of_orders'])) echo $_POST['no_of_orders']; ?>">
                    <span class="red"><?= $errors['no_of_orders'] ?></span>
                </div>
                <div class="input">
                    <label for="date">date and time</label>
                    <input type="datetime-local" name="date" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>">
                    <span class="red"><?=  $errors['date'] ?></span>
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <label for="address">your address</label>
                    <textarea name="address" placeholder="enter your address" id="" cols="30" rows="10"><?php if(isset($_POST['address'])) echo $_POST['address']; ?></textarea>
                    <span class="red"><?=  $errors['address'] ?></span>
                </div>
                <div class="input">
                    <label for="message">your message</label>
                    <textarea name="message" placeholder="enter your message" id="" cols="30" rows="10"><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea>
                    <span class="red"><?= $errors['message'] ?></span>
                </div>
            </div>
                <input type="submit" name="submit" value="order now" class="btn">
            
        </form>
    </section>

    <!-- footer section -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>locations</h3>
                <a href="#">india</a>
                <a href="#">japan</a>
                <a href="#">russia</a>
                <a href="#">USA</a>
                <a href="#">france</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">sishes</a>
                <a href="#">about</a>
                <a href="#">menu</a>
                <a href="#">review</a>
                <a href="#">order</a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#">+234814556799</a>
                <a href="#">+2348067451201</a>
                <a href="#">walexy730@gmail.com</a>
                <a href="#">olawaleesan@ymail.com</a>
                <a href="#">kebbi, Nigeria</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                <a href="#">linkedln</a>
            </div>
        </div>
        <div class="credit">copyright @ 2021 by <span>Elijahwale</span></div>
    </section>

    <!-- loading part -->
    <!-- <div class="loader-container">
        <img src="assets/loader.gif" alt="">
    </div> -->







    <!-- js file for swiperjs -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <!-- custom js files -->
    <script src="js/script.js"></script>
</body>
</html>