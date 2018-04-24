<?php
// source: D:\www\kornika-test\app\presenters/templates/Homepage/view.latte

use Latte\Runtime as LR;

class Template434a3c3407 extends Latte\Runtime\Template
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
		?><h1><?php echo LR\Filters::escapeHtmlText($row->jmeno) /* line 4 */ ?> <?php echo LR\Filters::escapeHtmlText($row->prijmeni) /* line 4 */ ?></h1>
<p>Datum narorení: <?php echo LR\Filters::escapeHtmlText($row->narozeni) /* line 5 */ ?> </p>

<p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Zpět na hlavní stránku</p><?php
	}

}
