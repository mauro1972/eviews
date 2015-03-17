    <?php
    $elements = drupal_get_form('user_login_block');
    /**
      do all your rendering stuff here
      drupal_render seems to add html to the elements array
      and instead of printing what is returned from drupal_render
      you can use the added html in ['#children'] elements of the arrays
      to build the form in the order you want.
    **/
    /*print drupal_render($elements['name']);
    print drupal_render($elements['pass']);
    print drupal_render($form['form_build_id']);
    print drupal_render($form['form_id']);
    print drupal_render($form['actions']);*/
    
     $output = '<div id="clientes"><div><h3 class="clientes">' . t('Clients') . '</h3> ';
 //    $output .= '<a href="user/register" class="user-register btn b">'. t('Register') . '</a></div>';
    $output .= l(t('Register'),'user/register', array('attributes'=>array('class'=>'user-register btn b')));
     $output .= '<div class="register-help">' . t('Access to reports, databases and projections') . '</div>';    
    
    $rendered = drupal_render($elements);
    // to see what you have to work with
   //  print "<pre>ELEMENTS: " . print_r($elements['links']['children'],1) . "</pre>";

    $output  .= '<form action="' . $elements['#action'] .
                              '" method="' . $elements['#method'] .
                              '" id="' . $elements['#id'] .
                              '" accept-charset="UTF-8">';

    // $output .= $elements['links']['#children'];
    $output .= '<div class="login-user">' . $elements['name']['#children'];
    $output .= $elements['pass']['#children'] . '</div>';
    $output .= $elements['form_build_id']['#children'];
    $output .= $elements['form_id']['#children'];
    $output .= $elements['actions']['#children'];
 //   $output .= $elements['links']['#children'];
	  $output .= '<div class="login-pass">'. t('If you forgot your password ') . l(t('click here'),'user/password') .'</div>';
    $output .= '</div></form>';
    print $output;
    
   
    ?>
