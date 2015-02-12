# IFG: Tabelas editáveis 

Tabela HTML editável usando CAKEPHP + jQuery + AJAX

# Utilização

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
		...
		<td class="actions">
			<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $user['User']['id']), array(), __('Tem certeza de que deseja apagar # %s?', $user['User']['id'])); ?>
		</td>
	</tr>

