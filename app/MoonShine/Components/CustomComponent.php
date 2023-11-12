<?php

declare(strict_types=1);

namespace App\MoonShine\Components;

use Closure;
use Illuminate\Contracts\View\View;
use MoonShine\Components\MoonshineComponent;

/**
 * @method static static make()
 */
final class CustomComponent extends MoonshineComponent
{
	protected string $view = 'admin.components.custom-component';

	public function __construct()
	{
		//
	}

	protected function viewData(): array
	{
		return [];
	}
}
