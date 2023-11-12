<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuDivider;
use App\MoonShine\Pages\TestPage;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
	protected function resources(): array
	{
		return [];
	}

	protected function pages(): array
	{
		return [];
	}

	protected function menu(): array
	{
		return [
			MenuItem::make('Тестовая', new TestPage()),
			MenuDivider::make(), 
			MenuGroup::make('Админка', [
				MenuItem::make('Администраторы', new MoonShineUserResource()),
				MenuItem::make('Роли', new MoonShineUserRoleResource()),
			])->icon('heroicons.outline.user-group'),
			MenuItem::make('Документация', 'https://moonshine-laravel.com/docs')->icon('heroicons.document-text')->badge(fn () => 'check'),
		];
	}

	/**
	 * @return array{css: string, colors: array, darkColors: array}
	 */
	protected function theme(): array
	{
		return [
			'colors' => [
				'primary' => '#2288ed',
				'secondary' => '#e7505a',
				'success-bg' => '#1AA244',
			],
			'darkColors' => [
				'success-bg' => '#1AA244',
			]
		];
	}


	public function boot(): void
	{
		parent::boot();

		moonShineAssets()->add([
			'admin.css',
		]);
	}
}
