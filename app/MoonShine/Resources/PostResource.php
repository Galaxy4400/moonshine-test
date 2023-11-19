<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\TinyMce;

class PostResource extends ModelResource
{
	protected string $model = Post::class;

	protected string $title = 'Posts';


	public function fields(): array
	{
		return [
			Block::make([
				ID::make()->sortable(),
				Text::make('Заголовок', 'title'),
				Text::make('Описание', 'description'),
				TinyMce::make('Контене', 'text'),
			]),
		];
	}


	public function rules(Model $item): array
	{
		return [];
	}
}
