<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'donotreply@kfbs.co.in';                 // SMTP username
    $mail->Password = 'L4>/35#PY8rKgPLf';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('donotreply@kfbs.co.in', 'kfbs.co.in');
if(isset($_REQUEST["submitBtn"])){
$name=$_REQUEST["inputName"];
$subject=$_REQUEST["inputSubject"];
$email=$_REQUEST["inputEmail"];
$content=$_REQUEST["inputContent"];
$mail->Subject = 'do-not reply';
$mail->ContentType = 'text/plain';
$mail->isHTML(false);
$mail->Body =  'Hello '.$name."!"."\n"."Thank you, for writing to us. This is a confirmation email that we have received your query and will get back to you soonest."."\n\n"."~~~~ Your Query ~~~~"."\n\n".$content."\n\n"."~~~~~~~~~~~~~~~~~~"."\n\n\n".'Sincerely'."\n"."Team Kfbs.co.in"
            ."\n\n\n\n\n"."****Please do not reply to this email as this email is sent from an unattended email address****";
// you may also use $mail->Body = file_get_contents('your_mail_template.html');

$mail->AddAddress ($email, $name);

// you may also use this format $mail->AddAddress ($recipient);

if(!$mail->Send())
{
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
    echo $error_message;
        header('Location: error.php');
} else
{
        $error_message = "Successfully sent!";
    $mailInside = new PHPMailer(true);
                             // Enable verbose debug output
    $mailInside->isSMTP();                                      // Set mailer to use SMTP
    $mailInside->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
    $mailInside->SMTPAuth = true;                               // Enable SMTP authentication
    $mailInside->Username = 'donotreply@kfbs.co.in';                 // SMTP username
    $mailInside->Password = 'L4>/35#PY8rKgPLf';                           // SMTP password
    $mailInside->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mailInside->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mailInside->setFrom('donotreply@kfbs.co.in', 'kfbs.co.in');
        $mailInside->Subject = 'New Query Received from the website: '.$subject;
    $mailInside->ContentType = 'text/plain';
    $mailInside->isHTML(false);
    $mailInside->Body = 'You have a new Query!!'."\n\n"."Person Name : ".$name."\n\n"."Email id mentioned as: ".$email."\n\n"."Query is : ".$content;

    $mailInside->AddAddress ('info@kfbs.co.in');
    if(!$mailInside->Send()){
        $error_message = "Mailer Error: " . $mailInside->ErrorInfo;
        echo $error_message;
        echo '<script language="javascript">';
        echo 'alert("Sorry !! Something went wrong please try letter")';
        echo '</script>';

    }
    else{
      $error_message = "Successfully sent!";
      echo '<script language="javascript">';
      echo 'alert("message successfully sent")';
      echo '</script>';
    }

}

} 
else{
  ?><!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Krishna Financial & Bookeeping Services</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
      <meta name="theme-color" content="#003366" />
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
      <!-- CUSTOM STYLE -->
      <!--  https://mfglabs.github.io/mfglabs-iconset/ -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/template-scripts.js"></script>

      <!-- seo-->
      <meta name="robots" content="noindex" />


      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120789154-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120789154-1');
</script>

   </head>
   <body class="size-1140">
      <header>
         <div id="topbar">
            <div class="line">
               <div class="s-12 m-6 l-6">
                  <p>Krishna Financial & Bookeeping Services|Phone: <strong>(+91) 9034950501</strong> | Email Us: <strong>info@kfbs.co.in</strong></p>
               </div>
               <div class="s-12 m-6 l-6">
                  <div class="social right">
                     <a><i class="icon-facebook_circle"></i></a> <a><i class="icon-twitter_circle"></i></a> <a><i class="icon-google_plus_circle"></i></a> <a><i class="icon-instagram_circle"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <nav>
            <div class="line">
               <div class="s-12 l-2">
                  <p class="logo"><i class="icon-xing"></i><strong>KFBS</strong>.CO.IN</p>
               </div>
               <div class="top-nav s-12 l-10">
                  <p class="nav-text">Navigation</p>
                  <ul class="right">
                     <li class="active-item"><a href="#carousel">Home</a></li>
                     <li><a href="#features">Features</a></li>
                     <li><a href="#about-us">About Us</a></li>
                      <li><a href="#security">Security</a></li>
                     <li><a href="#latest-news">Pricing</a></li>      
                     <li><a href="#services">Services</a></li>
                     <li><a href="#faq">FAQ</a></li>
                     <li><a href="#careers">Careers </a></li>
                     <li><a href="#contact">Contact</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <section>
         <!-- CAROUSEL -->
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme">
               <div class="item">
                  <img src="img/first.jpg" alt="kfbs banner first">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line">
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div>
                        <h2>Accounting and Bookkeeping</h2>
                        <p>Tax returns</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="img/second.jpg" alt="kfbs banner second">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line">
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div>
                        <h2>Financial Services</h2>
                        <p>Payroll</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="img/third.jpg" alt="kfbs banner third">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line">
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div>
                        <h2>Accounts payable </h2>
                        <p>Accounts receivable </p>
                     </div>
                  </div>
               </div>
            </div>
     </div>
         <!-- FIRST BLOCK -->
         <div id="first-block">
            <div class="line">
               <h1>Taking Personal Care of Your Business</h1>
               <p>We follow the client instructions and client's previous examples of similar work .In case of queries,
                  we ask questions via email/Skype and then do the work as required. All of the work is reviewed by a CA.Cost benefit.
                  It is cheaper to hire an outsourced staff to do your bookkeeping / accounting than getting someone locally. Generally you will save as much as 50% of the cost to hire a bookkeeper locally than outsourcing it.
                   The output is of the same or even higher quality but cheaper which gives you more than what you are paying for.</p>
                  
            </div>
      <div class="line"><br></div>
      <div class="line">
        <div id="owl-demo2" class="owl-carousel owl-theme">
           <div class="item">
            <img src="img/first.jpg" alt="kfbs banner first">  
           </div>
           <div class="item">
            <img src="img/second.jpg" alt="kfbs banner second">              
           </div>
           <div class="item">
            <img src="img/third.jpg" alt="kfbs banner third">      
           </div>
        </div>
        <div class="s-12 m-4 l-2 center"><a class="white-btn" href="#contact">Contact Us</a></div>
      </div>
         </div>


         <!-- Showcase -->
         <section id="features">
         <div id="our-work">
            <div class="line">

               <div class="tabs">
                  <div class="tab-item tab-active">
                    <a class="tab-label active-btn">Softwares We Use</a>
                    <div class="tab-content">
                      <div class="margin">
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><img src="img/xero.png" alt="xero"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><img src="img/quickbooks.png" alt="quickbooks"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><img src="img/myob.png" alt="myob"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><img src="img/profile.png" alt="profile"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><img src="img/caseware.png" alt="Case Ware"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><img src="img/sage.png" alt="SAGE"></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-item">
                    <a class="tab-label">Accounting For</a>
                    <div class="tab-content">
                      <div class="margin">
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text">Australia</h4></div><img src="img/aus.jpg" alt="Australia ca"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text">United State</h4></div><img src="img/us.jpg" alt="United State"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text">United Kingdom</h4></div><img src="img/uk.jpg" alt="United Kingdom<"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text">Canada</h4></div><img src="img/ca.jpg" alt="Canada"></a></div>
                        <div class="s-12 m-6 l-4"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text">New Zealand</h4></div><img src="img/nz.jpg" alt="New Zealand"></a></div>

                      </div>
                    </div>
                  </div>
                  <!-- <div class="tab-item">
                    <a class="tab-label">Our Credentials</a>
                    <div class="tab-content">
                      <div class="margin">
                        <div class="s-12 m-6 l-3"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text"><h4>Lorem Ipsum Dolor</h4><p>Laoreet dolore magna aliquam erat volutpat.</p></div><img src="img/por4.jpg" alt=""></a></div>
                        <div class="s-12 m-6 l-3"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text"><h4>Lorem Ipsum Dolor</h4><p>Laoreet dolore magna aliquam erat volutpat.</p></div><img src="img/por6.jpg" alt=""></a></div>
                        <div class="s-12 m-6 l-3"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text"><h4>Lorem Ipsum Dolor</h4><p>Laoreet dolore magna aliquam erat volutpat.</p></div><img src="img/por3.jpg" alt=""></a></div>
                        <div class="s-12 m-6 l-3"><a class="our-work-container lightbox margin-bottom"><div class="our-work-text"><h4>Lorem Ipsum Dolor</h4><p>Laoreet dolore magna aliquam erat volutpat.</p></div><img src="img/por5.jpg" alt=""></a></div>
                      </div>
                    </div>
                  </div> -->

            </div>
         </div>
         </div>
       </section>
         <!-- ABOUT US -->
         <div id="about-us">
            <div class="s-12 m-12 l-6 media-container">
               <img src="img/about.jpg" alt="about">
            </div>
            <article class="s-12 m-12 l-6">
               <h2>Krishna Financial & Bookeeping Services</h2>
               <p>We have been working in the domain of bookkeeping & tax outsourcing. Over the years,
                 Krishna Financial & Bookeeping Services has not only managed but excelled delivering prompt outsourcing services to business houses,
                 individuals and accounting firms in US, UK, Canada, Australia and New Zealand. We understand the intricacies involved in BPO.
                 So when you sign up with us to outsource your accounting work, no matter how small or large your work is, you are sure you have a
                 partner who is as good as you are.
               </p>
               <div class="about-us-icons">
                  <i class="icon-paperplane_ico"></i> <i class="icon-trophy"></i> <i class="icon-clock"></i>
               </div>
            </article>
         </div>

         <!--SECURITY-->
         <section id="security">
          <div id="features">
            <div class="line">
             <h4 class="section-title">Security</h4>
               <div class="margin">
                 <div class="s-12 m-6 l-6 margin-bottom">
                    <i class="icon-users icon3x"></i>
                    <h2>Awareness On Internal Controls</h2>
                    <p>All our accountants and bookkeepers have high regards with integrity and confidentiality. Also, we have a non-disclosure agreement in place duly signed by all our staff. Our staff want your business to succeed as much as you do , it is a great opportunity for our staff to work with excellent US/Canada/New Zealand/UK/Australia companies.</p>

                   </div>
                 <div class="s-12 m-6 l-6 margin-bottom">
                    <i class="icon-printer icon3x"></i>
                    <h2>Multiple-Security- Technology Solution</h2>
                    <p>Data breaches have become more sophisticated, it is critical to have multiple layers of security on all devices. A software called Soft Activity which is an employee monitoring software, lets us view our staff computers in real time, track website visited, record keystrokes, record all emails received and sent.</p>
                 </div>
                 <div class="s-12 m-6 l-6 margin-bottom">
                    <i class="icon-warning icon3x"></i>
                      <h2>Security Policies</h2>
                      <p>At Krishna Financial & Bookeeping Services we have clear policies and procedures in place. This will ensure our staff and data are continuously operating in a secure environment. We ensure that all computers on the corporate network have state of the art security software.</p>

                 </div>
                 <div class="s-12 m-6 l-6 margin-bottom">
                    <i class="icon-lock_alt icon3x"></i>
                      <h2>Use Strong And Multiple Passwords</h2>
                      <p>Many of us make the mistake of using simple passwords that are easy for hackers to guess. At Virtuous Bookkeeping we make sure that we have complicated passwords, a simple â€œdictionaryattackan attack by a hacker using an automated tool that uses a combination of dictionary words and numbers to crack passwordsâ€”will not occur.</p>
                 </div>

               </div>
            </div>
         </div>
       </section>
         <!--security ends here-->

         <!-- PRICING -->
         <section id="pricing">
         <div id="latest-news">
            <div class="line">
              <h2 class="section-title">Pricing</h2>
              <div class="margin">
                <div class="s-12 m-6 l-6">
                  <div class="s-12 l-2">
                    <div class="news-date">
                    </div>
                  </div>
                  <div class="s-12 l-10">
                    <div class="news-text">
                      <h4>Hourly Price Plan</h4>
                      <p>US $6/hour(More than 160 hours/month). Price includes all your required bookkeeping tasks.</p>
                    </div>
                  </div>
                </div>
                <div class="s-12 m-6 l-6">
                  <div class="s-12 l-2">
                    <div class="news-date">
                    </div>
                  </div>
                  <div class="s-12 l-10">
                    <div class="news-text">
                      <h4>Less than 160 hours</h4>
                      <p>Detailed timesheets will be sent every month. We can also agree on the number of hours in advance.
                      Work is performed by experienced professionals with accounting degrees.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
       </section>

         <!-- SERVICES -->
         <div id="services">
            <div class="line">
               <h2 class="section-title">What we do</h2>
               <div class="margin">
                  <div class="s-12 m-12 l-6 margin-bottom">
                      <i class="icon-xing_circle"></i>
                     <div class="service-text">
                       <h3>Accounting Services - Australia</h3>
                       <p>We have deep expertise in providing accounting outsourcing services for the Australian firms. We provide accounting, bookkeeping, payroll, BAS return, superannuation, financial analysis and tax preparation services.
                          Most of our clients in Australia include accounting firms.</p>
                      </div>
                  </div>
                  <div class="s-12 m-12 l-6 margin-bottom">
                      <i class="icon-xing_circle"></i>
                     <div class="service-text">
                       <h3>Accounting Services - US</h3>
                       <p>We have deep expertise in providing accounting outsourcing services for the US firms. We provide accounting, bookkeeping, payroll, financial analysis and tax preparation services. Most of our clients in US include CA firms and small medium businesses
                         across diverse sectors like retail and wholesale, real estate, health care, construction, manufacturing and IT firms.</p>
                      </div>
                  </div>

                  <div class="s-12 m-12 l-6 margin-bottom">
                     <i class="icon-xing_circle"></i>
                     <div class="service-text">
                        <h3>Accounting Services - CA</h3>
                        <p>We have deep expertise in providing accounting outsourcing services for the Canadian firms. We provide accounting, bookkeeping, payroll,
                           financial analysis and tax preparation services. .</p>
                     </div>
                  </div>
                  <div class="s-12 m-12 l-6 margin-bottom">
                     <i class="icon-xing_circle"></i>
                     <div class="service-text">
                        <h3>Accounting Services -  New Zealand</h3>
                        <p>We have deep expertise in providing accounting outsourcing services for the New Zealand firms. We provide Financial Reporting,
                           bookkeeping, payroll, Xero Conversion, GST and tax preparation services. Most of our clients in New Zealand include accounting firms.</p>
                     </div>
                  </div>
                  <div class="s-12 m-12 l-6 margin-bottom">
                    <i class="icon-xing_circle"></i>
                     <div class="service-text">
                        <h3>Accounting Services -  UK</h3>
                        <p>We have deep expertise in providing accounting outsourcing services for the UK firms. We provide accounting, bookkeeping, VAT returns, payroll,
                           financial analysis and tax preparation services. Most of our clients in UK and small medium businesses
                          across diverse sectors like retail and wholesale, real estate, health care, construction, manufacturing and IT firms.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <section id="faq">
          <div id="features">
            <div class="line">
             <h4 class="section-title">F.A.Q</h4>
               <div class="margin" style="text-align: justify; padding-right: 30px; padding-bottom: 50px; padding-left: 80px;">
                    <h2> What about my paper receipts, how will I give it to the Krishna Financial & Bookeeping Services staff?</h2>
                    <p >For your paper receipts you can scan it and send it to us or you may use a third party provider wherein you can mail all your paper receipts and they will scan it for you then our offshore staff will be able to view it online then record it to your accounting system.</p>
                     <h2>What are the qualifications of Krishna Financial & Bookeeping Services bookkeepers / accountants?</h2>
                    <p >Our staff are all from India, all of which are University graduates with a degree in Bachelor in Accountancy which is a two year course. Some are Chartered Accountants in India with years of experience in the corporate world.</p>
                     <h2>Why should I choose to outsource my bookkeeping than hiring a local firm to do the job?</h2>
                    <p >Cost benefit. It is cheaper to hire an outsourced staff to do your bookkeeping / accounting than getting someone locally. Generally you will save as much as 50% of the cost to hire a bookkeeper locally than outsourcing it. The output is of the same or even higher quality but cheaper which gives you more than what you are paying for.</p>
                     <h2>What about my paper receipts, how will I give it to the Krishna Financial & Bookeeping Services staff?</h2>
                    <p >For your paper receipts you can scan it and send it to us or you may use a third party provider wherein you can mail all your paper receipts and they will scan it for you then our offshore staff will be able to view it online then record it to your accounting system.</p>
                     <h2>Are my records safe with Krishna Financial & Bookeeping Services staff?</h2>
                    <p >Yes it is. All our accountants and bookkeepers have high regards with integrity and confidentiality. Also, we have a non-disclosure agreement in place duly signed by all our  staff. Our staff want your business to succeed as much as you do , it is a great opportunity for our staff to work with excellent US/Canada/New Zealand/UK/Australia companies. They treat it very seriously.</p>
                   </div>
                </div>
          </div>
         </section>


      <div id="careers">
            <div class="line">
               <h2 class="section-title">Careers</h2>
               <div class="margin">
                  <h3>Fill This Form</h3>
                <form class="customform" method="POST" action="<?php $_PHP_SELF?>" role="form" enctype="multipart/form-data">
                  <div class="s-12 m-12 l-5 hide-m hide-s margin-bottom right-align">
                   <div class="s-12"><input  name="userEmail" id="userEmail" placeholder="Your e-mail" title="Your e-mail" type="email" required /></div>

                   <div class="s-12"><input  name="inputmobile" id="inputmobile" placeholder="Your mobile" title="Your e-mobile" type="number" required /></div>
                      <label for='uploaded_file'>Upload Resume:</label>
                    
                    <input type="file" name="uploaded_file" required>
                  </div>
                  <div class="s-12 m-12 l-2 margin-bottom right-align">
                

                  </div>
                  <div class="s-12 m-12 l-5">
                      <div class="s-12"><textarea placeholder="Your message" name="inputContent" id="inputContent" rows="5" required></textarea></div>
                      <div class="s-12 m-12 l-4"><button class="color-btn" type="submit" name="submitBtnC" id="submitBtnC">Submit</button></div>
                   
                  </div>
               </div>
                </form>
            </div>
         </div>




         <!-- CONTACT -->
         <div id="contact">
            <div class="line">
               <h2 class="section-title">Contact Us</h2>
               <div class="margin">
                  <div class="s-12 m-12 l-3 hide-m hide-s margin-bottom right-align">
                    <img src="img/contact.jpg" alt="kfbs contact image">
                  </div>
                  <div class="s-12 m-12 l-4 margin-bottom right-align">
                     <h3>Krishna Financial & Bookeeping Services</h3>
                     <address>
                        <p><strong>Address:</strong> #105/2, Shanti Nagar, Karnal Near Gurdwara, Haryana-132002</p>
                        <p><strong>Mobile:</strong> +91 9034950501</p>
                        <p><strong>E-mail:</strong> info@kfbs.co.in</p>
                     </address>

                  </div>
                  <div class="s-12 m-12 l-5">
                    <h3>Fill This Up For A Free Quote</h3>
                    <form class="customform" method="POST" action="<?php $_PHP_SELF?>" role="form">
                      <div class="s-12"><input  name="inputEmail" id="inputEmail" placeholder="Your e-mail" title="Your e-mail" type="email" required /></div>
                      <div class="s-12"><input name="inputName" id="inputName" placeholder="Your name" title="Your name" type="text" required /></div>
            <div class="s-12"><textarea placeholder="Subject" name="inputSubject" id="inputSubject"  rows="5" required></textarea></div>
                      <div class="s-12"><textarea placeholder="Your message" name="inputContent" id="inputContent" rows="5" required></textarea></div>
                      <div class="s-12 m-12 l-4"><button class="color-btn" type="submit" name="submitBtn" id="submitBtn">Submit</button></div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- MAP -->
         <div id="map-block">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3465.8907315171155!2d76.95691271471745!3d29.69394748201125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e71d5e6633849%3A0xa49721c439a43fa3!2sGurdwara+Sahib!5e0!3m2!1sen!2sin!4v1528838654283" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
      </section>
      <!-- FOOTER -->
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p>Copyright &copy;<?php echo" ".date("Y"); ?>, kfbs.co.in </p>
            </div>
            <div class="s-12 l-6">
               <p class="right"  title="visit www.allmyitsolutions.com">Maintained by<br>www.allmyitsolutions.com</p>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="js/responsee.js"></script>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
            var theme_slider = $("#owl-demo");
            var owl = $('#owl-demo');
            owl.owlCarousel({
              nav: false,
              dots: true,
              items: 1,
              loop: true,
              autoplay: true,
              autoplayTimeout: 6000
            });
            var owl = $('#owl-demo2');
            owl.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:false
            });

            // Custom Navigation Events
            $(".next-arrow").click(function() {
                theme_slider.trigger('next.owl');
            })
            $(".prev-arrow").click(function() {
                theme_slider.trigger('prev.owl');
            })

        });
      </script>

      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5b152f3310b99c7b36d49afc/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
      </script>
      <!--End of Tawk.to Script-->
   </body>
