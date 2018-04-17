<?php
// source: D:\www\kronika\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templatee98c6532e6 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 17');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h2>Seznam kurzů</h2>
<div>
    <table class="table table-bordered">
       <thead>
        <tr>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['nazev'])) ?>">Název kurzu</a></th>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['lekci'])) ?>">Počet lekcí</a></th>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['jazyk'])) ?>">Jazyk</a></th>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['uroven'])) ?>">Úroveň</a></th>
            <th>Akce</th>
        </tr>    
       </thead>
       <tbody>    
<?php
		$iterations = 0;
		foreach ($data as $row) {
?>
        <tr>
            <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:view", [$row->id_kurzu])) ?>"><?php
			echo LR\Filters::escapeHtmlText(call_user_func($this->filters->truncate, $row->nazev, 20)) /* line 19 */ ?></a></td>
            <td><?php echo LR\Filters::escapeHtmlText($row->lekci) /* line 20 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $row->jazyk)) /* line 21 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText($row->uroven) /* line 22 */ ?></td>
            <td><a 
                   class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:update", [$row->id_kurzu])) ?>">Editovat</a>
                <a 
                   class="btn btn-danger" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:delete", [$row->id_kurzu])) ?>">Smazat</a>
            </td>
        </tr>    
<?php
			$iterations++;
		}
?>
        </tbody>
    </table>   
    <p><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:insert")) ?>">Nový záznám</a></p>  
</div>       
<?php
	}

}
