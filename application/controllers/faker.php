<?php
 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
/**
 * App Class
 *
 * Stop talking and start faking!
 */
class Faker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
 
//        // can only be called from the command line
//        if (!$this->input->is_cli_request()) {
//            exit('Direct access is not allowed');
//        }
// 
//        // can only be run in the development environment
//        if (ENVIRONMENT !== 'development') {
//            exit('Wowsers! You don\'t want to do that!');
//        }
// 
        // initiate faker
        $this->faker = Faker\Factory::create();
 
        // load any required models
        $this->load->model('fakerusermodel');
    }
 
    /**
     * seed local database
     */
    function seed()
    {
        // purge existing data
        $this->_truncate_db();
 
        // seed users
        $this->_seed_users(25);
 
        // call more seeds here...
    }
 
    /**
     * seed users
     *
     * @param int $limit
     */
    function _seed_users($limit)
    {
        echo "seeding $limit users";
 
        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {
            echo ".";
 
            $data = array(
                'username' => $this->faker->unique()->userName, // get a unique nickname
                'password' => 'awesomepassword', // run this via your password hashing function
                'firstName' => $this->faker->firstName,
                'lastName' => $this->faker->lastName,
//                'age'=> $this->faker->age,
//                'gender'=> this->faker->gender,
         
                'email' => $this->faker->email,
                //'email_verified' => mt_rand(0, 1) ? '0' : '1',
                'telephone' => $this->faker->phoneNumber,
               // 'birthdate' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
               // 'registration_date' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
             
            );
 
            $this->fakerusermodel->faker_insert($data);
        }
 
        echo PHP_EOL;
    }
 
    private function _truncate_db()
    {
        $this->user_model->truncate();
    }
}

