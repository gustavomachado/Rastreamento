    <div class="navbar   navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">
                <p><span class='glyphicon glyphicon-home'></span></p>
                Home</a></li>
            <li><a href="#about">
               <p> <span class='glyphicon glyphicon-floppy-save'></span></p>
                    Cadastros</a></li>
            <li><a href="#contact">
               <p> <span class='glyphicon glyphicon-envelope'></span></p>
                Relat&oacute;rios</a></li>
          </ul>
        <div class="col-md-offset-9">
            <?php echo $this->Html->link(
                $this->Html->image('user.png',array('alt' => "teste", 'border' => '0')) ,
                "http://localhost/AmazonTrace/Users/index",
                array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                );
                 echo '&nbsp;Nome do usuario ( PERFIL )';
                ?>
 
        </div>
        </div><!--/.nav-collapse -->
        
      </div>
    </div>