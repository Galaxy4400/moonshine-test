<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Fields\Text;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Heading;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Metrics\LineChartMetric;
use MoonShine\Metrics\DonutChartMetric;
use MoonShine\Decorations\{Block, Column, Grid, TextBlock, Divider, Collapse, Fragment};


#[Icon('heroicons.folder-open')]
class TestPage extends Page
{
	protected string $title = 'Тестовая страница';
	protected string $subtitle = 'Подзаголовок тестовой страницы';

	public function breadcrumbs(): array
	{
		return [
			'#' => $this->title(),
		];
	}

	public function title(): string
	{
		return $this->title ?: 'TestPage';
	}

	public function components(): array
	{
		return [

			Grid::make([
				Column::make([
					Block::make([
						TextBlock::make('Title 1', 'Text 1')
					])
				])->columnSpan(6),
				Column::make([
					Block::make([
						TextBlock::make('Title 2', 'Text 2')
					])
				])->columnSpan(6),
				Column::make([
					Block::make([
						TextBlock::make('Title 1', 'Text 1')
					])
				])->columnSpan(6),
				Column::make([
					Block::make([
						TextBlock::make('Title 2', 'Text 2')
					])
				])->columnSpan(6),
			])->customAttributes(['class' => 'mb-6']),

			Divider::make('Разделитель')->centered(),

			Block::make('Тестовый блок', [
				Text::make('Name', 'first_name'),
			]),

			Collapse::make('Title/Slug', [
				Text::make('Title'),
				Text::make('Slug')
			])->show(),

			Block::make([
				Tabs::make([
					Tab::make('Seo', [
						Text::make('Seo title 1'),
						Text::make('Seo title 2'),
					]),
					Tab::make('Categories', [
						Text::make('Seo title 3'),
						Text::make('Seo title 4'),
					]),
				]),
			])->customAttributes(['class' => 'mb-6']),

			DonutChartMetric::make('Subscribers')
				->values(['CutCode' => 10000, 'Apple' => 9999, 'test' => 612, 'asdgf' => 3549]),

			Divider::make(),

			Grid::make([
				ValueMetric::make('Articles')
					->value(345)
					->columnSpan(3),
				ValueMetric::make('Comments')
					->value(3645)
					->progress(10000)
					->columnSpan(3),
				ValueMetric::make('Articles')
					->value(345)
					->valueFormat('Today ${value}')
					->columnSpan(3),
				ValueMetric::make('Comments')
					->value(3645)
					->icon('heroicons.shopping-bag')
					->columnSpan(3),
			]),

			Divider::make(),

			LineChartMetric::make('График')->line([
				[10, 3, 8, 0, 20, 50, 100, 1000],
			]),
		];
	}
}
