<?php
// source: D:\www\kornika-test\app\presenters/templates/Homepage/insert.latte

use Latte\Runtime as LR;

class Templatededf46474d extends Latte\Runtime\Template
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
<h2>Přidání zavodníka</h2>
<div>
<?php
		$this->createTemplate('../components/bootstrap-form.latte', $this->params, "import")->render();
		$this->renderBlock('bootstrap-form', ['zavodForm'] + $this->params, 'html');
		?></div><?php
	}

}
