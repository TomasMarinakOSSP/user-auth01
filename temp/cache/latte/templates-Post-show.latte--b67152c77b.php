<?php

use Latte\Runtime as LR;

/** source: /home/marinakt/user-auth01-2/app/Module/Admin/Presenters/templates/Post/show.latte */
final class Template_b67152c77b extends Latte\Runtime\Template
{
	public const Source = '/home/marinakt/user-auth01-2/app/Module/Admin/Presenters/templates/Post/show.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['comment' => '50'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <p><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:default')) /* line 2 */;
		echo '">← zpět na výpis příspěvků</a></p>

';
		if ($post->status !== 'ARCHIVED' || $user->isLoggedIn()) /* line 4 */ {
			echo '
        <div class="date">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($post->created_at, 'F j, Y')) /* line 6 */;
			echo '</div>

        <h1>';
			echo LR\Filters::escapeHtmlText($post->title) /* line 8 */;
			echo '</h1>

        <div class="post">';
			echo LR\Filters::escapeHtmlText($post->content) /* line 10 */;
			echo '</div>

';
			if ($post->image) /* line 12 */ {
				echo '            <img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */;
				echo '/';
				echo LR\Filters::escapeHtmlAttr($post->image) /* line 13 */;
				echo '" width="200" alt="Obrázek k článku ';
				echo LR\Filters::escapeHtmlAttr($post->title) /* line 13 */;
				echo '">
';
			}
			echo '
        <div class="status">Stav: ';
			echo LR\Filters::escapeHtmlText($post->status) /* line 16 */;
			echo '</div>

       <div class="views">Počet zhlédnutí: ';
			echo LR\Filters::escapeHtmlText($post->views) /* line 18 */;
			echo '</div>

<div class="likes">Počet "Líbí se mi": ';
			echo LR\Filters::escapeHtmlText($likes) /* line 20 */;
			echo '</div>
<div class="dislikes">Počet "Nelíbí se mi": ';
			echo LR\Filters::escapeHtmlText($dislikes) /* line 21 */;
			echo '</div>

';
			if ($user->isLoggedIn()) /* line 23 */ {
				if ($userRating === null) /* line 24 */ {
					echo '        <a href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 1])) /* line 25 */;
					echo '">Líbí se mi!</a>
        <a href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 0])) /* line 26 */;
					echo '">Nelíbí se mi!</a>
';
				} elseif ($userRating->liked == 1) /* line 27 */ {
					echo '        <span>Líbí se mi</span>
        <a href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 0])) /* line 29 */;
					echo '">Nelíbí se mi!</a>
';
				} elseif ($userRating->liked == 0) /* line 30 */ {
					echo '        <a href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 1])) /* line 31 */;
					echo '">Líbí se mi!</a>
        <span>Nelíbí se mi</span>
';
				}


			} else /* line 34 */ {
				echo '    <p>Pro hodnocení příspěvků se musíte přihlásit.</p>
';
			}
			echo '

';
			if ($post->status === 'OPEN') /* line 39 */ {
				echo '            <h2>Vložte nový příspěvek</h2>
';
				$ʟ_tmp = $this->global->uiControl->getComponent('commentForm');
				if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
				$ʟ_tmp->render() /* line 41 */;

			} elseif ($post->status === 'CLOSED' && $user->isLoggedIn()) /* line 42 */ {
				echo '            <h2>Přidání komentáře je povoleno pouze přihlášeným uživatelům.</h2>
';
				$ʟ_tmp = $this->global->uiControl->getComponent('commentForm');
				if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
				$ʟ_tmp->render() /* line 44 */;

			} else /* line 45 */ {
				echo '            <h2>Komentáře nelze přidávat.</h2>
';
			}

			echo '
        <div class="comments">
';
			foreach ($comments as $comment) /* line 50 */ {
				echo '                <p><b>';
				echo LR\Filters::escapeHtmlText($comment->name) /* line 51 */;
				echo '</b> napsal:</p>
                <div>';
				echo LR\Filters::escapeHtmlText($comment->content) /* line 52 */;
				echo '</div>
';

			}

			echo '
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Edit:edit', [$post->id])) /* line 55 */;
			echo '">Upravit příspěvek</a>

        </div>

';
		}
	}
}
