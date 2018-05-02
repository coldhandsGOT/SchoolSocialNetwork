<?php

namespace App\traits;
use App\friendship;

trait friendable
{
	public function sendRequest($id_user_requested) //id de la personne que le user veut ajouter
	{
		if($this->id==$id_user_requested) //afin de ne pas s'auto ajouter comme un débile mental
		{
			return 0;
		}

		if($this->pendingRequestSentTo($id_user_requested)==1)  //dans le cas ou le user à déja envoyer une invitation d'ajout
		{
			return "Requête d'amitié déja envoyée";
		}
		if($this->pendingRequestSentTo($id_user_requested)==1)  //Dans le cas ou ils sont déja amis
				{
			return "Requête d'amitié déja envoyée";
		}

		if($this->is_friends_with($id_user_requested) == 1)
		{
			return "Déja dans votre liste d'amis";
		} 
		

		$friendship = friendship::create([  //variable friendship contiendra la requetes sur la bdd
			'id_user_requesting' => $this->id,
			'id_user_requested' => $id_user_requested,
			]);

		if($friendship)
		{
			return 1;
		}

		return 0;

	}




	public function acceptRequest($id_user_requesting) //id de la personne que le user veut ajouter
	{

		if($this->pendingRequestFrom($id_user_requesting)==0) 
		{
			return 0;
		}

		$friendship = friendship::where('id_user_requesting',$id_user_requesting)
								->where('id_user_requested', $this->id)
								->first();
	
		if($friendship)
		{
			$friendship->update([
				'status' => 1,
				]);

		return 1;
		}

		 return 0;		
	}



	public function friendId()
	{
		return collect($this->friendsList())->pluck('id')->toArray(); //permet d'avoir la liste d'amis en renvoyant que l'id grace à pluck
	}


	public function is_friends_with($user_id)
	{
		if(in_array($user_id, $this->friendId()))  //parse d'object de type collection à array afin de l'exploiter après
		{
				return 1;
		}

		else 
		{
				return 0;
		}

	}

	


	public function pendingRequests() //id de la personne que le user veut ajouter
	{


		$friendsList1 = array(); 

		$request1 = friendship::where('status',0)  //status = 1 donne la liste des users qui sont amis
		->where('id_user_requesting', $this->id)  //id courant du user qui ajoute
		->get();  //get methode

		foreach($request1 as $friendship):
			array_push($friendsList1, \App\User::find($friendship ->id_user_requested));
		endforeach;
		

		// list des user qui ont ajouté le user, donc acceptés par le user
		$friendsList2= array(); 

		$request2 = friendship::where('status',0)  //status = 1 donne la liste des users qui sont amis
		->where('id_user_requested', $this->id)  //id courant du user qui ajoute
		->get();

		foreach($request2 as $friendship):
			array_push($friendsList2, \App\User::find($friendship ->id_user_requesting));
		endforeach;

		return array_merge($friendsList1, $friendsList2);
	}



	public function pendingRequestsIds()
		{
			return collect($this->pendingRequests())->pluck('id')->toArray(); //permet d'avoir la liste d'amis en renvoyant que l'id grace à pluck
		}





	public function pendingRequestSent() //array des demandes d'ajout d'amis
	{


		$users = array(); 

		$request = friendship::where('status',0)  //status = 1 donne la liste des users qui sont amis
		->where('id_user_requesting', $this->id)  //id courant du user qui ajoute
		->get();  //get methode

		foreach($request as $friendship):
			array_push($users, \App\User::find($friendship ->id_user_requested));
		endforeach;
		

		return $users;
	}	


	
	public function pendingRequestFrom($id_user) //array des demandes d'ajout d'amis
	{

		if(in_array($id_user, $this->pendingRequestsIds()))
		{
			return 1;
		}

		else
		{
			return 0;
		}		
	}



	public function pendingRequestsSentIds()
		{
			return collect($this->pendingRequestSent())->pluck('id')->toArray(); //permet d'avoir la liste d'amis en renvoyant que l'id grace à pluck
		}

	public function pendingRequestTo($user_id) //array des demandes d'ajout d'amis
	{

		if(in_array($user_id, $this->pendingRequestsIds()))
		{
			return 1;
		}

		else
		{
			return 0;
		}		
	}












	public function friendsList()
	{
		
		$friendsList1 = array(); 

		// list des user qui ont étaient ajoutés par le user
		$request1 = friendship::where('status',1)  //status = 1 donne la liste des users qui sont amis
		->where('id_user_requesting', $this->id)  //id courant du user qui ajoute
		->get();

		foreach($request1 as $friendship):
			array_push($friendsList1, \App\User::find($friendship ->id_user_requested));
		endforeach;
		

		// list des user qui ont ajouté le user, donc acceptés par le user
		$friendsList2= array(); 

		$request2 = friendship::where('status',1)  //status = 1 donne la liste des users qui sont amis
		->where('id_user_requested', $this->id)  //id courant du user qui ajoute
		->get();

		foreach($request2 as $friendship):
			array_push($friendsList2, \App\User::find($friendship ->id_user_requesting));
		endforeach;

		return array_merge($friendsList1, $friendsList2);

	}

}

