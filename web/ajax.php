<?php
	session_start();
	include 'words.php';
	try
	{
		if(isset($_POST['action']) && (isset($_SESSION['nickname']) || $_POST['action'] == 'login'))
		{
			$action = $_POST['action'];
			switch($action)
			{
				case 'login':
					session_start();
					if(!isset($_POST['nickname']))
						header('Location: /');
					$user = preg_replace("/[^a-z0-9_]/", '_', strtolower($_POST['nickname']));
					$folder = 'db/user/';
					if(!file_exists($folder.$user))
					{
						$fp = fopen($folder.$user, 'wb');
						fwrite($fp, '');
						fclose($fp);
					}
					$_SESSION['nickname'] = $user;
					break;
				case 'select':
				
					break;
				case 'new_game':
					$player = $_POST['player'];
					$folder = 'db/game';
					$games = count(scandir($folder))-2;
					$fp = fopen($folder.'/'.$_SESSION['nickname'].'_'.$player.'_'.$games, 'wb');
					fwrite($fp, '');
					fclose($fp);
					break;
				case 'get_games':
					$games = scandir('db/game');
					unset($games[0]);
					unset($games[1]);
					echo json_encode(array_values($games));
					break;
				case 'get_users':
					$users = scandir('db/user');
					unset($users[0]);
					unset($users[1]);
					$id = array_search($_SESSION['nickname'], $users);
					unset($users[$id]);
					echo json_encode(array_values($users));
					break;
				default:
					echo '[]';
					break;
			}
		}
	}
	catch (Exception $e)
	{
		echo json_encode($e->getMessage());
	}