<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		News::create(array(
	  		'title' => 'обновления №10',
	  		'state' => '1',
	  		'text' => '<ol>
			<li>Добавлена страница статистики.</li>
			<li>Мелкие визуальные изменения.</li>
			<li>Добавлена лента разработки сайта.</li>
			</ol>',
	  		'status' => '1',
		));
		News::create(array(
	  		'title' => 'обновления №11',
	  		'state' => '1',
	  		'text' => '<ol>
			<li>Создана реферальная система.</li>
			<li>Мелкие визуальные изменения.</li>
			<li>Создана чудо ссылка для тех у кого есть доступ к beta тесту. Ваша реферальная ссылка на данный момент: <b>http://exslife.com/kF5mN8hP5Ee/beta</b><br>
			С помощью этой ссылки любой кто перейдет по ней, получит доступ к beta и станет вашим рефералом.</li>
			</ol>',
	  		'status' => '1',
		));

	}

}
