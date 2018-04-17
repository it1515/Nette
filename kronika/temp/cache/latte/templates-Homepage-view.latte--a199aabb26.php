<?php
// source: D:\www\kronika\app\presenters/templates/Homepage/view.latte

use Latte\Runtime as LR;

class Templatea199aabb26 extends Latte\Runtime\Template
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
		?><h1><?php echo LR\Filters::escapeHtmlText($row->nazev) /* line 4 */ ?></h1>
<h2>Jazyk: <?php echo LR\Filters::escapeHtmlText($row->jazyk) /* line 5 */ ?> </h2> 
<ul>
    <li>Úroveň: <b><?php echo LR\Filters::escapeHtmlText($row->uroven) /* line 7 */ ?></b></li>
    <li>Počet lekcí: <b><?php echo LR\Filters::escapeHtmlText($row->lekci) /* line 8 */ ?></b></li>
    <li>Jméno lektora: <b><?php echo LR\Filters::escapeHtmlText($row->lektor) /* line 9 */ ?></b></li>
    <li>Označení učebny: <b><?php echo LR\Filters::escapeHtmlText($row->ucebna) /* line 10 */ ?></b></li>
</ul>
<p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Zpět na hlavní stránku</p>
<?php
	}

}
