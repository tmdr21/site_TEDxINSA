<?php
	include('User.php');
	include('Member.php');
	include('Sponsor.php');
	include('Talk.php');
	include('AgendaEvent.php');
	include('Speaker.php');
	include('Result.php');
	include('VoteKey.php');
	
	class Connection{
     
		private $PDOInstance = null;
		private static $instance = null;

		
		const DEFAULT_SQL_DTB = 'tedxinsajqadmin';
		const DEFAULT_SQL_HOST = 'localhost';
		const DEFAULT_SQL_USER = 'root';
		const DEFAULT_SQL_PASS = '';
		
		
		/*
		const DEFAULT_SQL_DTB = 'tedxinsajqadmin';
		const DEFAULT_SQL_HOST = 'tedxinsajqadmin.mysql.db';
		const DEFAULT_SQL_USER = 'tedxinsajqadmin';
		const DEFAULT_SQL_PASS = 'Ys6f812kiZcW';
		*/
 
		private function __construct(){
			$this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
			$this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
		}
 
		public static function getInstance(){  
			if(is_null(self::$instance)){
				self::$instance = new Connection();
			}
			return self::$instance;
		}
 
		public function query($query){
			return $this->PDOInstance->query($query);
		}
		
		public function prepare($query){
			return $this->PDOInstance->prepare($query);
		}
		
		public function execute($query){
			return $this->PDOInstance->execute($query);
		}
		
		public function selectMembersByYear($year){
			$select = $this->PDOInstance->prepare("SELECT * FROM member WHERE year=:year;");
			$select->execute(array(':year'=>$year));
			return $select->fetchAll(PDO::FETCH_CLASS, "Member");
		}

		public function selectMemberById($id){
			$select = $this->PDOInstance->prepare("SELECT * FROM member WHERE id=:id;");
			$select->execute(array(':id'=>$id));
			return $select->fetchAll(PDO::FETCH_CLASS, "Member")[0];
		}
		
		public function selectMemberYears(){
			$select = $this->PDOInstance->prepare("SELECT DISTINCT year FROM member ORDER BY year DESC");
			$select->execute();
			return $select->fetchAll();
		}
		
		public function selectLastMemberYear(){
			$select = $this->PDOInstance->prepare("SELECT max(year) FROM member");
			$select->execute();
			return $select->fetch();
		}
		
		public function selectAllMembers(){
			$select = $this->PDOInstance->prepare("SELECT * FROM member ORDER BY year DESC, lastname");
			$select->execute();
			return $select->fetchAll(PDO::FETCH_CLASS, "Member");
		}

		public function updateMemberById($id, $firstname, $lastname, $title_fr, $title_en, $year, $photo){
			$update = $this->PDOInstance->prepare("UPDATE member SET firstname=:firstname, lastname=:lastname, title_fr=:title_fr, title_en=:title_en, year=:year, photo=:photo WHERE id=:id");
			$update->execute(array(
				':firstname'=>$firstname,
				':lastname'=>$lastname,
				':title_fr'=>$title_fr,
				':title_en'=>$title_en,
				':year'=>$year,
				':photo'=>$photo,
				':id'=>$id
			));
			return $update->rowCount();
		}

		public function createMember($firstname, $lastname, $title_fr, $title_en, $year, $photo){
			$create = $this->PDOInstance->prepare("INSERT INTO member(firstname, lastname, title_fr, title_en, year, photo) VALUES (:firstname, :lastname, :title_fr, :title_en, :year, :photo)");
			$create->execute(array(
				':firstname'=>$firstname,
				':lastname'=>$lastname,
				':title_fr'=>$title_fr,
				':title_en'=>$title_en,
				':year'=>$year,
				':photo'=>$photo,
			));
			return $this->PDOInstance->lastInsertId();
		}

		public function deleteMember($id){
			$delete = $this->PDOInstance->prepare("DELETE FROM member WHERE id=:id;");
			$delete->execute(array(':id'=>$id));
			return $delete->rowCount();
		}
		
		public function selectSponsorsByYear($year){
			$select = $this->PDOInstance->prepare("SELECT * FROM sponsor WHERE year=:year;");
			$select->execute(array(':year'=>$year));
			return $select->fetchAll(PDO::FETCH_CLASS, "Sponsor");
		}

		public function selectSponsorById($id){
			$select = $this->PDOInstance->prepare("SELECT * FROM sponsor WHERE id=:id;");
			$select->execute(array(':id'=>$id));
			return $select->fetchAll(PDO::FETCH_CLASS, "Sponsor")[0];
		}

		public function updateSponsorById($id, $name, $link, $description_fr, $description_en, $year, $photo){
			$update = $this->PDOInstance->prepare("UPDATE sponsor SET name=:name, link=:link, description_fr=:description_fr, description_en=:description_en, year=:year, photo=:photo WHERE id=:id");

			$update->execute(array(
				':name'=>$name,
				':link'=>$link,
				':description_fr'=>$description_fr,
				':description_en'=>$description_en,
				':year'=>$year,
				':photo'=>$photo,
				':id'=>$id
			));
			return $update->rowCount();
		}

		public function createSponsor($name, $link, $description_fr, $description_en, $year, $photo){
			$create = $this->PDOInstance->prepare("INSERT INTO sponsor(name, link, description_fr, description_en, year, photo) VALUES (:name, :link, :description_fr, :description_en, :year, :photo)");
			$create->execute(array(
				':name'=>$name,
				':link'=>$link,
				':description_fr'=>$description_fr,
				':description_en'=>$description_en,
				':year'=>$year,
				':photo'=>$photo,
			));
			return $this->PDOInstance->lastInsertId();
		}

		public function deleteSponsor($id){
			$delete = $this->PDOInstance->prepare("DELETE FROM sponsor WHERE id=:id;");
			$delete->execute(array(':id'=>$id));
			return $delete->rowCount();
		}

		public function selectAllSponsors(){
			$select = $this->PDOInstance->prepare("SELECT * FROM sponsor ORDER BY year DESC, name");
			$select->execute();
			return $select->fetchAll(PDO::FETCH_CLASS, "Sponsor");
		}
		
		public function selectSponsorYears(){
			$select = $this->PDOInstance->prepare("SELECT DISTINCT year FROM sponsor ORDER BY year DESC");
			$select->execute();
			return $select->fetchAll();
		}
		
		public function selectLastSponsorYear(){
			$select = $this->PDOInstance->prepare("SELECT max(year) FROM sponsor");
			$select->execute();
			return $select->fetch();
		}
		
		public function selectAllTalks(){
			$select = $this->PDOInstance->prepare("SELECT * FROM talk ORDER BY year DESC, name");
			$select->execute();
			return $select->fetchAll(PDO::FETCH_CLASS, "Talk");
		}

		public function selectTalksByYear($year){
			$select = $this->PDOInstance->prepare("SELECT * FROM talk WHERE year=:year;");
			$select->execute(array(':year'=>$year));
			return $select->fetchAll(PDO::FETCH_CLASS, "Talk");
		}
		
		public function selectTalkById($id){
			$select = $this->PDOInstance->prepare("SELECT * FROM talk WHERE id=:id;");
			$select->execute(array(':id'=>$id));
			return $select->fetchAll(PDO::FETCH_CLASS, "Talk")[0];
		}

		public function updateTalkById($id, $name, $video, $title_fr, $title_en, $description_fr, $description_en, $year, $lang, $photo, $facebook, $twitter, $linkedin, $youtube, $instagram, $website){
			$update = $this->PDOInstance->prepare("UPDATE talk SET name=:name, video=:video, title_fr=:title_fr, title_en=:title_en, description_fr=:description_fr, description_en=:description_en, year=:year, lang=:lang, photo=:photo, facebook=:facebook, twitter=:twitter, linkedin=:linkedin, youtube=:youtube, instagram=:instagram, website=:website WHERE id=:id");
			$update->execute(array(
				':name'=>$name,
				':video'=>$video,
				':title_fr'=>$title_fr,
				':title_en'=>$title_en,
				':description_fr'=>$description_fr,
				':description_en'=>$description_en,
				':year'=>$year,
				':lang'=>$lang,
				':photo'=>$photo,
				':facebook'=>$facebook,
				':twitter'=>$twitter,
				':linkedin'=>$linkedin,
				':youtube'=>$youtube,
				':instagram'=>$instagram,
				':website'=>$website,
				':id'=>$id
			));
			return $update->rowCount();
		}

		public function createTalk($name, $video, $title_fr, $title_en, $description_fr, $description_en, $year, $lang, $photo, $facebook, $twitter, $linkedin, $youtube, $instagram, $website){
			$create = $this->PDOInstance->prepare("INSERT INTO talk(name, video, title_fr, title_en, description_fr, description_en, year, lang, photo, facebook, twitter, linkedin, youtube, instagram, website) VALUES (:name, :video, :title_fr, :title_en, :description_fr, :description_en, :year, :lang, :photo, :facebook, :twitter, :linkedin, :youtube, :instagram, :website)");
			$create->execute(array(
				':name'=>$name,
				':video'=>$video,
				':title_fr'=>$title_fr,
				':title_en'=>$title_en,
				':description_fr'=>$description_fr,
				':description_en'=>$description_en,
				':year'=>$year,
				':lang'=>$lang,
				':photo'=>$photo,
				':facebook'=>$facebook,
				':twitter'=>$twitter,
				':linkedin'=>$linkedin,
				':youtube'=>$youtube,
				':instagram'=>$instagram,
				':website'=>$website
			));
			return $this->PDOInstance->lastInsertId();
		}

		public function deleteTalk($id){
			$delete = $this->PDOInstance->prepare("DELETE FROM talk WHERE id=:id;");
			$delete->execute(array(':id'=>$id));
			return $delete->rowCount();
		}

		public function selectTalkYears(){
			$select = $this->PDOInstance->prepare("SELECT DISTINCT year FROM talk ORDER BY year DESC");
			$select->execute();
			return $select->fetchAll();
		}

		public function selectTalkLanguages(){
			$select = $this->PDOInstance->prepare("SELECT DISTINCT lang FROM talk ORDER BY lang DESC");
			$select->execute();
			return $select->fetchAll();
		}

		public function selectLastTalkYear(){
			$select = $this->PDOInstance->prepare("SELECT max(year) FROM talk");
			$select->execute();
			return $select->fetch();
		}

		public function getThemeByYear($year){
			$select = $this->PDOInstance->prepare("SELECT theme FROM year WHERE year=:year");
			$select->execute(array(':year'=>$year));
			$select->execute();
			return $select->fetch()[0];
		}

		public function getThemes(){
			$select = $this->PDOInstance->prepare("SELECT theme FROM year");
			$select->execute();
			return $select->fetchAll();
		}

		public function getThemesYears(){
			$select = $this->PDOInstance->prepare("SELECT DISTINCT year FROM year");
			$select->execute();
			return $select->fetchAll();
		}
		
		// --- Agenda --- \\
		
		public function selectAgenda(){
			$select = $this->PDOInstance->prepare("SELECT * FROM agenda");
			$select->execute();
			return $select->fetchAll(PDO::FETCH_CLASS, "AgendaEvent");
		}
				
		public function selectAgendaById($id){var_dump($id);
			$select = $this->PDOInstance->prepare("SELECT * FROM agenda WHERE id=:id");
			$select->execute(array(':id'=>$id));
			return $select->fetchAll(PDO::FETCH_CLASS, "AgendaEvent");
		}
		
		public function createAgenda($day, $month_fr, $month_en, $title_fr, $title_en, $info_fr, $info_en){
			$create = $this->PDOInstance->prepare("INSERT INTO agenda(day, month_fr, month_en, title_fr, title_en, info_fr, info_en) VALUES (:day, :month_fr,:month_en, :title_fr, :title_en, :info_fr, :info_en)");
			$create->execute(array(
				':day'=>$day,
				':month_fr'=>$month_fr,
				':month_en'=>$month_en,
				':title_fr'=>$title_fr,
				':title_en'=>$title_en,
				':info_fr'=>$info_fr,
				':info_en'=>$info_en,
			));
			return $this->PDOInstance->lastInsertId();

		}
		
		public function updateAgenda($id, $day, $month_fr, $month_en, $title_fr, $title_en, $info_fr, $info_en){
			$update = $this->PDOInstance->prepare("UPDATE agenda SET day=:day, month_fr=:month_fr, month_en=:month_en, title_fr=:title_fr, title_en=:title_en, info_fr=:info_fr, info_en=:info_en  WHERE id=:id");
			$update->execute(array(
				':day'=>$day,
				':month_fr'=>$month_fr,
				':month_en'=>$month_en,
				':title_fr'=>$title_fr,
				':title_en'=>$title_en,
				':info_fr'=>$info_fr,
				':info_en'=>$info_en,
				':id'=>$id
			));
			return $update->rowCount();
		}
		
		public function deleteAgenda($id){
			$delete = $this->PDOInstance->prepare("DELETE FROM agenda WHERE id=:id");
			$delete->execute(array(':id'=>$id));
			return $delete->rowCount();
		}
		
		// --- Votes --- \\
		
		public function selectAllSpeakers(){
			$selectAllSpeakers = $this->PDOInstance->prepare("SELECT * FROM speaker;");
			$selectAllSpeakers->execute();
			return $selectAllSpeakers->fetchAll(PDO::FETCH_CLASS, "Speaker");
		}
		
		public function insertResult(Result $result){
			try{
				$insertResult = $this->PDOInstance->prepare("INSERT INTO result(idSpeaker, note)VALUES(:idSpeaker,:note);");
				return $insertResult->execute(array(':idSpeaker'=> $result->getIdSpeaker(),
													':note'=> $result->getNote()
													));
			}catch(PDOException $exception){ 
				return $exception->getMessage(); 
				echo "exception: ".$exception;
			}
		}

		public function selectAllVoteKeys(){
			$selectAllVoteKeys = $this->PDOInstance->prepare("SELECT * FROM votekey");
			$selectAllVoteKeys->execute();
			return $selectAllVoteKeys->fetchAll(PDO::FETCH_CLASS, 'VoteKey');
		}
		
		public function selectVoteKey($code){
			$selectVoteKey = $this->PDOInstance->prepare("SELECT * FROM votekey WHERE code=:code");
			$selectVoteKey->setFetchMode(PDO::FETCH_CLASS, 'VoteKey'); 
			$selectVoteKey->execute(array(':code'=> $code));
			return $selectVoteKey->fetch();
		}

		public function checkCode($code){
			$selectVoteKey = $this->selectVoteKey($code);
			if($selectVoteKey!=null){
				return ($selectVoteKey->isValid()==1);
			} else {
				return False;
			}
		}
		
		public function useCode($code){
			try{
				$useCode = $this->PDOInstance->prepare("UPDATE votekey SET valid = 0 WHERE code = :code;");
				return $useCode->execute(array(':code'=> $code));
			}catch(PDOException $exception){
				echo "exception: ".$exception;
				return $exception->getMessage();
			}
		}
		
		public function createCode($code, $valid){
			$create = $this->PDOInstance->prepare("INSERT INTO votekey(code, valid) VALUES (:code, :valid)");
			$create->execute(array(
				':code'=>$code,
				':valid'=>$valid,
			));
			return $this->PDOInstance->lastInsertId();
		}

		public function deleteCode($id){
			$delete = $this->PDOInstance->prepare("DELETE FROM votekey WHERE id=:id;");
			$delete->execute(array(':id'=>$id));
			return $delete->rowCount();
		}
		
		public function generateCode($number){
			for($x=0 ; $x<$number ; $x++) {
				$create = $this->PDOInstance->query("INSERT INTO `votekey` (`id`, `code`, `valid`) VALUES (NULL, SUBSTRING(MD5(RAND()) FROM 1 FOR 8), '1')");
			}
			return $this->PDOInstance->lastInsertId();
		}

		public function deleteAllCodes(){
			$delete = $this->PDOInstance->query("TRUNCATE TABLE `votekey`");
			return $delete->rowCount();
		}

		public function createUser($user){
			$query = $this->PDOInstance->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
			$query->execute(array(':email'=> $user->getEmail(),
								 ':password'=> $user->getPassword(),
								 ));
		}
		
		public function selectUser($email){
			$query = $this->PDOInstance->prepare("SELECT * FROM user WHERE email=:email");
			$query->setFetchMode(PDO::FETCH_CLASS, 'User');
			$query->execute(array(':email'=> $email));
			return $query->fetch();
		}
    }
    
?>