class UserSeeder extends Seeder{
	public function run()
	{
		User::create([
			'email'    =>  'admin@shiyanlou.com',
			'password' =>  Hash::make(''),
			'nickname' =>  'admin',
			'is_admin' =>  1,
		]);
	}
}


