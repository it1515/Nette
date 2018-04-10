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
		?><h2><?php echo LR\Filters::escapeHtmlText($row->nazev) /* line 4 */ ?></h2>
<p>jazyk: <?php echo LR\Filters::escapeHtmlText($row->jazyk) /* line 5 */ ?> úroveň: <?php echo LR\Filters::escapeHtmlText($row->uroven) /* line 5 */ ?></p>
<?php
	}

}
