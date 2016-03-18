<?php

	function insertList($bdd, $message){
		if(preg_match('/::/', $message)){
			$message = explode('::', $message);
			$categ = strtolower($message[0]); unset($message[0]);
			$message = $message[1];
		}else{
			$categ = 'default';
		}

		$req = $bdd->prepare('INSERT INTO todolist (message, creat, categ) VALUES ( :message, :creat, :categ ) ');
		if( $req->execute(array('message' => $message, 'creat' => time(), 'categ' => $categ)) ){
			$notif = 'Ajouté avec succes';
		}else{
			$notif = 'Une erreur est survenue !';
		}
		return $notif;
	}

	function deleteList($bdd, $id){
		$req = $bdd->prepare('DELETE FROM todolist WHERE id = :id');
		if( $req->execute(array('id' => $id)) ){
			$notif = 'Suppression avec succes';
		}else{
			$notif = 'Une erreur est survenue !';
		}
		return $notif;
	}
