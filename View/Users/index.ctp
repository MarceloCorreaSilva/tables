<div class="users">
	<h2><?php echo __('Users'); ?></h2>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		</ul>
	</div>


	<table class="rwd-table" >
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('idade'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	
	<tr controller="<?php 
		echo $this->Html->url(
			array(
				'controller'=>'users', 
				'action' =>'updateField', 
				$user['User']['id']
			), 
			true
		) ?>">

		<td><?php echo h($user['User']['id']); ?></td>
		<td column='nome'><?php 
				echo $this->Html->link(
					$user['User']['nome'], 
					array('action' => 'view', $user['User']['id'])
				); 
		?></td>
		<td column='idade'><?php echo h($user['User']['idade']); ?>&nbsp;</td>
		<td column='email'><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $user['User']['id']), array(), __('Tem certeza de que deseja apagar # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Paginas {:page} de {:pages}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Proximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
