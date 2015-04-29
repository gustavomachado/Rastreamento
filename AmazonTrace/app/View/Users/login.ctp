<?php
echo $this->Html->css("bootstrap.min");
echo $this->Html->css("bootstrap-theme.min");
echo $this->Html->css("style");
echo $this->Html->css("flaticon/flaticon");
echo $this->Html->css("bootstrap-datetimepicker");
echo $this->Html->css("bootstrap-datetimepicker-site");

echo $this->Html->script("jquery-1.11.2.min");
echo $this->Html->script("jquery-ui");
echo $this->Html->script("bootstrap.min");
echo $this->Html->script("jquery.mask");
echo $this->Html->script("moment");
echo $this->Html->script("bootstrap-datetimepicker");

echo $this->Session->flash('auth');

?>

<div class="row" style="">
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
    <div class="col-md-12">
        <div style="border: solid 2px darkgray; padding: 25px; border-radius: 8px; width: 320px; margin: auto; margin-top: 10%">
            <fieldset> <legend><?php echo __('Entrar'); ?></legend>
                <div class="col-lg-12">
                    <?php echo $this->Form->input('nome', array('label' => 'Usuário', 'class' => 'form-control')); ?>
                </div>
                <div class="col-lg-12">
                    <?php echo $this->Form->input('senha', array('label' => 'Senha','type'=>'password', 'class' => 'form-control')); ?>
                </div>
                <div class="col-lg-12">
                    <?php echo $this->Form->submit('Entrar', array('class' => 'btn btn-default', 'style' => 'width: 100%; margin-top: 15px')) ?>
                </div>

            </fieldset>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</body>