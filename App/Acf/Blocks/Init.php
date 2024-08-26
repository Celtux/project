<?php

namespace App\Acf\Blocks;

final class Init {
	/**
	 * @var Helpers\BlockItem[]
	 */
	private static array $blocks = array(
		General\Hero::class,
		General\Logo::class,
		General\Who::class,
		General\Services::class,
		General\Stats::class,
		General\Image::class,
		General\Rewards::class,
		General\Reviews::class,
		General\Cases::class,
		General\Advantages::class,
		General\Skills::class,
		General\Info::class,
		General\Faq::class,
		General\Form::class,
		General\NewsList::class,
		General\PostList::class,
		General\About::class,
		General\Process::class,
		General\Video::class,
	);

	public function __construct()
	{
		/*
		** More info about acf bocks here: https://www.advancedcustomfields.com/resources/acf_register_block_type/
		*/
		foreach (self::$blocks as $block) {
			$block::setBlockParams();
		}
		RegisterBlock::init();
	}

}