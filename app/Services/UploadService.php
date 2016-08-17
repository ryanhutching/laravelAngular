<?php

namespace App\Services;

use App\Models\User;
use App\Models\Club;
use App\Models\Team;
use App\Models\Stadiums;
use DB;


use Validator;
use Chumper\Zipper\Zipper;
use Mockery\CountValidator\Exception;


class UploadService
{
    private $imgFolder = null;
    public $user = null;
    public $club = null;
    public $team = null;


    /** Init the Models */
    public function __construct(User $user, Club $club, Team $team)
    {
        $this->club = $club;
        $this->user = $user;
        $this->team = $team;
        $this->imgFolder = public_path().'/assets/images/';
    }

    /**
     * @param Object $file
     * @return void
     */
    public function uploadJson($file) {

        if($file->hasFile('upload_file')) {
            $zipper = new Zipper();
            $fileName = $file->file('upload_file')->getClientOriginalName();
            $fillableTables = [];
            $insertedUsersId = [];
            $insertedClubsId = [];
            $insertedTeamsId = [];
            $insertedStadiumsId = [];

            $file->file('upload_file')->move(
                base_path() . '/public/jsons',
                $fileName
            );

            // get json file from zip
            $zipper->make(public_path().'/jsons/'.$fileName)->folder('fill')->extractTo(public_path().'/jsons');

            $json = file_get_contents(public_path().'/jsons/fill.json');
            $json = json_decode($json, true);
            foreach($json['config']['tables'] as $k => $v) {
                if($v === true) {
                    $fillableTables[$k] = $k;
                }
            }


            // Begin Fill the Database
            DB::beginTransaction();
            try
            {
                $this->_validate($json);
                if(isset($fillableTables['users'])) {
                    foreach($json['users'] as $k => $v) {
                        $v['password'] = md5($v['password']);
                        $insertedUser = User::create($v);
                        $insertedUsersId[$k] = $insertedUser->id;
                    }
                } else {
                    throw new Exception("Can not find users information");
                }

                if(isset($fillableTables['stadiums'])) {
                    foreach($json['stadiums'] as $k => $v) {
                        $insertedStadium = Stadiums::create($v);
                        $insertedStadiumsId[$k] = $insertedStadium->id;
                    }
                }

                if(isset($fillableTables['clubs'])) {

                    if(!isset($fillableTables['stadiums'])) {
                        throw new Exception('You must have a stadiums for clubs');
                    }

                    foreach($json['clubs'] as $k => $v) {
                        $v['user_id'] = $insertedUsersId[$v['user_id']];
                        $v['stadium_id'] = $insertedStadiumsId[$v['stadium_id']];
                        $insertedClub = Club::create($v);
                        $insertedClubsId[$k] = $insertedClub->id;
                    }
                }

                if(isset($fillableTables['teams'])) {

                    if(!isset($fillableTables['clubs'])) {
                        throw new Exception('You must have a clubs for teams');
                    }

                    foreach($json['teams'] as $k => $v) {
                        $v['club_id'] = $insertedClubsId[$v['club_id']];
                        $v['stadium_id'] = $insertedStadiumsId[$v['stadium_id']];
                        $insertedTeam = Team::create($v);
                        $insertedTeamsId[$k] = $insertedTeam->id;
                    }
                } else {
                    throw new Exception("Can not find Club information");
                }

                DB::commit();
                $this->_uploadImagesIntoFolder($zipper, $fileName, $json, $fillableTables);
            }
            catch (\Exception $e)
            {
                DB::rollBack();
                dd($e->getMessage());
            }

            unlink(public_path().'/jsons/fill.json');
            $zipper->zip(public_path().'/jsons/'.$fileName)->delete();

        }
    }

    /**
     * Upload images from zipFile to folders
     * @param Zipper $zipper
     * @param string $fileName
     * @param array $json
     */
    private function _uploadImagesIntoFolder(&$zipper, &$fileName, &$json, &$fillableTables) {

        if(isset($fillableTables['users'])) {
            $zipper->make(public_path().'/jsons/'.$fileName)->folder($json['folders']['userFolder'])->extractTo($this->imgFolder.'users');
            $zipper->make(public_path().'/jsons/'.$fileName)->folder($json['folders']['userFolder'])->extractTo($this->imgFolder.'users/croped');
        }
        if(isset($fillableTables['clubs'])) {
            $zipper->make(public_path().'/jsons/'.$fileName)->folder($json['folders']['clubFolder'])->extractTo($this->imgFolder.'clubs');
            $zipper->make(public_path().'/jsons/'.$fileName)->folder($json['folders']['clubFolder'])->extractTo($this->imgFolder.'clubs/croped');
            if(isset($fillableTables['teams'])) {
                $zipper->make(public_path().'/jsons/'.$fileName)->folder($json['folders']['stadiumFolder'])->extractTo($this->imgFolder.'stadiums');
                $zipper->make(public_path().'/jsons/'.$fileName)->folder($json['folders']['stadiumFolder'])->extractTo($this->imgFolder.'stadiums/croped');
            }
        }
    }

    /**
     * @param array $data
     *
    */
    private function _validate($data) {

        $arr = [];
        foreach($data['users'] as $user) {
            $arr[] = $user['email'];
        }

        foreach(array_count_values($arr) as $val => $c) {
            if($c > 1) throw new Exception("Dublicating the $c email");
        }

        foreach($data['users'] as $user) {
            $validator = Validator::make($user, [
                'email' => "unique:users"
            ]);
            if ($validator->fails()) {
                throw new Exception("Dublicating the ".$user['email']." email");
            }
        }
    }
}