<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Attributes\Icon;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Attributes\SearchUsingFullText;

#[Icon('heroicons.folder-open')]
class PostResource extends ModelResource
{
	protected string $model = Post::class;

	protected string $title = 'Posts';


	public function indexFields(): array
	{
		return [
			ID::make()->sortable(),
			Text::make('Заголовок', 'title')->sortable(),
		];
	}

	public function fields(): array
	{
		return [
			Block::make([
				ID::make(),
				Text::make('Заголовок', 'title'),
				Textarea::make('Описание', 'description'),
			]),
		];
	}

	public function filters(): array
	{
		return [
			Text::make('Заголовок', 'title'),
		];
	}

	#[SearchUsingFullText(['title', 'description'])]
	public function search(): array
	{
		return ['id', 'title', 'description'];
	}

	public function rules(Model $item): array
	{
		return [];
	}
}