</html>
<?php
}

if(isset($_REQUEST["submitBtnC"])){

$validation_errors =false;
//Get the uploaded file information
$name_of_uploaded_file =basename($_FILES['uploaded_file']['name']);

//get the file extension of the file
$type_of_uploaded_file =
    substr($name_of_uploaded_file,
    strrpos($name_of_uploaded_file, '.') + 1);

$size_of_uploaded_file =
    $_FILES["uploaded_file"]["size"]/1024;//size in KBs
//Settings
$max_allowed_file_size = 100; // size in KB
$allowed_extensions = array("doc", "docx", "odt");

//Validations
if($size_of_uploaded_file > $max_allowed_file_size )
{
  $errors .= "\n Size of file should be less than $max_allowed_file_size";
  $validation_errors =true;
}

//------ Validate the file extension -----
$allowed_ext = false;
for($i=0; $i<sizeof($allowed_extensions); $i++)
{
  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
  {
    $allowed_ext = true;
  }
}

if(!$allowed_ext)
{
  $errors .= " only types are supported: ".implode(',',$allowed_extensions);
  $validation_errors =true;
}

$upload_folder='./upload_folder/';
//copy the temp. uploaded file to uploads folder
$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
$tmp_path = $_FILES["uploaded_file"]["tmp_name"];

if(is_uploaded_file($tmp_path))
{
  if(!copy($tmp_path,$path_of_uploaded_file))
  {
    $errors .= '\n error  uploaded file';

  }
}

$message =  new PHPMailer(true);


    //Server settings
                                 // Enable verbose debug output
    $message->isSMTP();                                      // Set mailer to use SMTP
    $message->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
    $message->SMTPAuth = true;                               // Enable SMTP authentication
    $message->Username = 'balajipastapure@gmail.com';                 // SMTP username
    $message->Password = '9767281145';                           // SMTP password
    $message->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $message->Port = 587;  
                                      // TCP port to connect to

  if(!$validation_errors){
      //Recipients
      $message->setFrom('balajipastapure@gmail.com', 'New Application');

      $name= $_REQUEST["userEmail"];
      $subject='New Application';
      $email='balaji.pastapure007@gmail.com';
      $content= $_REQUEST["inputContent"];
      $mail->Subject = 'do-not reply';
      $mail->ContentType = 'text/plain';
      $mail->addAttachment($path_of_uploaded_file);
      $mail->isHTML(false);
      $mail->Body =  'Hello Admin !'."\n"." New Person uploaded resume , ".""."\n\n\n".'Sincerely'."\n"."Team Kfbs.co.in"
                  ."\n\n\n\n\n"."";
      // you may also use $mail->Body = file_get_contents('your_mail_template.html');

      $mail->AddAddress ($email, $name);

      // you may also use this format $mail->AddAddress ($recipient);

      if(!$mail->Send())
      {
              $error_message = "Mailer Error: " . $mail->ErrorInfo;
          echo $error_message;
              //header('Location: error.php');
      }
     //delete files from servers
      //unlink($path_of_uploaded_file);
  }

}
?>
