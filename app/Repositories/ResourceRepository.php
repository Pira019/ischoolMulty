<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ResourceRepository
{
    protected $model;

    public function getPaginate($n)
	{
		return $this->model->paginate($n);
	}

	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

    public function getByFilter(Array $data)
    {
      //  $arg_list = func_get_args();

        $results = DB::table($this->model)
            ->where($data) ;
       // $results->appends(['sort' => 'Nom_etudiant']);
        return  $results;
    }

	public function update($id, Array $inputs)
	{
		$this->getById($id)->update($inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}


	//Without padding
    public function getAll(Array $data)
    {

        $results = DB::table($this->model)
            ->where($data);

        return  $results;
    }
}
