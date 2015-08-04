<?php
echo $this->Html->css("bootstrap.min");
echo $this->Html->css("bootstrap-theme.min");
echo $this->Html->css("style");

echo $this->Html->script("jquery-1.11.2.min");
echo $this->Html->script("bootstrap.min");

echo $this->Session->flash('auth');
?>

<div class="row" style="">
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
    <div class="col-md-12">
        <div style="width: 320px; margin: auto; margin-top: 10%">
            <div style="border: solid 2px darkgray; padding: 25px; padding-top: 10px; border-radius: 8px;">
                <div style="text-align: center">
                    <?php echo $this->Html->image('logo2.png', array('border' => '0', 'style' => 'width: 180px')); ?>
                </div>
                <fieldset style="margin-top: 10px">
                    <legend style="text-align: center"><?php echo __('Entrar'); ?></legend>
                    <div class="input-group col-lg-12">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </span>
                        <?php echo $this->Form->input('login', array('label' => false, 'class' => 'form-control', 'style' => 'border-bottom-right-radius: 4px; border-top-right-radius: 4px', 'placeholder' => 'Usuário')); ?>
                    </div>
                    <div class="input-group col-lg-12" style="margin-top: 10px">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </span>
                        <?php echo $this->Form->input('senha', array('label' => false, 'type' => 'password', 'class' => 'form-control', 'style' => 'border-bottom-right-radius: 4px; border-top-right-radius: 4px', 'placeholder' => 'Senha')); ?>
                    </div>
                    <div>
                        <?php echo $this->Form->submit('Entrar', array('class' => 'btn btn-default', 'style' => 'width: 100%; margin-top: 15px')) ?>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>