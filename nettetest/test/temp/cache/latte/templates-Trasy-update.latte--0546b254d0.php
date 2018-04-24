<?php
// source: C:\xampp\htdocs\trasy-reseni\app\presenters/templates/Trasy/update.latte

use Latte\Runtime as LR;

class Template0546b254d0 extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Upravit trasu</h2>
            <hr>
<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("trasyForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>
        </div>	
    </div>    
</div>
<?php
	}

}
