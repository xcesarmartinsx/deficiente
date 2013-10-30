<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'DefiProgram');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->html->css(array('bootstrap.min.css'));
		echo $this->html->script(array('bootstrap.min'));
                echo $this->html->script(array('jquery'));
                echo $this->Js->writeBuffer(array('cache' => FALSE));
	?>
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;

      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 44px;

      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
      .ButtonSmall {

            -webkit-appearance: button;
            display: inline-block;
            border-radius: 0 14px 14px 0;
            border-top-left-radius: 0px;
            border-top-right-radius: 14px;
            border-bottom-right-radius: 14px;
            border-bottom-left-radius: 0px;
            text-shadow: 0 1px 1px rgba(255,255,255,0.75);
            background-image: linear-gradient(to bottom,#fff,#e6e6e6);
            background-repeat: repeat-x;
            border-bottom-color: #b3b3b3;
            line-height: 20px;
            background-color: buttonface;
            box-sizing: border-box;

            border: 1px solid #ccc;
            margin-left: -1px;
            
            height: 30px;
            width: 60px;
      }
      
      .ButtonSmall:hover {
            color: #333;        
            background-position: 0 -15px;
            background-position-x: 0px;
            background-position-y: -15px;
            
            -webkit-transition: background-position .1s linear;
            -webkit-transition-property: background-position;
            -webkit-transition-duration: 0.1s;
            -webkit-transition-timing-function: linear;
            -webkit-transition-delay: initial;
            
            transition: background-position .1s linear;
            transition-property: background-position;
            transition-duration: 0.1s;
            transition-timing-function: linear;
            transition-delay: initial;
            
             background-color: #e6e6e6;
      }
    
    </style>
</head>
<body>
        <div class="container">
            <div class="masthead">
                <h3 class="muted">Cadastro Regional De Deficiêntes</h3>
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul class="nav">
                               <li class="active"><a href="/deficiente/deficientes/index">Home</a></li>
                               <li><a href="/deficiente/deficientes/listar">Listar</a></li>
                               <li><a href="#">Relatórios</a></li>
                           </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
