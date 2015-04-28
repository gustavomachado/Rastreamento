<div class="chips index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Chips'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="  row"> 
        <!-- sidebar - ->
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Chip'), array('action' => 'add'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Rastreadors'), array('controller' => 'rastreadors', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Rastreador'), array('controller' => 'rastreadors', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div><!-- end body - ->
                </div><!-- end panel - ->
            </div><!-- end actions - ->
        </div><!-- end col md 3 -- >
        <!-- sidebar -->

        <div class="  ">
            <div  >
            <?php echo $this->Form->create('Chip', array('role' => 'form')); ?>
                <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
                <div class="form-group col-md-2">
					<?php echo $this->Form->input('operadora', array('class' => 'form-control', 'placeholder' => 'Operadora'));?>
                </div>

                <div class="form-group col-md-2">
					<?php echo $this->Form->input('numero_telefone', array('class' => 'form-control tel', 'placeholder' => 'Numero Telefone'));?>
                </div>
                <div class="form-group col-md-3">
					<?php echo $this->Form->input('numero_chip', array('class' => 'form-control', 'placeholder' => 'Numero Chip'));?>
                </div>
                <div class="form-group col-md-2">
					<?php echo $this->Form->input('apn', array('class' => 'form-control', 'placeholder' => 'Apn'));?>
                </div>

                <div class="col-md-12">
                    <?php echo $this->Form->label('Observa&ccedil;&otilde;es');?>
                </div>
                <div class="form-group col-md-6">

                        <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs' ));?>
                </div>

                <div class="form-group col-md-offset-1  col-md-1">
                     <?php echo $this->Html->link('Novo', array('action' => 'index' ), array('escape' => false ,'class'=>'btn btn-default')); ?>

                </div>
                <div class="form-group     col-md-1">
                    <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
                </div>
			<?php echo $this->Form->end() ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped  ">
                    <thead>
                        <tr  >
                            <th  ><?php echo $this->Paginator->sort('id'); ?></th>
                            <th   ><?php echo $this->Paginator->sort('rastreador_id'); ?></th>
                            <th  ><?php echo $this->Paginator->sort('operadora'); ?></th>
                            <th   ><?php echo $this->Paginator->sort('numero_chip'); ?></th>
                            <th ><?php echo $this->Paginator->sort('numero_telefone'); ?></th>
                            <th ><?php echo $this->Paginator->sort('apn'); ?></th>
                            <th ><?php echo $this->Paginator->sort('obs'); ?></th>
                            <th class="actions">A&ccedil;&otilde;es</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chips as $chip): ?>
                        <tr > 
                            <td><?php echo h($chip['Chip']['id']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($chip['Rastreador']['id'].' - '.$chip['Rastreador']['modelo'], array('controller' => 'rastreadors', 'action' => 'index', $chip['Rastreador']['id'])); ?>
                            </td>
                            <td><?php echo h($chip['Chip']['operadora']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['numero_chip']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['numero_telefone']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['apn']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['obs']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php /* echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $chip['Chip']['id']), array('escape' => false));*/ ?>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'index', $chip['Chip']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $chip['Chip']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $chip['Chip']['id'])); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <p>
                    <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
                </p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
                <ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Anterior', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Anterior</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Pr&oacute;ximo &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Pr&oacute;ximo &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
                </ul>
			<?php } ?>
            </div>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->