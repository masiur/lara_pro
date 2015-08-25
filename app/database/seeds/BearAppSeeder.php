<?php 

class BearAppSeeder extends Seeder {
	public function run() {
		// clear our database 
		DB::table('bears')->delete();
		DB::table('fish')->delete();
		DB::table('picnics')->delete();
		DB::table('trees')->delete();
		DB::table('bears_picnic')->delete();

		// we'll create three different bears
		$bearLawly = Bear::create(array(
			'name'		=> 'Lawly',
			'type'		=> 'Grizzly',
			'danger_level' => 8
			));

		$bearCerms = Bear::create(array(
			'name' => 'Cerms', 
			'type' => 'Black',
			'danger_level' => 4
			));
		$bearAdobot = Bear::create(array(
			'name' => 'Adobot', 
			'type' => 'Polar',
			'danger_level' => 3
			));

		$this->command->info('The bears are all alive');

		Fish::create(array(
			'weight' => 5,
			'bear_id' => $bearLawly->id
			));
		Fish::create(array(
			'weight' => 12,
			'bear_id' =>$bearCerms->id
			));
		Fish::create(array(
			'weight' => 4,
			'bear_id' => $bearAdobot->id
			));

		$this->command->info('They are eating fish');

		Tree::create(array(
			'type' => 'Oak',
			'age' => 400,
			'bear_id' => $bearLawly->id
			));
		Tree::create(array(
			'type' => 'Redwood',
			'age' => 500,
			'bear_id' => $bearLawly->id
			));

		$this->command->info('Climb bears! Be free!');

		$picnicYellowstone = Picnic::create(array(
			'name' => 'Yellowstone', 
			'taste_level' => 6
			));
		$picnicGrandCanyon = Picnic::create(array(
			'name' => 'Grand Canyon',
			'taste_level' => 5
			));

		$bearLawly->picnics()->attach($picnicYellowstone->id);
		$bearLawly->picnics()->attach($picnicGrandCanyon->id);

		$bearCerms->picnics()->attach($picnicYellowstone->id);
		$bearCerms->picnics()->attach($picnicGrandCanyon->id);

		$bearAdobot->picnics()->attach($picnicYellowstone->id);
		$bearAdobot->picnics()->attach($picnicGrandCanyon->id);

		$this->command->info('They are terrorizing picnics!');


		// create a bear 
		Bear::create(array(
			'name' => 'Super Cool',
			'type' => 'Black',
			'danger_level' => 1
			));
		// alternative method 
		$bear  	= new Bear;
		$bear->name = 'Very Hot';
		$bear->type = 'Yellow';
		$bear->danger_level = 2;

		$bear->save();
	}
}
