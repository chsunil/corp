<?php
/* Template Name: Contact Page */ ?>
<?php
 
  //response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
   }
     //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);


?>
<?php get_header(); ?>

<div class="contact">
  <div class="container">
   
    <div class="col-md-12 sect-headr">
     <h2>Contact <span>Us</span></h2>
     <h4>Get In Touch</h4>
    </div><!--section header-->
    <div class="clearfix"></div>
    
   <div class="row"> 
   <?php while ( have_posts() ) : the_post(); ?>
       <div class="col-md-9 col-sm-9">
          <?php the_content(); ?>

    <form action="<?php the_permalink(); ?>" method="post">
     <div class="col-md-6 col-sm-6">
      <div class="row">
          <div class="form-group col-md-12 connm">
             <label for="name">Your Name <span>*</span></label>
             <input type="text" aria-invalid="false" aria-required="true" class="form-control" size="40" value="" name="message_name">
          </div>
          
          <div class="form-group col-md-12 conem">
             <label for="message_email">Your Email <span>*</span></label>
             <input type="email" aria-invalid="false" aria-required="true" class="form-control" size="40" value="" name="message_email">
          </div>
          
          <div class="form-group col-md-12 comsub">
             <label for="message_text">Subject</label>
             <input type="text" aria-invalid="false" class="form-control" size="40" value="" name="message_text">
          </div>
          </div><!--row-->
     </div><!--col6-->
      <div class="col-md-6 col-sm-6">
      <div class="row">
          <div class="form-group col-md-12 conmm">
             <label>Message <span>*</span></label>
             <textarea aria-invalid="false" class="form-control" rows="10" cols="40" name="your-message"></textarea>
             
          </div>
      </div><!--row-->
     </div><!--col6-->
     
     <div class="clearfix"></div> 
     <div class="col-md-12 text-center">
      <input type="hidden" name="submitted" value="1">
      <input type="submit" class="subbtn" value="Submit"></div>
    </form>
     <?php comments_template(); ?>
     </div>
    <?php get_sidebar('contact'); ?>
   
   </div><!--row--> 
   <?php endwhile; // end of the loop. ?>
  </div><!--container-->
 </div>
<?php get_footer(); ?>