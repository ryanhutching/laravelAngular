/**
 * Get Only Men's Clubs
 * @return \Illuminate\Database\Eloquent\Collection|static[]|bool
 */
public function getMenClubs() {
    $obj = $this->type->where('name', '=', 'MEN')->get();
    if($obj != null) {
        $arr = [];
        foreach ($obj as $item) {
            $arr[] = $item->id;
        }
        return $this->type->with('clubs')->whereIn('id', $arr)->get();
    }
    return false;
}

/**
 * Get Only Women's Clubs
 * @return \Illuminate\Database\Eloquent\Collection|static[]|bool
 */
public function getWomenClubs() {
    $obj = $this->type->where('name', '=', 'WOMEN')->get();
    if($obj != null) {
        $arr = [];
        foreach ($obj as $item) {
            $arr[] = $item->id;
        }
        return $this->type->with('teams')->whereIn('id', $arr)->get();
    }
    return false;
}

/**
 * Get Only Youth's Clubs
 * @return \Illuminate\Database\Eloquent\Collection|static[]|bool
 */
public function getYouthClubs() {
    $obj = $this->type->where('name', '=', 'YOUTH')->get();
    if($obj != null) {
        $arr = [];
        foreach ($obj as $item) {
            $arr[] = $item->id;
        }
        return $this->type->with('teams')->whereIn('id', $arr)->get();
    }
    return false;
}

