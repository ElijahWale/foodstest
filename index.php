<?php
session_start();

include_once "functions.php";

$errors = [];
if(isset($_POST['submit'])){
    
    $name = sanitize($_POST['name']);
    $Number = sanitize($_POST['number']);
    $Order = sanitize($_POST['order']);
    $additional_food = sanitize($_POST['additional_food']) ;
    $no_of_orders = sanitize($_POST['no_of_orders']);
    $date = sanitize($_POST['date']);
    $address = sanitize($_POST['address']);
    $message = sanitize($_POST['message']);


    if(empty($name)){
        $errors['name'] = "Name field is empty";
    }
    if(empty($Number)){
        $errors['Number'] = "Number is empty";
    }
    if(empty($Order)){
        $errors['Order'] = "order field is empty";
    }
    if(empty($additional_food)){
        $errors['additional_food'] = "additional food field is empty";
    }
    if(empty($no_of_orders)){
        $errors['no_of_orders'] = "number of order feede is empty";
    }
    if(empty($date)){
        $errors['date'] = "date field is empty";
    }
    if(empty($address)){
        $errors['address'] = "Address field is empty";
    }
    if(empty($message)){
        $errors['message'] = "message field is empty";
    }

    if(!empty($errors)){

        $to = "walexy730@gmail.com";
        $subject = "Order for Hephzibah Foods";
        $message = "Name of Customer: $name <br>";
        $message .= "Phone Number: $Number <br>";
        $message .= "Order: $Order <br>";
        $message .= "Additional Foods: $additional_food <br>";
        $message .= "no_of_orders: $no_of_orders <br>";
        $message .= "date and Time: $date <br>";
        $message .= "Address: $address <br>";
        $message .= "message: $message <br>";

        $email_sent = mail($to, $subject, $message);
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
                    <span>your name</span>
                    <input type="text" name="name" placeholder="enter your name">
                    <span class="red"><?= empty($errors) ? "" : $errors['name'] ?></span>
                </div>
                <div class="input">
                    <span>your number</span>
                    <input type="number" name="number" placeholder="enter your number">
                    <span class="red"><?= empty($errors) ? "" : $errors['Number'] ?></span>
                    
                </div>
                <div class="input">
                    <span>your order</span>
                    <input type="text" name="order" placeholder="enter food name">
                    <span class="red"><?= empty($errors) ? "" : $errors['Order'] ?></span>
                </div>
                <div class="input">
                    <span>Additional Food</span>
                    <input type="text" name="additional_food" placeholder="extra with food">
                    <span class="red"><?= empty($errors) ? "" : $errors['additional_food'] ?></span>
                </div>
                <div class="input">
                    <span>how much</span>
                    <input type="text" name="no_of_orders" placeholder="how many orders">
                    <span class="red"><?= empty($errors) ? "" : $errors['no_of_orders'] ?></span>
                </div>
                <div class="input">
                    <span>date and time</span>
                    <input type="datetime-local" name="date">
                    <span class="red"><?= empty($errors) ? "" :  $errors['date'] ?></span>
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>your address</span>
                    <textarea name="address" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
                    <span class="red"><?= empty($errors) ? "" :  $errors['address'] ?></span>
                </div>
                <div class="input">
                    <span>your message</span>
                    <textarea name="message" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
                    <span class="red"><?= empty($errors) ? "" : $errors['message'] ?></span>
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
    <div class="loader-container">
        <img src="assets/loader.gif" alt="">
    </div>







    <!-- js file for swiperjs -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <!-- custom js files -->
    <script src="js/script.js"></script>
</body>
</html>