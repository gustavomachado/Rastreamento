<div class="navbar   navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <?php echo $this->Html->image('logo.png', array('alt' => "teste", 'border' => '0', 'style' => 'width: 130px')); ?>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/AmazonTrace/Inicio">
                        <span class='flaticon-home149'></span><br/>
                        Início</a></li>
                <li><a href="/AmazonTrace/Cadastros">
                        <span class='flaticon-add184'></span><br/>
                        Cadastros</a></li>
                <li><a href="#contact">
                        <span class='flaticon-google132'></span><br/>
                        Relat&oacute;rios</a></li>
                <li><a href="/AmazonTrace/Contratos">
                        <span class='flaticon-screen47'></span><br/>
                        Contratos</a></li>
                <li>
                    <a href="/AmazonTrace/Users/logout"><span class="flaticon-exit13"></span><br/>
                        Sair</a>
                </li>
            </ul>
            <div class="col-md-offset-9">
                <div class="col-md-12 usuario-logado">
                    <span class="flaticon-user158"></span><br>
                    <?php echo $this->Html->link($user['User']['nome'] . ' [' . $user['Conta']['descricao'].']', array('controller' => 'Users', 'action'=>'index', $user['User']['id'])) ?>
                </div>
            </div>
        </div><!--/.nav-collapse -->

    </div>
</div>