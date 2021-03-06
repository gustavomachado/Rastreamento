<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css("bootstrap.min");
        echo $this->Html->css("bootstrap-theme.min");
        echo $this->Html->css("flaticon/flaticon");
        echo $this->Html->css("bootstrap-datetimepicker");
        echo $this->Html->css("bootstrap-datetimepicker-site");
        echo $this->Html->css("style");

        echo $this->Html->script("jquery-1.11.2.min");
        echo $this->Html->script("jquery-ui");
        echo $this->Html->script("bootstrap.min");
        echo $this->Html->script("jquery.mask");
        echo $this->Html->script("jquery.maskMoney.min");
        echo $this->Html->script("angular.min");
        echo $this->Html->script("angular-resource.min");
       // echo $this->Html->script("app");
        echo $this->Html->script("moment");
        echo $this->Html->script("bootstrap-datetimepicker");

        echo $this->Html->script("Calendar");

        echo $this->Html->script("functions.js");

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <!-- Latest compiled and minified CSS - ->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript - ->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            body{ padding: 70px 0px; }
        </style>
        <script>
            var urlAtual = "<?php echo $this->Html->url(array('controller' => $this->params['controller'])) ?>";
        </script>
    </head>

    <body>

        <?php echo $this->Element('navigation'); ?>

        <div class="container" style="width: 98% !important">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>

        </div><!-- /.container -->

    </body>
</html>
