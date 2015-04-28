<div class="navbar   navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            echo $this->Html->link(
                    $this->Html->image('logo.png', array('alt' => "teste", 'border' => '0', 'style'=>'width: 130px')), "http://localhost/AmazonTrace/", array('target' => '_blank', 'escape' => false)
            );
            ?>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">
                        <span class='flaticon-home149'></span><br/>
                        Início</a></li>
                <li><a href="#about">
                        <span class='flaticon-add184'></span><br/>
                        Cadastros</a></li>
                <li><a href="#contact">
                        <span class='flaticon-google132'></span><br/>
                        Relat&oacute;rios</a></li>
            </ul>
            <div class="col-md-offset-9">
                <?php
                echo $this->Html->link(
                        $this->Html->image('user.png', array('alt' => "teste", 'border' => '0')), "http://localhost/AmazonTrace/Users/index", array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                );
                echo '&nbsp;Nome do usuario ( PERFIL )';
                ?> 
            </div>
        </div><!--/.nav-collapse -->

    </div>
</div>